
let lastCard = 0;
let cardId = 1;
let cardTotal = document.getElementById('cardCounter').value;
let cardCounter = document.getElementById('cardCounter').value - 1;
let progression = 0;

let enCours = 0;
let acquis = 0;
let score = 0;

let indexEnCours = [];

function openLoginMenu(parameter){
    if(parameter){
        document.getElementById('login').style.transform = 'unset';
    }
    else{
        document.getElementById('login').style.transform = 'translateY(-100dvh)';
    }
}

function getDeck(deckId) {
    document.getElementById('cardList').innerHTML = "";
    let formData = new FormData();
    formData.append("deckId", deckId);
    
    fetch("actions/getDeckId.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        data.cards.forEach((card, index) => {
            document.getElementById('cardList').innerHTML += `<div><label for="cardContent${index + 1}">Terme</label><input type="text" value="${card.side1}" name="cardContent${index + 1}"><label for="cardContent${index + 1}">Définition</label><input type="text" value="${card.side2}" name="cardDefinition${index + 1}"><input type="hidden" name="cardId${card.id}" value="${card.id}"></div>`;
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
    document.getElementById('cardList').innerHTML += '<div><label for="cardContent'+lastCard+'">Terme</label><input type="text" name="cardContent'+lastCard+'"><label for="cardContent'+lastCard+'">Définition</label><input type="text" name="cardDefinition'+lastCard+'"><input type="hidden" name="cardId'+cardId+'" value="'+cardId+'"></div>';

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
            document.getElementById('decksContainer').innerHTML += `<a href="deck.php?id=${data.decks[index].id}"><div class="deckCard"><h3>${data.decks[index].name}</h3><p>${data.decks[index].author}</p></div></a>`;
        }
    })
    .catch(error => console.error("Erreur :", error));
}

// Cards

function flipCard(number){
    document.getElementsByClassName('cardContent')[number].style.transform += 'rotateY(180deg)';
}

document.getElementsByClassName('countersContainer')[0].innerHTML = enCours+'/'+cardTotal;
document.getElementsByClassName('countersContainer')[1].innerHTML = progression+'/'+cardTotal;
document.getElementsByClassName('countersContainer')[2].innerHTML = acquis+'/'+cardTotal;

document.addEventListener("keydown", function(event) {
    if(cardCounter >= 0){
        if (event.key === "ArrowRight") {
            document.getElementsByClassName('card')[cardCounter].style.transform = 'translateX(150%)';
            document.getElementById('progressBar').style.transform += 'translateX('+ 100/cardTotal +'%)';
    
            cardCounter --; acquis++;
            document.getElementsByClassName('countersContainer')[2].innerHTML = acquis+'/'+cardTotal;

            progression++;
            document.getElementsByClassName('countersContainer')[1].innerHTML = progression+'/'+cardTotal;
        }else if (event.key === "ArrowLeft") {
            document.getElementsByClassName('card')[cardCounter].style.transform = 'translateX(-150%)';
            document.getElementById('progressBar').style.transform += 'translateX('+ 100/cardTotal +'%)';
            indexEnCours.push(cardCounter);
            console.log(indexEnCours);
            cardCounter --; enCours++;
            document.getElementsByClassName('countersContainer')[0].innerHTML = enCours+'/'+cardTotal;

            progression++;
            document.getElementsByClassName('countersContainer')[1].innerHTML = progression+'/'+cardTotal;
        }

    }else {
        
    }
});

