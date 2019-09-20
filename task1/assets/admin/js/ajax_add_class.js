window.addEventListener('load', () => {
    var submit = document.querySelector('input[type="submit"]');

    submit.addEventListener('click', (e) => {
        e.preventDefault();
        var form = document.querySelector('form');
        validate_form(form);
        errors_exist(form);
    });

    var pick_class = document.getElementById('cls_h_l');

    pick_class.addEventListener('input', (e) => {
        if (e.target.value == 1) {
            remove_error(pick_class);
            console.log('visi');
            ajax_call(1);
        } else if (e.target.value == 0) {
            remove_error(pick_class);
            // console.log('nizi');
            ajax_call(0);
        } else {
            display_error(pick_class, 'not_selected');
            var form_select = document.querySelectorAll('.form-group')[2];
            form_select.style = "display : none;";
        }
    });

  

});

function ajax_call(high_low){
    var select_prof = document.getElementById('select_head');
    var is_children = select_prof.children;
    if (is_children.length > 0) {
        select_prof.innerHTML = '';
    }

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var res = JSON.parse(this.responseText);

            res.forEach(response => {
                var options = `<option value="${response['id']}">${response['first_name']} ${response['last_name']}</option>`;
                console.log(options);
                var form_gr_select = document.querySelectorAll('.form-group')[2];
                form_gr_select.style = "display : block;";
                var select_prof = document.getElementById('select_head');
                select_prof.insertAdjacentHTML('beforeend', options);
            });

        }
    };

    xhttp.open("GET", "http://localhost/eDiary/task1/admin/fetch_heads?high_low="+ high_low, true);
    xhttp.send();

}

function validate_form(form_el){


    var inputs = form_el.querySelectorAll('input:not([type="submit"])');
    var select = form_el.querySelector('#cls_h_l');



    if (select.value == 'null') {
        display_error(select, 'not_selected');
    }
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
            switch (i_name) {
                case 'puple':
                    if (i_value.length < 3) {
                        field_valid = false;
                        display_error(input, 'minlength');
                    }
                    break;
                case 'puple_surname':
                    if (i_value.length < 3) {
                        field_valid = false;
                        display_error(input, 'minlength');
                    }
                    break;
                case 'parent':
                    if (i_value.length < 3) {
                        field_valid = false;
                        display_error(input, 'minlength');
                    }
                    break;
                case 'parent_surname':
                    if (i_value.length < 3) {
                        field_valid = false;
                        display_error(input, 'minlength');
                    }
                    break;
                case 'parent_username':
                    if (i_value.length < 3) {
                        field_valid = false;
                        display_error(input, 'minlength');
                    }
                    break;
                case 'parent_pass':
                    if (i_value.length < 6) {
                        field_valid = false;
                        display_error(input, 'minlength_psw');
                    }
                    break;
                case 'parent_re_pass':
                    if (i_value.length < 6) {
                        field_valid = false;
                        display_error(input, 'minlength-psw');
                    } else if (field_valid) {
                        var psw_value = document.querySelector('[name="parent_pass"]').value;
                        var re_psw_value = document.querySelector('[name="parent_re_pass"]').value;
                        console.log(psw_value);
                        console.log(re_psw_value);
                        if (re_psw_value !== psw_value) {
                            display_error(input, 'password-not-match');
                        } else {
                            console.log('iste su sifre');
                        }
                    }
                    break;

                
                }
            }
    });
}


function display_error(field, key) {
    var errors_lookup = {
        'required': 'Unos ovog polja je obavezan!',
        'minlength': 'Ukucajte najmanje 3 slova!',
        'not_selected' : 'Morate da izaberete vrstu odeljenja!',
        'minlength_psw': 'Šifra mora sadržati najmanje 6 karaktera.',
        'password-not-match': 'Šifre se ne poklapaju!'
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

function errors_exist(form_el) {
    var errors = document.querySelectorAll('p.err');
    if (errors.length == 0) {
        form_el.submit();
    }
}