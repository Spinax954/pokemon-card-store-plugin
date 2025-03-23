<?php

if (!defined('ABSPATH')) {
    exit;
}

class PCSP_API_Handler {
    private static $api_url = "https://api.pokemontcg.io/v2/cards";

    public static function fetch_cards($set_id = null) {
        $url = self::$api_url;
        if ($set_id) {
            $url .= "?q=set.id:$set_id";
        }

        $response = wp_remote_get($url);
        if (is_wp_error($response)) {
            return [];
        }

        $body = wp_remote_retrieve_body($response);
        return json_decode($body, true);
    }
}
