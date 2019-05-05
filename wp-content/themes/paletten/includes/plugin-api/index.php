<?php
/*
Plugin Name: API
Author: Anna Viklund
Version: 1.0
*/

require __DIR__.'/response.php';
require __DIR__.'/library.php';

class API_Plugin {
    const NSPACE = 'paletten-api';
    const API_VERSION = 'v1';
    
    protected static $instance = null;
    
    private function __construct() {
      $this->registerRoutes();
      $this->handlePreflight();
    }
    
    public static function getInstance() {
      if ( null == self::$instance ) {
        self::$instance = new self;
      }
	  
	  return self::$instance;
    }
    
    public function registerRoutes() {
      $library_api = new API_Library();
      $library_api->registerRoutes();
    }
    
    public function handlePreflight() {
      if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        remove_filter('rest_pre_serve_request', 'rest_send_cors_headers');
        add_filter('rest_pre_serve_request', array($this, 'addHeaders'));
        add_action('template_redirect', array($this, 'addHeaders'));
      }
    }
    
    public function addHeaders() {
      $origin = get_http_origin();
      header('Access-Control-Allow-Origin: ' . $origin);
      header('Access-Control-Allow-Headers: Authorization, Content-Type');
	}
  }
  
  // Init plugin
  add_action('rest_api_init', function () {
    $paletten_api = API_Plugin::getInstance();
  });
