window.addEventListener('load', () => {
    var pick_class = document.getElementById('class_sch');
    console.log(pick_class);
    pick_class.addEventListener('input', (e) => {
        console.log(e.target.value);
        // if (e.target.value == 1) {
            // ajax_call(1);
        // } else {
            // ajax_call(0);
        // }
    });
});