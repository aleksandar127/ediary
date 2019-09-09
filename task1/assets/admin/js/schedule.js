window.addEventListener('load', () => {
    var tds = document.querySelectorAll('td');

    tds.forEach(td => {

        if (td.innerHTML == '') {
            
            td.innerHTML = '/';
        }
    });
});