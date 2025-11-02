let isTuto = true;

let lastCard = 0;
let cardId = 1;
let cardTotal = document.getElementById('cardCounter').value;
let cardList = [];

for (let j = 0; j < cardTotal; j++) {
    cardList.push(j);
}
cardList.reverse();

let progression = 0;

let enCours = 0;
let acquis = 0; 
let score = 0;
let state = true;

let indexEnCours = [];


function openLoginMenu(parameter){
    if(parameter){
        document.getElementById('login').style.transform = 'unset';
    }
    else{
        document.getElementById('login').style.transform = 'translateY(-100dvh)';
    }
}
function showTuto(){
    if(isTuto){
        document.getElementById('tutorial').style.transform = 'translateY(100%)';
        isTuto = false;
    }
    else{
        document.getElementById('tutorial').style.transform = 'translateY(-150%)';
        isTuto = true;
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
    
    let newCardDiv = document.createElement("div");
    newCardDiv.innerHTML = '<label for="cardContent'+lastCard+'">Terme</label><input type="text" name="cardContent'+lastCard+'"><label for="cardContent'+lastCard+'">Définition</label><input type="text" name="cardDefinition'+lastCard+'"><input type="hidden" name="cardId'+cardId+'" value="'+cardId+'">';
    document.getElementById('cardList').appendChild(newCardDiv);

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
            document.getElementById('decksContainer').innerHTML += `<a href="deck.php?id=${data.decks[index].id}"><div class="deckCard"><h3>${data.decks[index].name}</h3><p>${data.decks[index].description}</p><div><p>${data.decks[index].author}</p><p>${data.decks[index].nbCards} termes</p></div></div></a>`;
        }
    })
    .catch(error => console.error("Erreur :", error));
}

// Cards

function flipCard(number){
    document.getElementsByClassName('cardContent')[number].style.transform += 'rotateY(180deg)';
}

document.getElementsByClassName('countersContainer')[0].innerHTML = '<p>En cours</p>'+enCours+'/'+cardTotal;
document.getElementsByClassName('countersContainer')[1].innerHTML = progression+'/'+cardTotal;
document.getElementsByClassName('countersContainer')[2].innerHTML = '<p>Acquis</p>'+acquis+'/'+cardTotal;

document.addEventListener("keydown", function(event) {
    if(cardList.length > 0){
        if (event.key === "ArrowRight") {

            document.getElementsByClassName('card')[cardList[0]].style.transform = 'translateX(150%)';
            document.getElementById('progressBar').style.transform += 'translateX('+ 100/cardTotal +'%)';
            
            cardList.splice(0, 1);  acquis++;   score++;    progression++;  
            document.getElementsByClassName('countersContainer')[2].innerHTML = '<p>Acquis</p>'+acquis+'/'+cardTotal;
  
        }else if (event.key === "ArrowLeft") {

            document.getElementsByClassName('card')[cardList[0]].style.transform = 'translateX(-150%)';
            document.getElementById('progressBar').style.transform += 'translateX('+ 100/cardTotal +'%)';
            indexEnCours.push(cardList[0]);
            
            cardList.splice(0, 1);  enCours++;  progression++;  
            document.getElementsByClassName('countersContainer')[0].innerHTML = '<p>En cours</p>'+enCours+'/'+cardTotal;

        }
        document.getElementsByClassName('countersContainer')[1].innerHTML = progression+'/'+cardTotal;

    }else if(state){
        if(cardList.length == 0){
            if(indexEnCours.length == 0){
                document.getElementById('cards').innerHTML += "<div id='endScore'><p>🎉 Bravo ! Score parfait :)</p><div><a href=''>Réessayer</a><a href='decks.php'>Essayer autre chose</a></div></div>";
                state = false;
            }else{
                if(((score/cardTotal)*100) >= 30){
                    document.getElementById('cards').innerHTML += "<div id='endScore'><p>🎉 Super ! Tu y es presque :)</p><div><a onclick='cycleCard()'>Reprendre mes erreurs</a><a href='decks.php'>Essayer autre chose</a></div></div>";
                }else if(score==0){
                    document.getElementById('cards').innerHTML += "<div id='endScore'><p>Ok mais sans enthousiasme</p><div><a onclick='cycleCard()'>Reprendre mes erreurs</a><a href='decks.php'>Essayer autre chose</a></div></div>";
                }
                state = false;
            }
            
        }
    }
});

function cycleCard(){
    
    document.getElementById('endScore').style.transform = 'translateX(200%)';
    document.getElementById('progressBar').style.transform += 'translateX(-100%)';
    setTimeout(() => {
        document.getElementById('endScore').remove();
        progression = 0; enCours = 0; acquis = 0; score = 0;
    }, 500);
    for (let i = 0; i < indexEnCours.length; i++) {
        cardList.push(indexEnCours[i]);
        document.getElementsByClassName('card')[indexEnCours[i]].style.transform = 'unset';
    }
    indexEnCours = [];  cardTotal = cardList.length;  state = true;

}



