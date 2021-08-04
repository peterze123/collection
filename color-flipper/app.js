const colors = ['red', 'orange', 'yellow','green', 'blue', 'indigo','violet'];
const button = document.getElementById('btn');
const color = document.querySelector('.color');

button.addEventListener("click", function(){
    const random = Math.floor(Math.random() * colors.length); 
    console.log(random);

    document.body.style.backgroundColor = colors[random];
    color.textContent = colors[random];
});