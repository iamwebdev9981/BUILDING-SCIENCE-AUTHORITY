<?php 

/*

* Plugin Name: GMS MOVIES NEW 
* Description: This is Custom Plugin for Movies Website By GMS
* Version: 1.0.0
* Author: Pawan Kumar
* Author URI: http://localhost/website/

*/



define('PLUGINS_DIR_PATH',plugin_dir_path(__FILE__));
define("PLUGIN_URL",plugins_url());

 global $wpdb,$table_prefix;
 $wp_imdb_api = $table_prefix.'imdb_api';
 $result = $wpdb->get_results("SELECT * FROM $wp_imdb_api "); 

if(!empty($result[0]->imDbId_api)){
   $F_API =$result[0]->imDbId_api ;  
}else{
    $F_API ="";
}

if(!empty($result[0]->id)){
    $F_API_ID = $result[0]->id ;  
}else{
     $F_API_ID="";
}

 define( 'API', $F_API);


 define( 'Search', 'https://imdb-api.com/en/API/Search/'.API.'/inception 2010');

 define( 'SearchTitle', 'https://imdb-api.com/en/API/SearchTitle/'.API.'/inception 2010');

 define( 'SearchMovie', 'https://imdb-api.com/en/API/SearchMovie/'.API.'/inception 2010');

 define( 'SearchSeries', 'https://imdb-api.com/en/API/SearchSeries/'.API.'/lost');

 define( 'SearchName', 'https://imdb-api.com/en/API/SearchName/'.API.'/Jean Reno');

 define( 'SearchEpisode', 'https://imdb-api.com/en/API/SearchEpisode/'.API.'/London');

 define( 'SearchCompany', 'https://imdb-api.com/en/API/SearchCompany/'.API.'/warner bross');

 define( 'top250movies', 'https://imdb-api.com/en/API/Top250Movies'.API);




 define( 'API_ID', $F_API_ID);




// for security 
if(!defined('ABSPATH')){
    header("Location:/test_plugin");
    die();
}




function my_plugin_activate(){
   global $wpdb,$table_prefix;
   $wp_gms_movies = $table_prefix.'gms_movies';
   $wp_imdb_api = $table_prefix.'imdb_api';

   $q = "CREATE TABLE IF NOT EXISTS $wp_gms_movies (`id` INT(15) NOT NULL AUTO_INCREMENT , `imDbId` VARCHAR(255) NOT NULL , `title` VARCHAR(255) NOT NULL , `fullTitle` TEXT NOT NULL , `type` VARCHAR(255) NOT NULL ,`year` INT(11) NOT NULL, `image` TEXT NOT NULL , `releaseDate` VARCHAR(255) NOT NULL , `runtimeStr` VARCHAR(255) NOT NULL , `stars` VARCHAR(255) NOT NULL , `genres` VARCHAR(255) NOT NULL , `languages` VARCHAR(255) NOT NULL , `imDbRating` FLOAT NOT NULL , `imDbRatingVotes` FLOAT NOT NULL , `videoId` VARCHAR(255) NOT NULL , `videoUrl` TEXT NOT NULL , `videoTitle` VARCHAR(255) NOT NULL , `videoDescription` TEXT NOT NULL , `thumbnailUrl` TEXT NOT NULL , `uploadDate` VARCHAR(255) NOT NULL , `link` TEXT NOT NULL , `linkEmbed` TEXT NOT NULL , `add_on` TIMESTAMP NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
   ";
$wpdb->query($q);

  $q2 = "CREATE TABLE IF NOT EXISTS $wp_imdb_api (`id` INT(11) NOT NULL AUTO_INCREMENT , `imDbId_api` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
   ";
$wpdb->query($q2);








    $data = array(
          'imDbId' => 'tt0468569'   ,
          'title' =>   'The Dark Knight'   ,
          'fullTitle' => 'The Dark Knight (2008)'    ,
          'type' =>  'Movie'   ,
          'year' =>  2008   ,
          'image' =>   'https://m.media-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_Ratio0.6762_AL_.jpg'  ,
          'releaseDate' => '2008-07-18'   ,
          'runtimeStr' =>  '2h 32min'  ,
          'stars' =>  'Christian Bale, Heath Ledger, Aaron Eckhart'   ,
          'genres' =>   'गतिविधि, अपराध, नाटक'  ,
          'languages' =>  'अंग्रेज़ी, अकर्मण्य'  ,
          'imDbRating' =>  	9  ,
          'imDbRatingVotes' => '2609750'   ,
          'videoId' =>  'https://www.imdb.comvi324468761'  ,
          'videoUrl' =>   'https://www.youtube.com/watch?v=kmJLuwP3MbY' ,
          'videoTitle' =>'DVD Trailer'     ,
          'videoDescription' => 'Trailer for Blu-ray/DVD release of most recent Batman installment'   ,
          'thumbnailUrl' =>  	'https://m.media-amazon.com/images/M/MV5BNWJkYWJlOWMtY2ZhZi00YWM0LTliZDktYmRiMGYwNzczMTZhXkEyXkFqcGdeQXVyNzU1NzE3NTg@._V1_.jpg'    ,
          'uploadDate' => '11/05/2008 06:59:18'    ,
          'link' =>   	'https://www.imdb.com/video/https://www.imdb.comvi324468761'   ,
          'linkEmbed' => 'https://www.imdb.com/video/imdb/https://www.imdb.comvi324468761/imdb/embed'    
    	);

    $wpdb->insert($wp_gms_movies,$data);
}
register_activation_hook(__FILE__, 'my_plugin_activate');



function my_plugin_deactivation(){
    global $wpdb,$table_prefix;
    $wp_gms_movies = $table_prefix.'gms_movies';
    $wp_imdb_api = $table_prefix.'imdb_api';

    $q = "TRUNCATE $wp_gms_movies";
    $q2 = "TRUNCATE $wp_imdb_api";
    $wpdb->query($q);
    $wpdb->query($q2);
}
register_deactivation_hook(__FILE__, 'my_plugin_deactivation');



function gms_movie_menu()
{

	add_menu_page( 'GMS Movie', 'GMS Movies', 'manage_options', 'dashboard',  'dashboard_page_load');

 add_submenu_page('dashboard', 'Settings', 'Settings', 'manage_options', 'settings', 'add_api_page_load');
 add_submenu_page('dashboard', 'all Movies', 'All Movies', 'manage_options', 'all_movies', 'all_movies_page_load');
 add_submenu_page('dashboard', 'Add Movies', 'Add Movies', 'manage_options', 'add_movies', 'add_movies_page_load');
 add_submenu_page('dashboard', 'Add TvShow', 'Add TvShow', 'manage_options', 'add_tvshow', 'add_tvshow_page_load');
  add_submenu_page('dashboard', 'Local Server Movies', 'Local Server Movies', 'manage_options', 'local_server_movies', 'list_local_server_movies');
  add_submenu_page('dashboard', 'Frontend', 'Frontend Movies', 'manage_options', 'frontend_movie', 'view_frontend_movie');

}
add_action('admin_menu','gms_movie_menu');


function add_api_page_load()
{
	include('admin/settings.php');
}

function dashboard_page_load()
{
	include('admin/dashboard.php');
}

function all_movies_page_load()
{
	include('admin/all_movies.php');
}

function add_movies_page_load()
{
	include('admin/add_movies.php');
}

function add_tvshow_page_load()
{
	include('admin/add_tvshow.php');
}

function list_local_server_movies()
{
	include('admin/list_local_server_movies.php');
}
function view_frontend_movie()
{
    include('frontend/view_frontend_movie.php');
}




function tbare_wordpress_plugin_demo($atts) {
	$Content = "<style>\r\n";
	$Content .= "h3.demoClass {\r\n";
	$Content .= "color: #26b158;\r\n";
	$Content .= "}\r\n";
	$Content .= "</style>\r\n";
	$Content .= include('admin/list_local_server_movies.php');

    return $Content;


}

add_shortcode('tbare-plugin-demo', 'tbare_wordpress_plugin_demo');




       
function list_wordpress_plugin_demo($atts) {
	$Content = "<style>\r\n";
	$Content .= "h3.demoClass {\r\n";
	$Content .= "color: #26b158;\r\n";
	$Content .= "}\r\n";
	$Content .= "</style>\r\n";
	$Content .= include('admin/list_of_all_movies.php');

    return $Content;


}

add_shortcode('list-plugin-demo', 'list_wordpress_plugin_demo');


function top250movies($atts) {
    $Content = "<style>\r\n";
    $Content .= "h3.demoClass {\r\n";
    $Content .= "color: #26b158;\r\n";
    $Content .= "}\r\n";
    $Content .= "</style>\r\n";
    $Content .= include('frontend/top250movies.php');

    return $Content;


}

add_shortcode('list-top250movies', 'top250movies');
 



 ?>