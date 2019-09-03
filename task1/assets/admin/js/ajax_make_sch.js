window.addEventListener('load', () => {
    var pick_class = document.getElementById('class_sch');
    console.log(pick_class);
    pick_class.addEventListener('input', (e) => {
        var values_of_option = e.target.value;
        var option_values = values_of_option.split(",");
        console.log(option_values);

        if (option_values.includes("1")) {
            // ajax_call(1);
            console.log('ima vrednost jedan');
        } else {
            // ajax_call(0);
            console.log('vrednost je nula');
        }
    });
});