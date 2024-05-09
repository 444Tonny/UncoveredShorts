function openModalById(modalId) {
    document.getElementById("modalBackground").style.display = "flex";
    
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
    console.log('pA = ' +playerAnswer);
    var foundAnswer = arrayAnswer.find(answer => answer.value && answer.value.toLowerCase() === playerAnswer);

    console.log(foundAnswer);

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
    } else {
        return 0; // Return 0 if answer is not found
    }
}