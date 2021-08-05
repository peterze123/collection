var count = 0;
// 
const value = document.querySelector('.value');
const btn = document.querySelectorAll('.btn');
//
btn.forEach(function(btn){
    btn.addEventListener('click', function(e){
        const type = e.currentTarget.classList;
        //
        if(type.contains('plus')){
            count += parseInt(e.currentTarget.id);
        }
        else if(type.contains('minus')){
            count -= parseInt(e.currentTarget.id);
        }
        //
        if(count < 0){
            value.style.color = 'red';
        }
        else{
            value.style.color = 'black';
        }
        value.textContent = count;
    });
});
//
function timing(){
    stop = false;
    if (count <= 0) {
        return;
    }
    x = setInterval(function(){
        if (count <= 1){
            clearInterval(x);
        }
        count -= 1;
        value.textContent = count;
    }, 1000);
}
//
function stopTimer(){
    clearInterval(x);
}
//
function reset(){
    clearInterval(x);
    count = 0;
}