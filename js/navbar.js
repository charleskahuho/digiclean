const navbar = document.getElementById("navbar")
const container = document.querySelector('#container')
const toggler = document.querySelector('#toggler')

toggler.addEventListener('click', function(){
    navbar.classList.toggle("show");
    
})