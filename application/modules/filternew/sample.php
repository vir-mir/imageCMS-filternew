<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Image CMS
 *
 */

class Sample_Filternew extends MY_Controller {

	

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{ 
		return;
	}
	
	public function autoload()
	{ 
		return;
	}
	
	public function changeStatus()
	{ 
		return;
	}
	
	public function handler()
	{ 
		return;
	}
	
	public function composeAndSendEmail()
	{ 
		return;
	}
	
	public function initSettings()
	{ 
		return;
	}
	
	public function _install()
	{ 
		$this->load->db();
		var_dump($this->db);exit;
		return;
	}
	
	public function _deinstall()
	{ 
		return;
	}

}

/* End of file sample.php */
