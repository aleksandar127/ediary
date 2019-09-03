window.addEventListener('load', () => {
    var tds = document.querySelectorAll('td');
    console.log(tds);

    tds.forEach(td => {

        if (td.innerHTML == '') {
            
            td.innerHTML = '/';
        }
    });
});