<?php
class API_Library extends API_Response {
  public function __construct() {
  }
  
  public function registerRoutes() {
    if (defined('CULTIVAR_POST_TYPE')) {
      register_rest_route(API_Plugin::NSPACE.'/'.API_Plugin::API_VERSION, 'library', array(
        'methods' => 'GET',
        'callback' => array($this, 'getLibrary')
      ));
    }
  }
  
  public function getLibrary($req) {
    if (!$this->validateRequest($req)) {
      return $this->error('bad_request', 'Bad request.', 400);
    }

    $library_posts = $this->getLibraryPosts();
	
	$data = array();
	
	foreach ($library_posts as $cultivar_data) {
      $cultivar = $this->formatCultivarData($cultivar_data);
      array_push($data, $cultivar);
    }
    
    return array(
      'data' => $data
    );
  }

  private function getLibraryPosts() {
    $query = array(
      'post_type' => CULTIVAR_POST_TYPE,
      'posts_per_page' => -1
    );
    
    $posts = get_posts($query);
    
    return $posts;
  }

  private function formatCultivarData($cultivar_data) {
    $post_id = $cultivar_data->ID;
	$title = $cultivar_data->post_title;
	$thumbnail = get_the_post_thumbnail_url($post_id, 'thumbnail');
	$image = get_the_post_thumbnail_url($post_id, 'medium_large');
	
	$post_meta = get_post_meta($post_id);
	$characteristics = $post_meta['cultivar_characteristics'][0];
	$facts = $post_meta['cultivar_facts'][0];
    
    return array(
      'id' => (string)$post_id,
	  'title' => $title,
	  'thumbnail' => $thumbnail ? $thumbnail : null,
	  'image' => $image ? $thumbnail : null,
	  'characteristics' => $this->handleHtml($characteristics),
      'facts' => $this->handleHtml($facts)
    );
  }
}