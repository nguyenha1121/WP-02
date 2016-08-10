<?php 
	function wp_02_plugins_active(){
		$plugin = array (
			array(
			'name'=>'Redux Framework',
			'slug'=>'redux-framework',
			'require'=>true
			)
		);
		$config = array(
			'menu'=>'tp_plugin_install',
			'has_notice'=>true,
			'dismissable'=>false,
			'is_automatic'=>true
			);
		tgmpa($plugin,$config);
	}
	add_action('tgmpa_register',"wp_02_plugins_active");
?>				