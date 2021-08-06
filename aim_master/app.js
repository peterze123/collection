const person = document.getElementById("container")
const body = document.getElementById("body");
const head = document.getElementById("head");
const sec = document.getElementById("sec");
const h_time = document.getElementById("h-time");
const num_round = 30;
//
var round = 0;
var headshots = 0;
var target;
//
var createdtime;
var eliminatedtime;
var reactiontime;
var avg_reactiontime;
//
function random_color() {
    var o = Math.round, r = Math.random, s = 255;
    return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
}
//
function new_enemy(){
    if (round == num_round){
        return;
    }
    //
    let min = 0;
    let max = window.innerHeight - 200;
    let top = Math.floor(Math.random() * (max - min + 1)) + min;
    max = window.innerWidth - 200;
    let left = Math.floor(Math.random() * (max - min + 1)) + min;
    //
    let dimension;
    if (window.innerHeight > window.innerWidth){
        dimension = window.innerHeight/10;
    }
    else{
        dimension = window.innerWidth/10;
    }
    person.style.setProperty("--dimension", dimension + "px");
    person.style.top = top + "px";
    person.style.left = left + "px";
    //
    let deg = Math.floor(Math.random() * (-45 - 45+ 1)) + 45;
    person.style.setProperty("--degree", deg + "deg");
    //
    body.style.backgroundColor = random_color();
    //
    let rad = Math.floor(Math.random() * (50 - 0 + 1)) + 0;
    person.style.setProperty("--radius", rad + "%");
    //
    let width = Math.floor(Math.random() * (40 - 20 + 1)) + 20;
    person.style.setProperty("--width", width + "%");
    //
    let height = Math.floor(Math.random() * (7 - 3 + 1)) + 3;
    person.style.setProperty("--height", height + "rem");
    //
    let time = Math.random()*2000;
    setTimeout(function(){
        person.style.display = "flex";
    }, time);
    createdtime = Date.now();
}
//
function make_char(){
    //
    target = {
        health: 3,
        eliminate: function(){
            if (target.health <= 0){
                eliminatedtime = Date.now();
                reactiontime = (eliminatedtime - createdtime) / 1000;
                sec.innerHTML = reactiontime;
                //
                person.style.display = "none";
                return true;
            }
        }
    };
    new_enemy();
    round++;
}
//
make_char();
//
body.addEventListener("click", function(){
    target.health -= 1;
    if(target.eliminate()){
        make_char();
    }
});
//
head.addEventListener("click",function(){
    headshots++;
    h_time.innerHTML = headshots;
    //
    target.health -= 3;
    target.eliminate();
    make_char();
});
//
