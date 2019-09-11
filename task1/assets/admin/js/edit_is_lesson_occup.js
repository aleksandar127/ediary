window.addEventListener('load', () => {
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

            // console.log(day_in_week);
            // console.log(lesson_no);
            // console.log(picked_lesson);

            ajax_subject_check(day_in_week, lesson_no, picked_lesson, select);

        });
       
    });
});

//function for checking which subject is free to be used for schedule
function ajax_subject_check(day, lesson, choosed_lesson, select_field) {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var res = JSON.parse(this.responseText);

            //POGLEDATI
            // for (x in res) {
            //     console.log(x.value);
            // }
                

            res.forEach(function (item) {
                console.log('ID: ' + item.subjects_id);
                
            });
           
                
            // }
            // if (res['subjects_id'] == choosed_lesson) {
            //     select_field.style = 'border: 1px solid red';
            //     var err = select_field.nextElementSibling;
            //     err.innerHTML = 'Predmet zauzet!';
            //     err.classList.add('err');
            // } else {
            //     select_field.style = 'border: 1px solid #ced4da';
            //     var err = select_field.nextElementSibling;
            //     err.innerHTML = '';
            //     err.classList.remove('err');
            // }
        }
    }

    xhttp.open("GET", "http://localhost/eDiary/task1/admin/is_subject_occupied?day=" + day + "&lesson_no=" + lesson, true);
    xhttp.send();

}