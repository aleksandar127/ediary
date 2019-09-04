window.addEventListener('load', () => {

    var pick_class = document.getElementById('class_sch');
    console.log(pick_class);
    pick_class.addEventListener('input', (e) => {
        var values_of_option = e.target.value;
        var option_values = values_of_option.split(",");
        console.log(option_values);
        var form = document.querySelector('.form-group').nextElementSibling;
        

        if (option_values.includes("1")) {
            form.style = 'display:block';
            ajax_call(option_values[1]);
            console.log('ima vrednost jedan');
        } else if(option_values.includes("0")){
            form.style = 'display:block';
            ajax_call(option_values[1]);
            console.log('vrednost je nula');
        } else {
            form.style = 'display: none';   
        }
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
                console.log(options);
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