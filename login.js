login_btn = document.querySelector('.submit-button');
login_btn.addEventListener('click', function(e){
    var email  = document.querySelector('#email');
    var password = document.querySelector('#password');
    console.log("hey");
    if (email.value == '' || password.value == '') {
        e.preventDefault();
        window.alert('Please fill in all fields');
    }
});