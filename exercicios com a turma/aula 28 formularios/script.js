
const password = document.getElementById('isenha');
const icon = document.getElementById('icon');

function invisivelVisivel(){
    if(password.type === 'password'){ password.setAttribute('type', 'text');
        icon.classList.add('visivel')
    }
    else{
       password.setAttribute('type', 'password');
       icon.classList.remove('visivel') 
    }
    
}