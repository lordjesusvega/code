<?php
class beamer_model extends MY_Model {
	public function __construct(){
		parent::__construct();

		//
		$module_path = get_module_directory(__DIR__);
		$this->module_name = get_module_config( $module_path, 'name' );
		$this->module_icon = get_module_config( $module_path, 'icon' );
		$this->module_color = get_module_config( $module_path, 'color' );
		//
	}

	/*
	* TOPBAR
	*/
	public function block_topbar($path = ""){
		$dir = get_directory_block(__DIR__, get_class($this));
		return [
			'position' => 9000,
			'view' => view( $dir.'pages/topbar', ['result' => [], "module_name" => $this->module_name, "module_color" => $this->module_color, "module_icon" => $this->module_icon ], true, $this )
		];
	}
	/*
	* END TOPBAR
	*/

	/*
	* SETTINGS
	*/
	public function block_settings($path = ""){
		$dir = get_directory_block_setttings( __DIR__, get_class($this) );
		
		return array(
			"position" => 9998,
			"menu" => view( $dir.'settings/menu', ['path' => $path], true, $this ),
			"content" => view( $dir.'settings/content', [], true, $this )
		);
	}
	/*
	* END SETTINGS
	*/
}
