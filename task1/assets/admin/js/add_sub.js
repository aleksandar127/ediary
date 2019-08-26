window.addEventListener('load', () => {
    var pick_class = document.querySelectorAll('.form-group');
    pick_class[1].addEventListener('input', (e) => {
       console.log(e.target.value);
        if (e.target.value == 1) {
            let pick_prof = document.querySelectorAll('.form-group');
            pick_prof[2].style = 'display: block';
        } else {
            let pick_prof = document.querySelectorAll('.form-group');
            pick_prof[2].style = 'display: none';
        }
       
   });
});