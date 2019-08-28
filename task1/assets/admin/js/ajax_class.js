window.addEventListener('load', () => {
    var pick_class = document.getElementById('classes');
    pick_class.addEventListener('input', (e) => {
        if (e.target.value == 1) {
            ajax_call(1);
        } else {
            ajax_call(0);
        }
    });
});

function ajax_call(high_low){
    var select_prof = document.getElementById('select_prof');
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
                form_gr_select.style = "display : block; width: 30%;";
                var select_prof = document.getElementById('select_prof');
                select_prof.insertAdjacentHTML('beforeend', options);
            });

        }
    };

    xhttp.open("GET", "http://localhost/eDiary/task1/admin/fetch_heads?high_low="+ high_low, true);
    xhttp.send();

}