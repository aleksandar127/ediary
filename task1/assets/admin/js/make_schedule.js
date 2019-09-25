window.addEventListener('load', () => {

    let pick_class = document.getElementById('class_sch');

    //on select class, validating 
    pick_class.addEventListener('input', (e) => {
       
        let form = document.querySelector('.form-group').nextElementSibling;
        let values_of_option = e.target.value;
        let option_values = values_of_option.split(",");
        console.log(option_values);
        //checking if select is empty option
        if (option_values[0] == '') {
            form.style = 'display : none';
            document.querySelector('p').innerHTML = ''; 
            pick_class.style = 'border: 1px solid #ced4da';
        } else {
            validate_form(option_values[0], pick_class, form, option_values[1]);         
        }



    });
});


//function for validating form for making schedule, first checking does sch for specific class already exists, than does specigic lesson is already taken in some other schedule

function validate_form(class_id, select_class, form_el, high_low) {

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let res = JSON.parse(this.responseText);
            if (res) {
                select_class.style = "border: 1px solid red";
                //catching p elment and writing mistake in it
                let error_el = select_class.nextElementSibling;
                error_el.classList.add('err');
                error_el.innerHTML = 'Raspored časova za ovo odeljenje već postoji!'
                form_el.style = 'display: none';

            } else if (res == false) {
                select_class.style = "border: 1px solid #ced4da;";
                select_class.nextElementSibling.innerHTML = '';


                if (high_low === "1") {

                    form_el.style = 'display:block';
                    ajax_call(high_low);
                    //validating if lesson is already occupied in that term
                    check_is_class_ocuppied(high_low);
                } else if (high_low === "0") {

                    form_el.style = 'display:block';
                    ajax_call(high_low);
                    check_is_class_ocuppied(high_low);
                } else {
                    form_el.style = 'display: none';
                }  
            } 
        }
    }; 

    xhttp.open("GET", "http://localhost/eDiary/task1/admin/existing_sch?class_id=" + class_id, true);
    xhttp.send();
}



//func. for fetching lessons depending on the class is low or high

function ajax_call(high_low){
    let select_class = document.querySelectorAll('select:not([name="class_sch"])');
  
    select_class.forEach(select => {
        let select_id = select.id;
        select.setAttribute("name", select_id);
        let is_children = select.children;
        if (is_children.length > 0) {
            select.innerHTML = '';
        } else {
            return false;
        }


    });
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let res = JSON.parse(this.responseText);

            //adding first empty option in every select to validate easier
            let cls_select = document.querySelectorAll('select:not([name="class_sch"])');
            cls_select.forEach(sel => {
                let empty = document.createElement('OPTION');
                empty.setAttribute("value", "empty");
                sel.insertAdjacentElement('afterbegin', empty);
            });

            res.forEach(response => {
                let options = `<option value="${response['id']}">${response['name']}</option>`;
                let form_selects = document.querySelectorAll('select:not([name="class_sch"])');
                form_selects.forEach(select => {
                    select.insertAdjacentHTML('beforeend', options);
                });
                
            });

        }
    };

    xhttp.open("GET", "http://localhost/eDiary/task1/admin/fetch_spec_subs?high_low=" + high_low, true);
    xhttp.send();

}

function check_is_class_ocuppied(high_low){
    if (high_low === "0") {
        let errs = document.querySelectorAll('small.err');
        console.log(errs);
        errs.forEach(error => {
            error.innerHTML = '';
            error.previousElementSibling.style = 'border : border: 1px solid #ced4da';
        });
        let cls_selects = document.querySelectorAll('select:not([name="class_sch"])');  
        cls_selects.forEach(sl => {
            sl.addEventListener('input', (e) => {
                ajax_subject_check('1', '1', 'haha', sl);
            });
        });
    } else {

        let submit = document.querySelector('.btn');
        submit.addEventListener('click', (e) => {
            e.preventDefault();


            cls_selects.forEach(cls_select => {

                let values = cls_select.value;
                if (values == 'empty') {
                    cls_select.style = 'border: 1px solid red';
                    let err = cls_select.nextElementSibling;
                    err.innerHTML = 'Polje ne može biti prazno!';
                    err.classList.add('err');
                }
            });

            errors_exists();
        });

        let cls_selects = document.querySelectorAll('select:not([name="class_sch"])');

        cls_selects.forEach(cls_select => {

            cls_select.addEventListener('input', (e) => {
                let selected_subject = e.target.value;
                if (selected_subject == 'empty') {
                    cls_select.style = 'border: 1px solid red';
                    let err = cls_select.nextElementSibling;
                    err.innerHTML = 'Polje ne može biti prazno!';
                    err.classList.add('err');

                } else {
                    cls_select.style = 'border: 1px solid #ced4da';
                    let err = cls_select.nextElementSibling;
                    err.innerHTML = '';
                    err.classList.remove('err');

                    let day_in_week = e.target.id.slice(0, -1);
                    let lesson_no = e.target.id.substr(-1, 1);
                    let picked_lesson = e.target.value;


                    if (day_in_week == 'monday') {
                        day_in_week = "1";
                    } else if (day_in_week == 'tuesday') {
                        day_in_week = "2";
                    } else if (day_in_week == 'wednesday') {
                        day_in_week = "3";
                    } else if (day_in_week == 'thursday') {
                        day_in_week = "4";
                    } else if (day_in_week == 'friday') {
                        day_in_week = "5";
                    }

                    ajax_subject_check(day_in_week, lesson_no, picked_lesson, cls_select);
                }
                
            });
            
        });

    }
   
    
}


//function for checking which subject is free to be used for schedule
function ajax_subject_check(day, lesson, chosen_lesson, select_field){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let res = JSON.parse(this.responseText);
            let arr = [];

            res.forEach(function (item) {
                let occupied_lesson = item.subjects_id; 
                arr.push(occupied_lesson);
       
                if (arr.includes(chosen_lesson)) {
                    select_field.style = 'border: 1px solid red';
                    let err = select_field.nextElementSibling;
                    err.innerHTML = 'Predmet zauzet!';
                    err.classList.add('err');
                } else {
                    select_field.style = 'border: 1px solid #ced4da';
                    let err = select_field.nextElementSibling;
                    err.innerHTML = '';
                    err.classList.remove('err');
                }
            })
           
        }
    }
    
    xhttp.open("GET", "http://localhost/eDiary/task1/admin/is_subject_occupied?day="+day+"&lesson_no="+lesson, true);
    xhttp.send();

}


function errors_exists(){
    let errors = document.querySelectorAll('small.err');
    if (errors.length == 0) {
        document.querySelector('form').submit();
    }
    
}