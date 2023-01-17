let add = document.querySelector('#Add');
let popup = document.querySelector('.popup');
let close = document.querySelector('#close');
let date = document.querySelector('#deadline');
let today = new Date().toISOString().split('T')[0];
date.setAttribute('min',today);

console.log('hello world');
add.addEventListener('click',()=>{
    popup.style.display = "block"; 
});
close.addEventListener('click',()=>{
    popup.style.display = "none";
})

