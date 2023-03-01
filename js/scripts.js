function openClassDetail(evenement){
    evenement.preventDefault();
    console.log("openDetail");
    evenement.target.closest(".class-card").nextElementSibling.classList.toggle("class-detail-hidden");
    evenement.target.closest(".class-card").classList.toggle("class-card-hidden");
}
function closeClassDetail(evenement){
    evenement.preventDefault();
    console.log("closeDetail");
    evenement.target.closest(".class-detail").previousElementSibling.classList.toggle("class-card-hidden");
    evenement.target.closest(".class-detail").classList.toggle("class-detail-hidden");
}

const classCards = document.getElementsByClassName("class-card")

for (i=0; i < classCards.length; i++){
    // console.log(classCards[i].getElementsByClassName("button-open")[0])
    //console.log(classCards[i].nextElementSibling.getElementsByClassName("button-close")[0])
    
    classCards[i].getElementsByClassName("button-open")[0].addEventListener("click",(evenement) => openClassDetail(evenement));
    classCards[i].nextElementSibling.getElementsByClassName("button-close")[0].addEventListener("click", closeClassDetail);
}