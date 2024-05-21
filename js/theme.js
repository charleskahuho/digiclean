const mode = document.getElementById("mode")

mode.innerHTML = "dark mode"

mode.addEventListener('click', function(e){
    e.preventDefault();
    if(content.classList.contains("content-dark")){
        menu.classList.remove("dark-menu");
        mode.innerHTML = "dark mode";
        content.classList.remove("content-dark")
        document.body.style.backgroundColor = "blue"
    }else{
        menu.classList.add("dark-menu");
        mode.innerHTML = "light mode"
        content.classList.add("content-dark")
        document.body.style.backgroundColor = "grey"
    }
})
