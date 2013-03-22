<?php
/*
|--------------------------------------------------------------------------
| Bender_Session
|--------------------------------------------------------------------------
|
| Manage your sessions like a boss !
| 
| @author Jeremie Ges (inspired by Laurent Schaffner)
| @date 25/02/2013
| @version 0.1
| 
*/
class Bender_Session { 

	public function __construct() {

		// Check session
		$session_id = session_id();
		if (empty($session_id)) session_start();

	}

	/*
	|--------------------------------------------------------------------------
	| Set - Insert new session
	|--------------------------------------------------------------------------
	|
	| $label - Name of your session
	| $value - Value of your session
	| $opt - Kind of session (classic/post/get/other)
	|
	*/
	public function set($label, $value='', $opt='session') {

		if (is_array($label)) {

			foreach ($label as $field => $row) {

				$_SESSION[$opt][$field] = $row;

			}


		} else {

			$_SESSION[$opt][$label] = $value;

		}

		return true;

	}

	/*
	|--------------------------------------------------------------------------
	| Show - Show session
	|--------------------------------------------------------------------------
	|
	| $session - Name of your session
	| $opt - Kind of session (classic/post/get/other)
	|
	*/
	public function show($session, $opt='session') {

		if (isset($_SESSION[$opt][$session])) return $_SESSION[$opt][$session]; else return false;

	}


	/*
	|--------------------------------------------------------------------------
	| Show_flash - Show session & destroy
	|--------------------------------------------------------------------------
	| 
	| $session - Name of your session
	| $opt - Kind of session (classic/post/get/other)
	|
	*/
	public function show_flash($session, $opt='session') {

		// Get message
		$flash_msg = $this->show($session, $opt);

		// Delete session
		$this->delete($session, $opt);

		// Return message
		return $flash_msg;
	}

	/*
	|--------------------------------------------------------------------------
	| Show_all - Return all session with opt value
	|--------------------------------------------------------------------------
	|
	| $opt - Kind of session (classic/post/get/other)
	|
	*/
	public function show_all($opt='session') {

		return $_SESSION[$opt];

	}

	/*
	|--------------------------------------------------------------------------
	| Destroy - Destroy all opt session
	|--------------------------------------------------------------------------
	|
	| $opt - Kind of session (classic/post/get/other)
	|
	*/
	public function destroy($opt='') {
		if (!empty($opt) && isset($_SESSION[$opt])) unset($_SESSION[$opt]);
		else session_destroy();
		return true;

	}

	/*
	|--------------------------------------------------------------------------
	| Delete - Delete simple session
	|--------------------------------------------------------------------------
	|
	| $label - Name of your session
	| $opt - Kind of session (classic/post/get/other)
	|
	*/
	public function delete($label, $opt='session') {

		if (isset($_SESSION[$opt][$label])) unset($_SESSION[$opt][$label]);
		else return false;

	}

	/*
	|--------------------------------------------------------------------------
	| Success - Utility Helper
	|--------------------------------------------------------------------------
	|
	| Stock session into opt 'success'
	|
	*/
	public function success($label, $msg) {
		$this->set($label, $msg, 'success');
	}

	/*
	|--------------------------------------------------------------------------
	| Error  - Utility Helper
	|--------------------------------------------------------------------------
	|
	| Stock session into opt 'error'
	|
	*/
	public function error($label, $msg) {
		$this->set($label, $msg, 'error');
	}


}

?>