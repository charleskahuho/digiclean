const state = document.querySelectorAll('.state')


for(i = 0; i < state.length; i++){
    const val = state[i].innerHTML.toLowerCase();
    if(val[i] == "inactive"){
        state[i].style.backgroundColor = "crimson";
    }else{
        state[i].style.backgroundColor = "green";
    }

}