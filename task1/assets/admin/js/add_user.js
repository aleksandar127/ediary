window.addEventListener('load', ()=>{
    var form = document.querySelector('form');
    var add_btn = document.querySelector('.btn');

    add_btn.addEventListener('click', (e)=>{
        e.preventDefault();
        validate_form();
        errors_exists(form);
    });
});

function validate_form(){
    var inputs = document.querySelectorAll('input');
    inputs.forEach(input => {

        var field_valid = true;
        var i_value = input.value.trim();
        var i_name = input.name;

        if (i_value == '') {
            field_valid = false;
            display_error(input, 'required');
            
        } else {
            remove_error(input);
        }

        if (field_valid) {
            if (field_valid && i_name != null) {
                switch (i_name) {
                    case 'first_name':
                        if (i_value.length < 4) {
                            field_valid = false;
                            display_error(input, 'minlength');
                        }
                        break;
                        
                    case 'last_name':
                        if (i_value.length < 4) {
                            field_valid = false;
                            display_error(input, 'minlength');
                        }
                        break;
                        
                    case 'username':
                        if (i_value.length < 4) {
                            field_valid = false;
                            display_error(input, 'minlength');
                        }
                        break;
                    case 'password':
                        if (i_value.length < 6) {
                            field_valid = false;
                            display_error(input, 'minlength-psw');
                        }  
                        break;
                        
                    case 're_password':
                        if (i_value.length < 6) {
                            field_valid = false;
                            display_error(input, 'minlength-psw');
                        } else if (field_valid) {
                            var psw_value = inputs[3].value;
                            var re_psw_value = inputs[4].value;
                            if (re_psw_value !== psw_value) {
                                display_error(input, 'password-not-match');
                            } else {
                                console.log('iste su sifre');
                            }
                        }
                        break;
                    } 
                }
            }
         });
}

function display_error(field, key){
    var errors_lookup = {
        'required': 'This field is required',
        'minlength': 'Type at least 4 characters.',
        'minlength-psw': 'Type at least 6 characters.',
        'password-not-match': 'Passwords doesn\'t match.'
    };

    field.style = "border: 1px solid red";
    var error_el = document.querySelector('[name="' + field.name + '"] + p');
    error_el.innerText = errors_lookup[key];
    error_el.classList.add('err');

}

function remove_error(field) {

    field.style = "border: 1px solid rgb(206, 212, 218)";
    var error_el = document.querySelector('[name="' + field.name + '"] + p');
    error_el.innerText = '';
    error_el.classList.remove('err');
}

function errors_exists(form_el) {
    var errors = document.querySelectorAll('p.err');
    if (errors.length == 0) {
        form_el.submit();
    }
}