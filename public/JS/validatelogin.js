const  btnsp = document.querySelector('#loginbtn');
const emailform = document.querySelector('#emailform');
const passwordform = document.querySelector('#passwordform');
const warningemail = document.querySelector('#warning2');
const warningpassword = document.querySelector('#warning3');
// ********email validation*****************
emailform.addEventListener('input',(e)=>{
    let value = e.target.value;
    let pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    let valid = pattern.test(value);
    if(valid || value==""){
        btnsp.disabled = false;
        warningemail.innerHTML = ""
    }else{
        warningemail.innerHTML = "please enter a valid email";
        btnsp.disabled = true;
    }
});
// *******************password validation******************
passwordform.addEventListener('input',(e)=>{
    let value = e.target.value;
    let pattern = /^[A-Za-z]\w{7,14}$/;
    let valid = pattern.test(value);
    if(valid || value==""){
        btnsp.disabled = false;
        warningpassword.innerHTML = ""
    }else{
        warningpassword.innerHTML = "please enter a valid password at least 7 characters and max 14 characters";
        btnsp.disabled = true;
    }
});