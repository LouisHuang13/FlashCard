
let count = 1;

function openLoginMenu(parameter){
    if(parameter){
        document.getElementById('login').style.transform = 'unset';
    }
    else{
        document.getElementById('login').style.transform = 'translateY(-100dvh)';
    }
}

function addCard(){
    count++;
    document.getElementById('cards').innerHTML += '<div><p>'+ count +'</p><label for="cardContent">Terme</label><input type="text" name="cardContent"><label for="cardContent">Définition</label><input type="text" name="cardDefinition"></div>';

}

function getDeck(deckId) {
    document.getElementById('cards').innerHTML = "";
    let formData = new FormData();
    formData.append("deckId", deckId);
    
    fetch("actions/getDeckId.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        data.cards.forEach((card, index) => {
            document.getElementById('cards').innerHTML += `<div><label for="cardContent">Terme</label><input type="text" value="${card.side1}" name="cardContent${index + 1}"><label for="cardContent">Définition</label><input type="text" value="${card.side2}" name="cardDefinition${index + 1}"></div>`;
        });
    })
    .catch(error => console.error("Erreur :", error));
}