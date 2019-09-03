window.addEventListener('load', () => {
    make_table_form();
    var pick_class = document.getElementById('class_sch');
    console.log(pick_class);
    pick_class.addEventListener('input', (e) => {
        var values_of_option = e.target.value;
        var option_values = values_of_option.split(",");
        console.log(option_values);

        // if (option_values.includes("1")) {
        //     ajax_call(option_values[1]);
        //     console.log('ima vrednost jedan');
        // } else if(option_values.includes("0")){
        //     ajax_call(option_values[0]);
        //     console.log('vrednost je nula');
        // }
    });
});



make_table_form(){
    var 
}




// function ajax_call(high_low){
//     var select_prof = document.getElementById('select_prof');
//     var is_children = select_prof.children;
//     if (is_children.length > 0) {
//         select_prof.innerHTML = '';
//     }

//     var xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function () {
//         if (this.readyState == 4 && this.status == 200) {
//             var res = JSON.parse(this.responseText);

//             res.forEach(response => {
//                 var options = `<option value="${response['id']}">${response['first_name']} ${response['last_name']}</option>`;
//                 console.log(options);
//                 var form_gr_select = document.querySelectorAll('.form-group')[2];
//                 form_gr_select.style = "display : block; width: 30%;";
//                 var select_prof = document.getElementById('select_prof');
//                 select_prof.insertAdjacentHTML('beforeend', options);
//             });

//         }
//     };

//     xhttp.open("GET", "http://localhost/eDiary/task1/admin/fetch_heads?high_low="+ high_low, true);
//     xhttp.send();

// }