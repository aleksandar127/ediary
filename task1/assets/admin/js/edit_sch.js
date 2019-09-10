window.addEventListener('load', () => {
    
    let selects = document.querySelectorAll('select');
    console.log(selects);

    selects.forEach(select => {
        var id = select.id;
        console.log(id);
        select.setAttribute("name", id);
    });
});