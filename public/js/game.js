var baseUrl = 'http://localhost:8080/UncoveredShorts/public'; 
//var baseUrl = 'https://phplaravel-1258294-4520213.cloudwaysapps.com';

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
        switch (foundAnswer.rank) {
            
            case 1:
                return 100;
            case 2:
                return 90;
            case 3:
                return 80;
            case 4:
                return 70;
            case 5:
                return 60;
            case 6:
                return 50;
            case 7:
                return 40;
            case 8:
                return 30;
            case 9:
                return 20;
            case 10:
                return 10;
            default:
                return 0; // Return 0 if rank is not between 1 and 10
        }
    } 
    else return 0; // Return 0 if answer is not found
}

/* calculate unique points */
function calculateUniquePoints(arrayAnswer, playerAnswer, voteCount = 101)
{
    
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
        
        return (100 - foundAnswer.percentage);
    }

    else return 0;
}

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