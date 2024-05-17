//var baseUrl = 'http://localhost:8080/UncoveredShorts/public'; 
var baseUrl = 'https://phplaravel-1258294-4520213.cloudwaysapps.com';

var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

function openModalById(modalId, showBackground = true) {
    if(showBackground == true) document.getElementById("modalBackground").style.display = "flex";
    
    document.getElementById(modalId).style.display = "flex";
}

function closeModalById(modalId) {
    document.getElementById("modalBackground").style.display = "none";
    document.getElementById(modalId).style.display = "none";
}

/* Calculate rank points */
function calculateRankedPoints(arrayAnswer, playerAnswer) 
{
    playerAnswer = playerAnswer.toLowerCase();
    var foundAnswer = arrayAnswer.find(answer => answer.value && answer.value.toLowerCase() === playerAnswer);

    if (foundAnswer) {
        return foundAnswer.rank;
    } 
    else return 0; // Return 0 if answer is not found
}

/* calculate unique points */
function calculateUniquePoints(arrayAnswer, playerAnswer, voteCount = 101)
{
    console.log(arrayAnswer);
    playerAnswer = playerAnswer.toLowerCase();
    var foundAnswer = arrayAnswer.find(answer => answer.value && answer.value.toLowerCase() === playerAnswer);

    console.log(foundAnswer);

    if(foundAnswer) 
    {
        var questionId = foundAnswer.question_id;
        var value = foundAnswer.value;
        let url = baseUrl + '/add-vote';

        var xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-Token', csrfToken);

        // Gestionnaire de succès de la requête
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                console.log(xhr.responseText);
            } else {
                console.error('Request failed with status:', xhr.status);
            }
        };

        // Gestionnaire d'erreur de la requête
        xhr.onerror = function() {
            console.error('Request failed');
        };

        // Envoi de la requête avec les données JSON
        xhr.send(JSON.stringify({ question_id: questionId, value: value }));

        //let result = (100 - foundAnswer.percentage).toFixed(1);
        let result = Math.round(100 - foundAnswer.percentage);

        result = parseFloat(result);
        return result;
    }

    else return 0;
}

// 
function getStatistics(game_id) {
    return new Promise((resolve, reject) => {
        let url = baseUrl + '/get-statistics';
        var xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-Token', csrfToken);

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                var statistics = JSON.parse(xhr.responseText);
                resolve(statistics); // Résoudre la promesse avec les statistiques
            } else {
                reject('Request get Statistics failed with status: ' + xhr.status); // Rejeter la promesse avec une erreur
            }
        };

        xhr.onerror = function() {
            reject('Request failed'); // Rejeter la promesse avec une erreur
        };

        xhr.send(JSON.stringify({ game_id: game_id }));
    });
}

// Store the game when it's finished
function storeGameSession(game_id, score1, score2, score3, score4, totalScore)
{
    let url = baseUrl + '/store-game-session';

    var xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.setRequestHeader('X-CSRF-Token', csrfToken);

    // Gestionnaire de succès de la requête
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            console.log(xhr.responseText);
        } else {
            console.error('Request failed with status:', xhr.status);
        }
    };

    // Gestionnaire d'erreur de la requête
    xhr.onerror = function() {
        console.error('Request failed');
    };

    // Envoi de la requête avec les données JSON
    xhr.send(JSON.stringify({ 
        game_id: game_id, 
        score1: score1, 
        score2: score2, 
        score3: score3, 
        score4: score4, 
        totalScore: totalScore
    }));
}

//Check visits
document.addEventListener("DOMContentLoaded", function() {

    if (!sessionStorage.getItem('visit_recorded')) 
    {    
        let url = baseUrl + '/record-visit';

        var xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-Token', csrfToken);
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // La visite a été enregistrée avec succès
                    sessionStorage.setItem('visit_recorded', 'true');
                } else {
                    console.error("An error occured. VISIT XHR", xhr.status);
                }
            }
        };
        xhr.send(JSON.stringify({}));
    }
});
