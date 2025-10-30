
let lastCard = 0;
let cardId = 1;

function openLoginMenu(parameter){
    if(parameter){
        document.getElementById('login').style.transform = 'unset';
    }
    else{
        document.getElementById('login').style.transform = 'translateY(-100dvh)';
    }
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
            document.getElementById('cards').innerHTML += `<div><label for="cardContent${index + 1}">Terme</label><input type="text" value="${card.side1}" name="cardContent${index + 1}"><label for="cardContent${index + 1}">Définition</label><input type="text" value="${card.side2}" name="cardDefinition${index + 1}"><input type="hidden" name="cardId${card.id}" value="${card.id}"></div>`;
            lastCard = index + 1;
            cardId = card.id;
        });
    })
    .catch(error => console.error("Erreur :", error));
}

function addCard(event){
    event.preventDefault();
    lastCard++; cardId ++;
    document.getElementById('count').value = lastCard;
    document.getElementById('cards').innerHTML += '<div><p>'+ lastCard +'</p><label for="cardContent'+lastCard+'">Terme</label><input type="text" name="cardContent'+lastCard+'"><label for="cardContent'+lastCard+'">Définition</label><input type="text" name="cardDefinition'+lastCard+'"><input type="hidden" name="cardId'+cardId+'" value="'+cardId+'"></div>';

}

// Search

function search(search) {
    
    let formData = new FormData();
    formData.append("search", search);
    
    fetch("actions/searchFlashcards.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('decksContainer').innerHTML = "<hr>";
        for (let index = 0; index < data.decks.length; index++) {
            document.getElementById('decksContainer').innerHTML += `<a href=""><div class="deckCard"><h3>${data.decks[index].name}</h3><p>${data.decks[index].author}</p></div></a>`;
        }
    })
    .catch(error => console.error("Erreur :", error));
}

