window.addEventListener('load', () => {
    let inputs = document.querySelectorAll('input');
    console.log(inputs);
    let add_more = document.querySelector('.add');
    console.log(add_more);

    add_more.addEventListener('click', (e) => {
        let form = document.querySelectorAll('.form-group');
        console.log(form);
    });

    inputs.forEach(input => {
        // console.log(input);
        input.addEventListener('focus', (e) => {
            // e.target.style.background = 'pink';   
            // console.log(e.target.value); 
        });
        
        input.addEventListener('blur', (e) => {
            // e.target.style.background = 'red';    
            console.log(e.target.value); 
        });

    });

});