window.addEventListener('load', () => {

    var pick_class = document.getElementById('class_sch');

    //on select class, validating 
    pick_class.addEventListener('input', (e) => {
        var form = document.querySelector('.form-group').nextElementSibling;
        var values_of_option = e.target.value;
        var option_values = values_of_option.split(",");

        //checking if select is empty option
        if (option_values[0] == '') {
            form.style = 'display : none';
            document.querySelector('.err').innerHTML = ''; 
            pick_class.style = 'border: 1px solid #ced4da';
        } else {
            validate_form(option_values[0], pick_class, form, option_values[1]);
           
        }



    });
});


//function for validating form for making schedule, first checking does sch for specigic class already exists, than does specigic lesson is already taken in some other schedule

function validate_form(class_id, select_class, form_el, high_low) {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var res = JSON.parse(this.responseText);
            if (res) {
                select_class.style = "border: 1px solid red";
                //catching p elment and writing mistake in it
                var error_el = select_class.nextElementSibling;
                error_el.classList.add('err');
                error_el.innerHTML = 'Raspored časova za ovo odeljenje već postoji!'
                form_el.style = 'display: none';
                console.log(error_el);
            } else if (res == false) {
                select_class.style = "border: 1px solid #ced4da;";
                select_class.nextElementSibling.innerHTML = '';


                if (high_low.includes("1")) {
                    form_el.style = 'display:block';
                    ajax_call(high_low[1]);
                } else if (high_low.includes("0")) {
                    form_el.style = 'display:block';
                    ajax_call(high_low[1]);
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
    var select_prof = document.querySelectorAll('select:not([name="class_sch"])');
  
    select_prof.forEach(select => {
        var select_id = select.id;
        select.setAttribute("name", select_id);
        var is_children = select.children;
        if (is_children.length > 0) {
            select.innerHTML = '';
        } else {
            return false;
        }


    });
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var res = JSON.parse(this.responseText);

            res.forEach(response => {
                var options = `<option value="${response['id']}">${response['name']}</option>`;
                var form_selects = document.querySelectorAll('select:not([name="class_sch"])');
                form_selects.forEach(select => {
                    select.insertAdjacentHTML('beforeend', options);
                });
                
            });

        }
    };

    xhttp.open("GET", "http://localhost/eDiary/task1/admin/fetch_spec_subs?high_low=" + high_low, true);
    xhttp.send();

}

function check_is_class_ocuppy(){

    var sch_selects = document.querySelectorAll('.form-control');
    console.log(sch_selects);
    // var xhttp = new XMLHttpRequest();
    // xhttp.onreadystatechange = function () {
    //     if (this.readyState == 4 && this.status == 200) {
    //         var res = JSON.parse(this.responseText);

    //       console.log(res);

    //     }
    // };

    // xhttp.open("GET", "http://localhost/eDiary/task1/admin/save_sch?high_low=" + high_low, true);
    // xhttp.send();
}

