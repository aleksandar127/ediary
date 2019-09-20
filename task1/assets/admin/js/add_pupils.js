window.addEventListener('load', () => {
    //Variables
    let btn_submit = document.querySelectorAll('.btn-dark');
    let add_more = document.querySelector('.add');
    let inside_form = document.querySelector('.row');
    let counter = 1;
    let max_rows = 19;
    let x = 1;
    let psw_value = null;

    //when click on add more btn, validate existing fields than add more inputs for more pupils
    add_more.addEventListener('click', (e) => {
        e.preventDefault();

        validate_previous_fields();
        let html = `
        <div class="row aditional_row">
            <div class="form-group">
                <label for="puple_n">Ime:</label>
                <input type="text" class="form-control" id="puple_n" name="puple_n${counter}" placeholder="Petar">
                <p></p>
            </div>
            <div class="form-group">
                <label for="puple_s">Prezime:</label>
                <input type="text" class="form-control" id="puple_s" name="puple_s${counter}" placeholder="Petrović">
                <p></p>
            </div>
            <div class="form-group">
                <label for="puple_n">Ime roditelja:</label>
                <input type="text" class="form-control" id="parent_n" name="parent_n${counter}" placeholder="Petar">
                <p></p>
            </div>
            <div class="form-group">
                <label for="puple_s">Prezime roditelja:</label>
                <input type="text" class="form-control" id="parent_s" name="parent_s${counter}" placeholder="Petrović">
                <p></p>
            </div>
            <div class="form-group">
                <label for="parent_usr">Username roditelja:</label>
                <input type="text" class="form-control" id="parent_usr" name="parent_username${counter}" placeholder="mikica">
                <p></p>
            </div>
    
            <div class="form-group">
                <label for="pass">Generisati šifru roditelja:</label>
                <input type="text" class="form-control" id="pass" name="parent_pass${counter}" placeholder="123456">
                <p></p>
            </div>
    
            <div class="form-group">
                <label for="re_pass">Potvrditi šifru:</label>
                <input type="text" class="form-control" id="re_pass" name="parent_re_pass${counter}" placeholder="123456">
                <p></p>
            </div>
        <a class="remove_form">&#10006;</a>
        </div>`;
        var errors = document.querySelectorAll('p.err');
        if (errors.length == 0) {
            if (x <= max_rows) {
                counter++;  
                inside_form.insertAdjacentHTML('beforeend', html);
                x++;    
            }
        }



       //when click on 'x' sign remove specific fields from form
        let remove_form = document.querySelectorAll('.remove_form');
        remove_form.forEach(remove => {
            remove.addEventListener('click', (e) => {
                let remove_pec_fields = remove.parentNode.remove();
                x--;
            });
        });

       
    });

    
  



});


function validate_previous_fields(){
    // let names_arr = {};
    let inputs = document.querySelectorAll('input');
    inputs.forEach(input => {
        let field_valid = true;
        let name = input.name;
        // console.log(name);
        let value = input.value.trim();
        let id = input.id;
        // console.log(id);
        // names_arr[name] = value;
      
        if (value == '') {
            field_valid = false;
            display_error(input, 'required');
            
        } else {
            remove_error(input);
        }

        if (field_valid) {
            switch (id) {
                case 'puple_n':
                    if (value.length < 4) {
                        field_valid = false;
                        display_error(input, 'minlength');
                    }
                    break;
                    
                case 'puple_s':
                    if (value.length < 4) {
                        field_valid = false;
                        display_error(input, 'minlength');
                    }
                    break;
                    
                case 'parent_n':
                    if (value.length < 4) {
                        field_valid = false;
                        display_error(input, 'minlength');
                    }
                    break;
                case 'parent_s':
                    if (value.length < 4) {
                        field_valid = false;
                        display_error(input, 'minlength');
                    }  
                    break;
                case 'parent_usr':
                    if (value.length < 4) {
                        field_valid = false;
                        display_error(input, 'minlength');
                    }  
                    break;
                case 'pass':
                    // console.log(pass_name);
                    psw_value = input.value;
                    if (value.length < 6) {
                        field_valid = false;
                        display_error(input, 'minlength-psw');
                    }  
                    break;
                    
                case 're_pass':
                    if (value.length < 6) {
                        field_valid = false;
                        display_error(input, 'minlength-psw');
                    } else if (field_valid) {
                        let re_psw_value = input.value;
                        console.log(re_psw_value);
                        console.log(psw_value);
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



