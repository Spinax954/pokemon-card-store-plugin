<?php

if (!defined('ABSPATH')) {
    exit;
}

class PCSP_Product_Importer {
    public static function import_card($card_data) {
        $product = [
            'post_title'  => $card_data['name'],
            'post_content'=> $card_data['flavorText'] ?? '',
            'post_status' => 'publish',
            'post_type'   => 'product'
        ];

        $product_id = wp_insert_post($product);

        if ($product_id) {
            update_post_meta($product_id, '_price', $card_data['tcgplayer']['prices']['market'] ?? 0);
            update_post_meta($product_id, '_stock_status', 'instock');
        }
    }
}
