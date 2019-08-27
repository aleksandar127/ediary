window.addEventListener('load', () => {
    var pick_class = document.getElementById('classes');
    pick_class.addEventListener('input', (e) => {
        if (e.target.value == 1) {
            console.log('visi');

        } else {
            console.log('nizi');

        }
    });
});

function ajax_call(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var head = JSON.parse(this.responseText);

        }
    };

    // xhttp.open("GET", "http://localhost/eDiary/task1/professor/ajax_send_message?message=" + message + "&id=" + parent, true);
    // xhttp.send();

}