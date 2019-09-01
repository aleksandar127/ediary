<?php 

class Chart {

	 public $data = [];


	public function __construct() {
		return $this->prosecneOcene();
	}


	public function prosecneOcene() {
		$this->data = [
			[
			'predmet' => 'srpski',
			'prosecna_ocena' => 3.9
		],
		[
			'predmet' => 'matematika',
			'prosecna_ocena' => 3.7
		]
			// $this->matematika;
			// $this->fizicko;
			// $this->hemija;
			// $this->likovno;
			// $this->fizika;
			// $this->geografija;
			// $this->biologija;
			// $this->istorija;
		];

		return $this->data;
	}





}



?>