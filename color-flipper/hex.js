const hex = [0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F'];
const button = document.getElementById('btn');
const color = document.querySelector('.color');

button.addEventListener("click",function(){
    let col_hex = '#';
    for (let i = 0; i < 6; i++){
        let rand = Math.floor(Math.random() * ((hex.length) - 0) + 0);
        col_hex += hex[rand];
    }
    document.body.style.backgroundColor = col_hex;
    color.textContent = col_hex;
});