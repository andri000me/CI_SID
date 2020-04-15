<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AUTH_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_auth');
		
		$session = $this->session->userdata('logged_in');
		if (!$session) {
			redirect('Auth');
		}
	}

}


/* End of file MY_Auth.php */
/* Location: ./application/core/MY_Auth.php */