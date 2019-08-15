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
            console.log(input);
            // display_error(input, 'required');
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

    var error_el = document.querySelector('[name="' + field.name + '"] + p');
    error_el.innerText = errors_lookup[key];
    error_el.classList.add('err');

}