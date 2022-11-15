<?php

class productoController extends Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->_view->setCss_Specific(
			array(
				'dist/css/fontawesome/css/all',
				'plugins/vendors/css/extensions/sweetalert2.min',
				'dist/css/bootstrap',
				'dist/css/colors',
				'dist/css/components',
				'dist/css/pages/page-auth',
				'plugins/vendors/css/extensions/ext-component-sweet-alerts'
			)
		);

		$this->_view->setJs_Specific(
			array(
				'plugins/vendors/js/jquery/jquery.min',
				'plugins/vendors/js/vendors.min',
				'plugins/vendors/js/extensions/sweetalert2.all.min',
				'dist/js/core/app-menu',
				'dist/js/core/app',
				'plugins/vendors/js/extensions/ext-component-sweet-alerts',
			)
		);
		
		$this->_view->setJs(array('index'));
		$this->_view->renderizar('index', true);
	}


	public function ListarProductos()
	{
		// putenv("NLS_LANG=SPANISH_SPAIN.AL32UTF8");
		// putenv("NLS_CHARACTERSET=AL32UTF8");
		$this->getLibrary('json_php/JSON');
		$json = new Services_JSON();


		$wsdl = 'http://10.10.4.53:81/ELTUTA/WS_DEVELOPERU.asmx?WSDL';

		$options = array(
			"uri" => $wsdl,
			"style" => SOAP_RPC,
			"use" => SOAP_ENCODED,
			"soap_version" => SOAP_1_1,
			"connection_timeout" => 60,
			"trace" => false,
			"encoding" => "UTF-8",
			"exceptions" => false,
		);

		$soap = new SoapClient($wsdl, $options);
		$result = $soap->Productos_View();
		$data = json_decode($result->Productos_ViewResult, true);


	}
}