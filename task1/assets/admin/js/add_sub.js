window.addEventListener('load', () => {

    var pick_class = document.querySelectorAll('.form-group');
    pick_class[1].addEventListener('input', (e) => {
       console.log(e.target.value);
        if (e.target.value == 1) {
            let pick_prof = document.querySelectorAll('.form-group');
            pick_prof[2].style = 'display: block';
        } else {
            let pick_prof = document.querySelectorAll('.form-group');
            pick_prof[2].style = 'display: none';
        }
   });

    var submit_btn = document.querySelector('.btn-dark');
    submit_btn.addEventListener('click', (e) => {
        var field_valid = true;
        e.preventDefault();
        var sub_name = document.getElementById('subject_name');
        var s_value = sub_name.value;
        if (s_value == '') {
            field_valid = false;
            sub_name.style = 'border: 1px solid red';
            var error = sub_name.nextElementSibling;
            error.innerText = 'This field is required!';
            error.classList.add('err');
        } else if(field_valid) {
            sub_name.style = 'border: 1px solid #ced4da';
            var error = sub_name.nextElementSibling;
            error.innerText = '';
            document.querySelector('form').submit();
        } 
    });

});

