window.addEventListener('load', () => {

	var pop_up_btn = document.querySelectorAll('.btn-danger');

	pop_up_btn.forEach(delete_user => {

		delete_user.addEventListener('click', (e) => {
			e.preventDefault();

            var pop_up_div = e.target.nextElementSibling;
			var overlay = pop_up_div.nextElementSibling;
			
			pop_up_div.classList.add('active');
			overlay.classList.add('active');
			let tables = document.querySelectorAll('.d-flex'); 
			let cards = document.querySelectorAll('.card'); 
			console.log(cards);

			tables.forEach(table => {
				table.style = 'position : unset !important';
			});

			cards.forEach(card => {
				card.style = 'position : unset !important';
			});

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