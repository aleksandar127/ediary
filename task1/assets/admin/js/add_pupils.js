window.addEventListener('load', () => {
    //Variables
    let btn_submit = document.querySelectorAll('.btn-dark');
    let add_more = document.querySelector('.add');
    let inside_form = document.querySelector('.row');
    let counter = 1;
    console.log(counter);
    let html = `
    <div class="row aditional_row">
    <div class="form-group">
            <label for="puple_n">Ime:</label>
            <input type="text" class="form-control" id="puple_n" name="puple_n${counter}[]" placeholder="Petar">
            <p></p>
        </div>
        <div class="form-group">
            <label for="puple_s">Prezime:</label>
            <input type="text" class="form-control" id="puple_s" name="puple_s[]" placeholder="Petrović">
            <p></p>
        </div>
        <div class="form-group">
            <label for="puple_n">Ime roditelja:</label>
            <input type="text" class="form-control" id="puple_n" name="parent_n[]" placeholder="Petar">
            <p></p>
        </div>
        <div class="form-group">
            <label for="puple_s">Prezime roditelja:</label>
            <input type="text" class="form-control" id="puple_s" name="parent_s[]" placeholder="Petrović">
            <p></p>
        </div>
        <div class="form-group">
            <label for="parent_usr">Username roditelja:</label>
            <input type="text" class="form-control" id="parent_usr" name="parent_username[]" placeholder="mikica">
            <p></p>
        </div>

        <div class="form-group">
            <label for="pass">Generisati šifru roditelja:</label>
            <input type="text" class="form-control" id="pass" name="parent_pass[]" placeholder="123456">
            <p></p>
        </div>

        <div class="form-group">
            <label for="re_pass">Potvrditi šifru:</label>
            <input type="text" class="form-control" id="re_pass" name="parent_re_pass[]" placeholder="123456">
            <p></p>
        </div>
        <a class="remove_form">&#10006;</a>
        </div>`;
      
    let max_rows = 19;
    let x = 1;

    //when click on add more btn, validate existing fields than add more inputs for more pupils
    add_more.addEventListener('click', (e) => {
        validate_previous_fields();
          console.log(counter);
        if (x <= max_rows) {
            counter++; //OVDE VIDETI KAKKO DA NAMETIM KAUNTER U SVAKOJ ITERACIJI DA BUDE DRUGACIJI
            inside_form.insertAdjacentHTML('beforeend', html);
            x++;    
        }




       //when click on 'x' sign remove specific fields from form
        let remove_form = document.querySelectorAll('.remove_form');
        // console.log(remove_form);
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
        let name = input.name;
        console.log(name);
        let value = input.value.trim();
        // names_arr[name] = value;
      
        if (value == '') {
            field_valid = false;
            display_error(input, 'required');
            
        } else {
            remove_error(input);
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
    // console.log(error_el);

}


function remove_error(field) {

    field.style = "border: 1px solid rgb(206, 212, 218)";
    var error_el = document.querySelector('[name="' + field.name + '"] + p');
    error_el.innerText = '';
    error_el.classList.remove('err');
    console.log(error_el);
}


