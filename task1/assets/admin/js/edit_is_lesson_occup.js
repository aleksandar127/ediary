window.addEventListener('load', () => {
    let form = document.querySelector('form');
    let submit = document.querySelector('.btn');
    let cls_selects = document.querySelectorAll('select:not([name="class_sch"])');

    cls_selects.forEach(select => {
        console.log(select);
        select.addEventListener('input', (e) => {
            var day_in_week = e.target.id.slice(0, -1);
            var lesson_no = e.target.id.substr(-1, 1);
            var picked_lesson = e.target.value;


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

            ajax_subject_check(day_in_week, lesson_no, picked_lesson, select);

        });
       
    });
    
    submit.addEventListener('click', (e) => {
        e.preventDefault();
        errors_exist(form);
    });
});

//function for checking which subject is free to be used for schedule
function ajax_subject_check(day, lesson, chosen_lesson, select_field) {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var res = JSON.parse(this.responseText);
            let arr = [];

            res.forEach(function (item) {
                let occupied_lesson = item.subjects_id; 
                arr.push(occupied_lesson);

                if (arr.includes(chosen_lesson)) {
        
                    console.log('zauzet predmet u tom terminu');
                    select_field.style = 'border: 1px solid red';
                    var err = select_field.nextElementSibling;
                    err.innerHTML = 'Predmet zauzet!';
                    err.classList.add('err');
                } else {
                    select_field.style = 'border: 1px solid #ced4da';
                    var err = select_field.nextElementSibling;
                    err.innerHTML = '';
                    err.classList.remove('err');    
                }
                
            });
           
        }
    }

    xhttp.open("GET", "http://localhost/eDiary/task1/admin/is_subject_occupied?day=" + day + "&lesson_no=" + lesson, true);
    xhttp.send();

}


function errors_exist(form_el) {
    var errors = form_el.querySelectorAll('small.err');
    if (errors.length == 0) {
        form_el.submit();
    }
}