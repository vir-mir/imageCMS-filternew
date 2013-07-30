<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Image CMS
 *
 */

class Filternew extends MY_Controller {

	private $_dirOld, $_dirNew, $_listFiles;	
	

	public function __construct()
	{
		parent::__construct();
		
		$this->_listFiles = array(
			'filter.tpl' => 'templates/commerce4x/shop/',
			'properties.php' => 'application/modules/shop/admin/',
			'edit.tpl' => 'application/modules/shop/admin/templates/properties/',
			'create.tpl' => 'application/modules/shop/admin/templates/properties/',
			'SFilter.php' => 'application/modules/shop/classes/',
			'SProperties.php' => 'application/modules/shop/models/build/classes/Shop/',
			'BaseSProperties.php' => 'application/modules/shop/models/build/classes/Shop/om/',
			'BaseSPropertiesPeer.php' => 'application/modules/shop/models/build/classes/Shop/om/',
			'BaseSPropertiesQuery.php' => 'application/modules/shop/models/build/classes/Shop/om/',
			'SPropertiesTableMap.php' => 'application/modules/shop/models/build/classes/Shop/map/',
		);
	
		$this->_dirOld = 'application/modules/filternew/oldmodul/';
		$this->_dirNew = 'application/modules/filternew/newmodul/';
		
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
	
		
    function _install() {
        if ($this->dx_auth->is_admin() == FALSE)
            exit;
			
		$sql = "ALTER TABLE  `shop_product_properties` ADD  `variable_property` VARCHAR( 255 ) NOT NULL DEFAULT  'def' AFTER  `main_property`";
			
		$files = $this->_listFiles;
		foreach ($files as $file=>$dir) {
			$f = PUBPATH . $dir . $file;
			$fnew = PUBPATH . $this->_dirNew . $file;
			chmod($f, 0777);
			chmod($fnew, 0777);
			chmod(PUBPATH . $dir, 0777);
			copy($fnew, $f);
		}
		
		$this->db->query($sql);
		
			
    }

    function _deinstall() {		
		$files = $this->_listFiles;
		foreach ($files as $file=>$dir) {
			$f = PUBPATH . $dir . $file;
			$fnew = PUBPATH . $this->_dirOld . $file;
			chmod($f, 0777);
			chmod($fnew, 0777);
			chmod(PUBPATH . $dir, 0777);
			copy($fnew, $f);
		
		}
		
		$this->db->query('ALTER TABLE `shop_product_properties` DROP `variable_property`;');
    }

}

/* End of file sample.php */
