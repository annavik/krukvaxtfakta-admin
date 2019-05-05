<?php
abstract class API_Response
{
    protected $query_params;
    protected $url_params;

    public function __construct()
    {
    }

    abstract public function registerRoutes();

    protected function validateRequest($req)
    {
        return true;
    }

    protected function error($code, $message, $status)
    {
        return new WP_Error($code, $message, array('status' => $status));
    }

    protected function handleHtml($html)
    {
        if (empty($html)) {
            return null;
        }

        return apply_filters('the_content', $html);
    }
}
