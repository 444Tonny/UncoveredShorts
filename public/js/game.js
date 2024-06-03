var baseUrl = 'http://localhost:8080/UncoveredShorts/public'; 
//var baseUrl = 'https://phplaravel-1258294-4520213.cloudwaysapps.com';

var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

function openModalById(modalId, showBackground = true) {
    if (modalId !== "gameOverModal") {
        document.getElementById("modalBackground").style.display = "flex";
    }

    const modal = document.getElementById(modalId);
    modal.style.display = "flex";
    
    // Ajoute une petite temporisation pour permettre au navigateur de rendre l'élément avant d'ajouter la classe d'animation
    setTimeout(() => {
        modal.classList.add("show");
    }, 10);
}

function closeModalById(modalId, hideBackground = true) {
    const modal = document.getElementById(modalId);
    modal.classList.remove("show");
    
    // Attendre la fin de l'animation avant de masquer le modal
    setTimeout(() => {
        modal.style.display = "none";
        if (hideBackground) {
            document.getElementById("modalBackground").style.display = "none";
        }
    }, 300); // Correspond à la durée de l'animation définie dans le CSS
}

/* Calculate rank points */
function calculateRankedPoints(arrayAnswer, playerAnswer, question_id) 
{

    playerAnswer = playerAnswer.toLowerCase();
    var foundAnswer = arrayAnswer.find(answer => answer.value && answer.value.toLowerCase() === playerAnswer);

    if (foundAnswer) {
        // Store answer
        storeAnwser('store-player-ranked', question_id, playerAnswer, true);
        return foundAnswer.rank;
    } 
    else 
    {
        storeAnwser('store-player-ranked', question_id, playerAnswer, false);
        return 0; // Return 0 if answer is not found
    }
}

/* calculate unique points */
function calculateUniquePoints(arrayAnswer, playerAnswer, question_id, voteCount = 101)
{
    playerAnswer = playerAnswer.toLowerCase();
    var foundAnswer = arrayAnswer.find(answer => answer.value && answer.value.toLowerCase() === playerAnswer);

    // console.log(arrayAnswer);

    var xhr = new XMLHttpRequest();
    let url = baseUrl + '/add-vote';
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.setRequestHeader('X-CSRF-Token', csrfToken);

    if(foundAnswer) 
    {
        var questionId = foundAnswer.question_id;
        var value = foundAnswer.value;

        // Gestionnaire de succès de la requête
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                // console.log(xhr.responseText);
            } else {
                console.error('Request failed with status:', xhr.status);
            }
        };

        xhr.onerror = function() {
            console.error('Request failed');
        };

        xhr.send(JSON.stringify({ question_id: questionId, value: value }));

        //let result = (100 - foundAnswer.percentage).toFixed(1);
        let result = Math.round(100 - foundAnswer.percentage);

        result = parseFloat(result);

        storeAnwser('store-player-unique', question_id, playerAnswer, true);
        return result;
    }
    else
    {
        storeAnwser('store-player-unique', question_id, playerAnswer, false); 
        return 0;
    } 
}

// 
function getStatistics(game_id, playerScore) {
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

        xhr.send(JSON.stringify({ game_id: game_id, player_score : playerScore }));
    });
}

// Store the game when it's finished
function storeGameSession(game_id, score1, score2, score3, score4, totalScore) {
    let url = baseUrl + '/store-game-session';

    return new Promise((resolve, reject) => {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-Token', csrfToken);

        // Gestionnaire de succès de la requête
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                // console.log(xhr.responseText);
                resolve(xhr.responseText); // Résoudre la promesse
            } else {
                // console.error('Request failed with status:', xhr.status);
                reject('Request failed with status: ' + xhr.status); // Rejeter la promesse
            }
        };

        // Gestionnaire d'erreur de la requête
        xhr.onerror = function() {
            console.error('storeGameSession Request failed');
            reject('Request failed'); // Rejeter la promesse
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
    });
}

function storeAnwser(urlEnd, questionId, value, is_correct = false)
{
    let url = baseUrl + '/' + urlEnd;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.setRequestHeader('X-CSRF-Token', csrfToken);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            // console.log(xhr.responseText + 'Answeres successfully stored.');
        } else {
            // console.error('Request failed with status:', xhr.status);
        }
    };

    xhr.onerror = function() {
        console.error('Insert answer request failed');
    };

    xhr.send(JSON.stringify({ question_id: questionId, value: value, is_correct: is_correct }));
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
