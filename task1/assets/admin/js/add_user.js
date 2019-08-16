window.addEventListener('load', ()=>{
    var form = document.querySelector('form');
    var add_btn = document.querySelector('.btn');
    // console.log(add_btn);

    add_btn.addEventListener('click', (e)=>{
        e.preventDefault();
        validate_form();
    });
});

function validate_form(){
    var inputs = document.querySelectorAll('input');
    // console.log(inputs);
    inputs.forEach(input => {

        var field_valid = true;
        var i_value = input.value.trim();
        var i_name = input.name;
        // console.log(i_name + ':'+ i_value);

        if (i_value == '') {
            field_valid = false;
            display_error(input, 'required');
            
        } else {
            remove_error(input);
        }

        if (field_valid) {
            if (field_valid) {
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
                        console.log('validiraj USERNAME');
                        
                        break;
                        case 'password':
                        console.log('validiraj PASS');
                        
                        break;
                        
                        case 're_password':
                        console.log('validiraj DA LI su iste sifre');

                        break;

                    default:
                    // code block
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