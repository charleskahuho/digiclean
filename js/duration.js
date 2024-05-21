const time = document.getElementById("time");

const today  = new Date();
const hour = today.getHours();

// console.log(hour)
if(hour >=0 && hour <=11){
    console.log("morning");
    time.innerHTML = "morning";
}else if(hour >= 12 && hour <=14){
    // console.log("afternoon");
    time.innerHTML = "afternoon";
}else if(hour < 19){
    // console.log("evening");
    time.innerHTML = "evening";
}else{
    // console.log("Night");
    time.innerHTML = "night";
}

