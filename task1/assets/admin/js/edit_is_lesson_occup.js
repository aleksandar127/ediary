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





        });
       
    });
});