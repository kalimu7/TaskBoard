


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
// *****************************click to update******************
let btnup = document.querySelectorAll('#upp');
btnup.forEach(element => {
    element.addEventListener('click',()=>{
        document.querySelector('.update').style.display="block";

    })
});
document.querySelector('#closeit').addEventListener('click',()=>{
    document.querySelector('.update').style.display="none";

})

// ********************update the tasks in popup********************
$(document).ready(function(){
    $(document).on('click','a[data-role=update]',function(){
        
        var id = $(this).data('id');
        var name = $('#'+id).children('h5[data-target=name]').text();
        var description = $('#'+id).children('p[data-target=desc]').text();
        var deadline = $('#'+id).children('p[data-target=dead]').text();
        // console.log(name);
        console.log(deadline);
        $('#idname').val(name);
        $('#iddesc').val(description);
        $('#deadline1').val(deadline);
        
    })
})

