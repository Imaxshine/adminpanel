const nameBtn = document.getElementById('name');
const passwordBtn = document.getElementById('password');
const submitBtn = document.getElementById('btn');
// create nameBtn function

function myInputs(){
    if(nameBtn.value.trim() !=="" && passwordBtn.value.trim() !=="")
    {
        document.getElementById('btn').removeAttribute('disabled');
        document.getElementById('btn').style.cursor = "pointer";
    }else{
        document.getElementById('btn').setAttribute('disabled',true);
        document.getElementById('btn').style.cursor = "no-drop";
    }
}
nameBtn.addEventListener('input',myInputs);
passwordBtn.addEventListener('input', myInputs);
    //==========================================================//
function Name()
{
    if(nameBtn.value.length < 3){
        document.querySelector('.name-error').textContent = "Your name is too short";
        submitBtn.style.cursor = "no-drop";
        submitBtn.setAttribute('disabled', true);
    }else{
        document.querySelector('.name-error').textContent = "";
        submitBtn.style.cursor = "pointer";
    }
}
function Password()
{
    if(passwordBtn.value.length < 6 || passwordBtn.value.trim() =="")
    {
        document.querySelector('.pass-error').textContent = "Password is very poor!";
        submitBtn.setAttribute('disabled', true);
        submitBtn.style.cursor = "no-drop";
    }else if (passwordBtn.value.length > 12)
    {
        document.querySelector('.pass-error').textContent = "Password is too long to recall";
        submitBtn.setAttribute('disabled', true);
        submitBtn.style.cursor = "no-drop";
    }else{
        document.querySelector('.pass-error').textContent = "";
        submitBtn.removeAttribute('disabled');
        submitBtn.style.cursor = "pointer";
    }
}
passwordBtn.addEventListener('input',Password);
nameBtn.addEventListener('input',Name);
// password show & Hide
const Icon = document.getElementById('showHide');

Icon.addEventListener('click',()=>{
    if(passwordBtn.type === 'password'){
        passwordBtn.type = 'text';
        Icon.classList.contains('bi-eye-slash');
        Icon.classList.remove('bi-eye-slash');
        Icon.classList.add('bi-eye')
    }else{
        passwordBtn.type = 'password';
        Icon.classList.contains('bi-eye');
        Icon.classList.remove('bi-eye');
        Icon.classList.add('bi-eye-slash')
    }
})