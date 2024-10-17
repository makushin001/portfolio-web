var submit_btn = document.querySelector('.blog-submit-btn');
submit_btn.addEventListener('click', function(e) {
    var month = document.querySelector('#month');
    var year = document.querySelector('#year');
    if (month.value == '' || year.value == '') {
        alert('Please select both month and year before submitting the form.');
        e.preventDefault();
        return;
    }
});