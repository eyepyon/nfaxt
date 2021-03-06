<?php

/**
 * hackepson.MY_controller.php
 *
 * @author: aida
 * @version: 2019-11-16 15:27
 */
class MY_Controller extends CI_Controller {

	var $data = array();

	public function __construct() {
		parent::__construct();

		// ライブラリ群のロード
//		$libraries = array( 'parser','session' );
		$libraries = array( 'session' );
		$this->load->library( $libraries );
		//
//		$helpers = array( 'cookie', 'url', 'form' );
		$helpers = array( 'cookie', 'url', 'form');
		$this->load->helper( $helpers );

		if ( ENVIRONMENT == 'development' ) {
//			$this->output->enable_profiler( true );
		}

		$base_url = base_url();
		//
//        $base_url = str_replace("http://","//",$base_url);
//        $base_url = str_replace("https://","//",$base_url);

		$this->data['base_url'] = $base_url;

		$admin_name = $this->session->userdata('admin_name');
		$admin_login = $this->session->userdata('admin_login');

//		$loginName = "";
		//
		$current_url = current_url();
		//
		if ( !$admin_login && !strpos( $current_url, 'login' ) && !strpos( $current_url, 'videopass' ) ) {

			$uri = uri_string();
			//
			$redirectUrl = '/login/';
			if ( $uri != "" ) {
				$redirectUrl .= sprintf( "?u=%s", $uri );
			}
			redirect( $redirectUrl );
			exit;
		}

		$this->data['admin_login'] = $admin_login;
		$this->data['admin_name'] = $admin_name;

	}

}
