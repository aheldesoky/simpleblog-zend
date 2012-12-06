<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initAutoLoad() {
		// Add AutoLoader empty namespace
		$autoloader = Zend_Loader_Autoloader::getInstance();
		$resourceLoader = new Zend_Loader_Autoloader_Resource(array(
				'basePath'      => APPLICATION_PATH,
	
				'namespace'     => '',
	
				'resourceTypes' => array(
						'form'  => array(
								'path' => 'forms/',
								'namespace' => 'Form_',
						),
						'model' => array(
								'path' => 'models/',
								'namespace' => 'Model_',
						),
				),
		));
	
		// Return it so that it can be stored by the bootstrap
		return $autoloader;
	}
	
	protected function _initConfig() {
	
		$config = new Zend_Config ( $this->getOptions () );
		Zend_Registry::set ( 'config', $config );
	
		return $config;
	}
	
	protected function __initRoutes(){
		$frontController = Zend_Controller_Front::getInstance ();
		$router = $frontController->getRouter ();
		
		$route = new Zend_Controller_Router_Route_Regex ( '([^/]+)/view', array ('module' => 'default', 'controller' => 'Index', 'action' => 'view' ) );
		$router->addRoute ( 'view', $route );
	}

}

