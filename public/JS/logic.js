
let add = document.querySelector('#Add');
let popup = document.querySelector('.popup');
let close = document.querySelector('#close');
let date = document.querySelector('#deadline');
let date1 = document.querySelector('#deadline1');
let today = new Date().toISOString().split('T')[0];
date.setAttribute('min', today);
date1.setAttribute('min', today);

console.log('hello world');
add.addEventListener('click', () => {
    popup.style.display = "block";
});
close.addEventListener('click', () => {
    popup.style.display = "none";
})
// *****************************click to update******************
let btnup = document.querySelectorAll('#upp');
btnup.forEach(element => {
    element.addEventListener('click', () => {
        document.querySelector('.update').style.display = "block";

    })
});
document.querySelector('#closeit').addEventListener('click', () => {
    document.querySelector('.update').style.display = "none";

})

// ********************update the tasks in popup********************
$(document).ready(function () {
    $(document).on('click', 'a[data-role=update]', function () {

        var id = $(this).data('id');
        var name = $('#' + id).children('h5[data-target=name]').text();
        var description = $('#' + id).children('p[data-target=desc]').text();
        var deadline = $('#' + id).children('p[data-target=dead]').text();
        var status = $('#' + id).children('p[data-target=status]').text();
        console.log(status);
        // console.log(deadline);
        $('#idname').val(name);
        $('#iddesc').val(description);
        $('#deadline1').val(deadline);
        $('#idd').val(id);
        $('#selectstatus').val(status);
        $('#save').click(function () {
            var id = $('#idd').val();
            var name = $('#idname').val();
            var desc = $('#iddesc').val();
            var deadline = $('#deadline1').val();
            var sts = $('#selectstatus').val();

            $.ajax({
                url: 'http://localhost/TaskBoard/public/Tasks/update',
                method: 'POST',
                data: { name: name, desc: desc, deadline: deadline, id: id, sts: sts },
                success: function (response) {
                    console.log(response);
                    location.reload(true);
                    // $('#'+id).children('h5[data-target=name]').text(name);
                    // $('#'+id).children('p[data-target=desc]').text(desc);
                    // $('#'+id).children('p[data-target=dead]').text(deadline);
                    // $('#'+id).children('p[data-target=status]').text(sts);
                    // $('.update').css("display","none");

                }
            })
        });

    })
})
// **********************Counter****************
let affiche = document.querySelectorAll('#count');
let countto = document.querySelector('.to-do');
let countdoing = document.querySelector('.doing');
let countdone = document.querySelector('.done');
affiche[0].textContent = (countto.childElementCount - 1);
affiche[1].textContent = (countdoing.childElementCount - 1);
affiche[2].textContent = (countdone.childElementCount - 1);



// **********************image drop****************
const drp = document.querySelector('#imgdrop');
const drop = document.querySelector('.drop');
drp.addEventListener('click', () => {
    // drop.classList.toggle('hide');
    if(drop.style.display === "none" || drop.style.display === ""){
        drop.style.display = "block"
    }else{
        drop.style.display = "none"
    }
});
// ******************Search btn************************
var seachinput = document.querySelector('#search');
// ******************Search logic************************
let Names = document.querySelectorAll('.Names');
seachinput.addEventListener('input', (e) => {
    let filter = e.target.value;
    filter = filter.toUpperCase();
    for (let i = 0; i < Names.length; i++) {
        let a = Names[i].innerHTML || Names[i].textContent;
        a = a.toUpperCase();
        if (a.indexOf(filter) > -1) {
            Names[i].parentElement.style.display = "block";
        } else {
            Names[i].parentElement.style.display = "none";
        }
    }
})
// ********************Search done************************
// *************************Add multiple Tasks**************

const task = document.querySelector('#tasknumber');
let pop = document.querySelector('.inputholder');
task.addEventListener('input', () => {
    pop.innerHTML = "";
    let i = task.value;
    if(i > 1){
        let j = 2;
        while(j <= i){

            pop.innerHTML +=`<div class="mb-1">
            <label for="exampleInputEmail1" class="form-label">Task Name :${j}</label>
            <input type="text" name="Tname${j}" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-1">
            <label for="exampleInputEmail1" class="form-label">Task Description :${j}</label>
            <input type="text" name="Tdescription${j}" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-1">
            <label for="exampleInputEmail1" class="form-label">Task status :${j}</label>
            <select class="form-select" name="Tstatus${j}" aria-label="Default select example">
                <option selected value="TO DO">TO DO</option>
                <option value="In Progress">In Progress</option>
                <option value="Done">Done</option>
            </select>
            </div>
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Deadline :${j}</label>
                <input id="deadline" type="Date" name="Tdeadline${j}" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>
            `; 
            j++;
            
        }
    }
    

})

