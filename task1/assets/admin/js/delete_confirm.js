window.addEventListener('load', () => {

	var pop_up_btn = document.querySelectorAll('.btn-danger');
	// console.log(pop_up_btn);

	pop_up_btn.forEach(delete_user => {

		console.log(delete_user);
		delete_user.addEventListener('click', (e) => {

			e.preventDefault();
            console.log(e.target);
            var pop_up_div = e.target.nextElementSibling;
			var overlay = pop_up_div.nextElementSibling;
			
			pop_up_div.classList.add('active');
			overlay.classList.add('active');

			var cancel_btn = pop_up_div.querySelector('.cancel');

			if (pop_up_div.classList.contains('active') && overlay.classList.contains('active')) {

				cancel_btn.addEventListener('click', () => {
					pop_up_div.classList.remove('active');
					overlay.classList.remove('active');
				});
			} 
		});
	});
});