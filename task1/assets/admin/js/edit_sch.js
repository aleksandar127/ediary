window.addEventListener('load', () => {
    
    let selects = document.querySelectorAll('select');

    //set name attr for every select, hide form if there is no schedule for spec. class
    selects.forEach(select => {
        let id = select.id;
        select.setAttribute("name", id);

        let select_value = select.value;
        if (select.value === '') {
            let form = document.querySelector('form');
            form.style = 'display: none';
        } 
    });
    
    //write msg on page if there is no schedule
    let form = document.querySelector('form');
    if (form.style.display === 'none') {
        
        let message = `<p></p><a href="http://localhost/eDiary/task1/admin/make_schedule" class="msg">Raspored za ovo odeljenje nije još uvek napravljen, klikni ovde ukoliko želiš da napraviš novi raspored!</a>`;
        let show_msg = document.querySelector('.container').insertAdjacentHTML('beforeend', message);

    }

});