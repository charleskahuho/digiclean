const toggle = document.getElementById("toggle")
const menu = document.getElementById("menu")
const content = document.getElementById("content")

toggle.addEventListener('click', function(){
    menu.classList.toggle("show");
})

content.addEventListener('click', function(){
    menu.classList.remove("show");
})