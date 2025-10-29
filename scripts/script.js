let loginMenu = document.getElementById('login')

function openLoginMenu(parameter){
    if(parameter){
        loginMenu.style.transform = 'unset';
    }
    else{
        loginMenu.style.transform = 'translateY(-100dvh)';
    }
}