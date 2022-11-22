<?php

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

global $wpdb, $table_prefix;
$wp_gms_movies = $table_prefix.'gms_movies';
$wp_imdb_api = $table_prefix.'imdb_api';

$q = "DROP TABLE $wp_gms_movies ";
$q2 = "DROP TABLE $wp_imdb_api ";
$wpdb->query($q);
$wpdb->query($q2);
