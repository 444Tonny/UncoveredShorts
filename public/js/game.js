function openModalById(modalId) {
    document.getElementById("modalBackground").style.display = "flex";
    
    document.getElementById(modalId).style.display = "flex";
}

function closeModalById(modalId) {
    document.getElementById("modalBackground").style.display = "none";
    document.getElementById(modalId).style.display = "none";
}