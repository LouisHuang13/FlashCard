let loginMenu = document.getElementById('login');
let createDivForm = document.getElementById('createDivForm');

let count = 1;

function openLoginMenu(parameter){
    if(parameter){
        loginMenu.style.transform = 'unset';
    }
    else{
        loginMenu.style.transform = 'translateY(-100dvh)';
    }
}

function addCard(){
    count++;
    createDivForm.innerHTML += '<div><p>'+ count +'</p><label for="cardContent">Terme</label><input type="text" name="cardContent"><label for="cardContent">Définition</label><input type="text" name="cardDefinition"></div>';

}