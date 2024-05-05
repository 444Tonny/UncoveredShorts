export var rightWord;
export var allWords;

// https://docs.google.com/spreadsheets/d/1bduQwrXBeq_L_0DDatgKNkcYisIEmm2y-MofkxToFkQ/edit#gid=0

export async function exportExcel() {

    return new Promise((resolve, reject) => {
        //Création d'un nouvel objet XMLHttpRequest
        var xhr = new XMLHttpRequest();

        //Définir l'URL de la requête
        var url = "https://content-sheets.googleapis.com/v4/spreadsheets/1L355Z7znR7B5di99ipKnL9_JiN8LBf6VFfN83oXIFRc/values/knight!A2%3AD?key=AIzaSyB2Ny7AfLcyb-blIBpUICcwAkHJ7KOVGgs";

        console.log(url);

        //Ouvrir une connexion
        xhr.open("GET", url);

        //Envoyer la requête
        xhr.send();

        //Gérer la réponse
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                //traiter les données ici
                var values = data.values;
                allWords = [].concat(...values);
                rightWord = allWords[Math.floor(Math.random() * allWords.length)];
                console.log("RW = " + rightWord);
                resolve(rightWord);
            }
        }
    });
}