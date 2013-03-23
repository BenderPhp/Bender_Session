Bender Session
==============

Bender Session est une librairie vous permettant de gérer vos sessions facilement avec une une flexibilité accrue.

Synospys
===

```php

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Example extends CI_Controller {

  public function __construct() {
		parent::__Construct();

		// Load library
		$this->load->helper('bender/bender_session');

	}

	public function index() {
		
		// Create simple session
		$this->bender_session->set('dealer', 'Paul');

		// Create simple session with type
		$this->bender_session->set('dealer', 'Henry', 'drug');

		// Display session
		$dealer = $this->bender_session->show('dealer'); 

		// Display session with type
		$another_dealer = $this->bender_session->show('dealer', 'drug');

		var_dump($dealer); // Ouput > Paul
		var_dump($another_dealer); // Output > Henry

	
	}





}

```
