<?php
class API_Library extends API_Response
{
    public function __construct()
    {
    }

    public function registerRoutes()
    {
        if (defined('PLANT_POST_TYPE')) {
            register_rest_route(API_Plugin::NSPACE . '/' . API_Plugin::API_VERSION, 'library', array(
                'methods' => 'GET',
                'callback' => array($this, 'getLibrary'),
            ));
        }
    }

    public function getLibrary($req)
    {
        if (!$this->validateRequest($req)) {
            return $this->error('bad_request', 'Bad request.', 400);
        }

        $library_posts = $this->getLibraryPosts();

        $data = array();

        foreach ($library_posts as $plant_data) {
            $plant = $this->formatPlantData($plant_data);
            array_push($data, $plant);
        }

        return array(
            'data' => $data,
        );
    }

    private function getLibraryPosts()
    {
        $query = array(
            'post_type' => PLANT_POST_TYPE,
            'posts_per_page' => -1,
        );

        $posts = get_posts($query);

        return $posts;
    }

    private function formatPlantData($plant_data)
    {
        $post_id = $plant_data->ID;
        $post_modified = $plant_data->post_modified;
        $name = $plant_data->post_title;
        $thumbnail = get_the_post_thumbnail_url($post_id, 'thumbnail');
        $image = get_the_post_thumbnail_url($post_id, 'medium_large');

        $post_meta = get_post_meta($post_id);
        $botanical_name = $post_meta['plant_botanical_name'][0];
        $groups = $post_meta['plant_groups'][0];
        $difficulty = $post_meta['plant_difficulty'][0];
        $watering = $post_meta['plant_watering'][0];
        $light = $post_meta['plant_light'][0];
        $photographer = $post_meta['plant_photographer'][0];
        $photographer_link = $post_meta['plant_photographer_link'][0];
        $characteristics = $post_meta['plant_characteristics'][0];
        $care = $post_meta['plant_care'][0];
        $facts = $post_meta['plant_facts'][0];

        return array(
            'id' => (string) $post_id,
            'slug' => sanitize_title($name),
            'modified' => $post_modified,
            'name' => $name,
            'botanicalName' => $botanical_name ? $botanical_name : null,
            'groups' => $groups ? unserialize($groups) : [],
            'difficulty' => intval($difficulty),
            'watering' => intval($watering),
            'light' => intval($light),
            'image' => array(
                'thumbnail' => $thumbnail ? $thumbnail : null,
                'image' => $image ? $image : null,
                'photographer' => $photographer ?: null,
                'photographerLink' => $photographer_link ?: null,
            ),
            'characteristics' => $this->handleHtml($characteristics),
            'care' => $this->handleHtml($care),
            'facts' => $this->handleHtml($facts),
        );
    }
}
