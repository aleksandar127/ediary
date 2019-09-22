window.addEventListener('load', () => {
    let submit = document.querySelector('.btn-dark');
    console.log(submit);
    submit.addEventListener('click', (e) => {
        e.preventDefault();
        console.log('kliknula si');
        let notification_field = document.querySelector('textarea');
        let notification_value = notification_field.value;
        if (notification_value === '') {
            console.log('prazno');
            display_error(notification_field, 'required');
        }  else {
            document.querySelector('form').submit();
        }

    });
});

function display_error(field, key){
    var errors_lookup = {
        'required': 'This field is required',
    };

    field.style = "border: 1px solid red";
    var error_el = document.querySelector('[name="' + field.name + '"] + p');
    error_el.innerText = errors_lookup[key];
    error_el.classList.add('err');

}
