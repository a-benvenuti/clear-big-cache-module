<?php
namespace Drupal\module_clear_big_cache\Controller;

class ClearBigCacheController {
    public function clearBigCache() {
        $db = \Drupal::service('database');
        $query_array = array(
            "TRUNCATE TABLE cache_toolbar;",
            "TRUNCATE TABLE cache_render;",
            "TRUNCATE TABLE cache_page;",
            "TRUNCATE TABLE cache_menu;",
            "TRUNCATE TABLE cache_mailchimp;",
            "TRUNCATE TABLE cache_entity;",
            "TRUNCATE TABLE cache_dynamic_page_cache;",
            "TRUNCATE TABLE cache_discovery;",
            "TRUNCATE TABLE cache_default;",
            "TRUNCATE TABLE cache_data;",
            "TRUNCATE TABLE cache_container;",
            "TRUNCATE TABLE cache_config;",
            "TRUNCATE TABLE cache_bootstrap;",
        );
        foreach ($query_array as $query) {
            try {
                $db->query($query);
            } catch (\Exception $e) {}
        }
        return array(
            '#markup' => 'Ok'
        );
    }    
}