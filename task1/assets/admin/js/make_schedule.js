window.addEventListener('load', () => {


    

    var pick_class = document.getElementById('class_sch');
    console.log(pick_class);
    pick_class.addEventListener('input', (e) => {
        var values_of_option = e.target.value;
        var option_values = values_of_option.split(",");
        console.log(option_values);
        var form = document.querySelector('.form-group').nextElementSibling;
  
        schedule_exists(option_values[0], pick_class);

        // if (option_values.includes("1")) {
        //     form.style = 'display:block';
        //     ajax_call(option_values[1]);
        // } else if (option_values.includes("0")) {
        //     form.style = 'display:block';
        //     ajax_call(option_values[1]);
        // } else {
        //     form.style = 'display: none';
        // }

    });
});



function ajax_call(high_low){
    var select_prof = document.querySelectorAll('select:not([name="class_sch"])');
  
    select_prof.forEach(select => {
        var select_id = select.id;
        select.setAttribute("name", select_id);
        var is_children = select.children;
        if (is_children.length > 0) {
            select.innerHTML = '';
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

function schedule_exists(class_id, select_class){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var res = JSON.parse(this.responseText);
            console.log(res);
            if (res) {
                select_class.style = "border: 1px solid red";
                //catch p elment and write mistake in it
                var error_el = select_class.nextElementSibling;
                error_el.style = 'color : red';
                error_el.innerHTML = 'Raspored časova za ovo odeljenje već postoji!'
                console.log(error_el);
            } else if(res == false) {
                select_class.style = "border: 1px solid #ced4da;";
                select_class.nextElementSibling.innerHTML = '';
            }
        }
    };

    xhttp.open("GET", "http://localhost/eDiary/task1/admin/existing_sch?class_id=" + class_id, true);
    xhttp.send();
}