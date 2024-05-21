const btn = document.querySelectorAll('.btn')
const ans = document.querySelectorAll('.ans')
const sign = document.querySelectorAll('.sign')

for (let i = 0; i  < btn.length; i++) {

    sign[i].innerHTML = "+";
    
    btn[i].addEventListener('click', function(){
        ans[i].classList.toggle("shown")
        sign[i].innerHTML = "-";
        if(ans[i].classList.contains("shown")){
            sign[i].innerHTML = "+";
        }else{
            sign[i].innerHTML = "-";

        }

    })
}

