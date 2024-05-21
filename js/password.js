const field = document.querySelectorAll('.password');
const show = document.querySelectorAll('.show');

for (let i = 0; i < show.length; i++) {
    // const element = array[i];
    show[i].addEventListener('click', function(){
        if(field[i].type == "password"){
            field[i].type = "text";
            show[i].innerHTML = "hide"
        }else{
            field[i].type = "password";
            show[i].innerHTML = "show"
        }
    })
    
}