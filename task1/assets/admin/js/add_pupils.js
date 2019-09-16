window.addEventListener('load', () => {
    let inputs = document.querySelectorAll('input');
    console.log(inputs);
    let add_more = document.querySelector('.add');
    console.log(add_more);

    add_more.addEventListener('click', (e) => {
        let form = document.querySelectorAll('.form-group');
        console.log(form);

    });

    inputs.forEach(input => {
        // console.log(input);
        input.addEventListener('focus', (e) => {
            // e.target.style.background = 'pink';   
            // console.log(e.target.value); 
        });
        
        input.addEventListener('blur', (e) => {
            // e.target.style.background = 'red';    
            console.log(e.target.value); 
            console.log(e.target.name); 
            
        });

    });

});

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
