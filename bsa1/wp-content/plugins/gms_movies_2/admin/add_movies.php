<?php 
include("header.php");

 global $wpdb,$table_prefix;
 $wp_gms_movies = $table_prefix.'gms_movies';
 $results = $wpdb->get_results("SELECT * FROM $wp_gms_movies ");   

$API = API;


if(isset($_GET['id'])){



function getImdbRecord($API)
{

    $id = $_GET['id'];
   // $path = "https://imdb-api.com/en/API/Top250Movies/k_pkdivmkv";
    $path = "https://imdb-api.com/en/API/YouTubeTrailer/".API."/".$id;
    $json = file_get_contents($path);
    return json_decode($json, TRUE);
}

function getImdbPoster($API)
{
	$id = $_GET['id'];
    // $path = "https://imdb-api.com/en/API/Posters/k_pkdivmkv/".$id;
    $path = "https://imdb-api.com/hi/API/Title/".API."/".$id."/FullCast,Posters,Images,Trailer,Ratings,";
    $json = file_get_contents($path);
    return json_decode($json, TRUE);
}


function getImdbepisode($API)
{
	$id = $_GET['id'];

    $path = SearchEpisode."/".$id;
    $json = file_get_contents($path);
    return json_decode($json, TRUE);
}

$episode = getImdbepisode(API);


	echo "<pre>";
	  print_r($episode);
	 echo "</pre>";









    $poster = getImdbPoster(API);

  
	// echo "<pre>";
	//  print_r($poster);
	//  echo "</pre>";
 
   

	$imDbId          = $poster['id'] ;
	$title           = $poster['title'] ;
	$fullTitle       = $poster['fullTitle'] ;
	$type            = $poster['type'] ;
	$image           = $poster['image'] ;
	$releaseDate     = $poster['releaseDate'] ;
	$runtimeStr      = $poster['runtimeStr'] ;
	$stars           = $poster['stars'] ;
	$genres          = $poster['genres'] ;
	$languages       = $poster['languages'] ;
	$imDbRating      = $poster['imDbRating'] ;
	$imDbRatingVotes = $poster['imDbRatingVotes'];


	$tr_videoId          = $poster['trailer']['videoId'];
	$tr_videoTitle       = $poster['trailer']['videoTitle'];
	$tr_videoDescription = $poster['trailer']['videoDescription'];
	$tr_uploadDate       = $poster['trailer']['uploadDate'];
	$tr_link             = $poster['trailer']['link'];
	$tr_linkEmbed        = $poster['trailer']['linkEmbed'];
	$thumbnailUrl        = $poster['trailer']['thumbnailUrl'];


    //$data = getImdbRecord("f3d054e8");
	$data = getImdbRecord(API);
	$videoUrl = $data["videoUrl"];
	$convertUrl =  str_replace("watch?v=", "embed/", $videoUrl);

	$year = $data['year'] ;

	// $error=$data['errorMessage'];
	// echo "<pre>";
	// print_r($error);
	// echo "</pre>";

	echo "<pre>";
	print_r($data);
	echo "</pre>";


	

	if(!$poster)
	{
		echo "You have crossed your limits";

	}
	else{
	
	?>
	<br><br>


	<div class="container" style="width: 550px;">
	<div class="row">

	<div class="col-sm-12 col-lg-6 col-md-6 " style="display-flex; justify-content:flex-end;">
			<img src="<?php print_r($image); ?>" style="width: 220px; "><br>
		</div>
			<div class="col-sm-12 col-lg-6 col-md-6 pl-0 pt-0" style="display-flex; justify-content:flex-start;">
				<?php
						
							print_r($title); 
							echo "<br>";
							print_r($fullTitle);
							echo "<br>";
							print_r($releaseDate); 
							echo "<br>";
							print_r($type); 
							echo "<br>";
							print_r($runtimeStr); 
							echo "<br>";
							print_r($genres); 
							echo "<br>";
							print_r($languages); 
							echo "<br>";
							

							?>
							<b><i class="fa-solid fa-star"></i> </b>
							<?php
							print_r($imDbRating);
							echo "<br>";
							print_r($imDbRatingVotes);
							echo "<br>";
							echo " <b>Year:</b> ";
							print_r($year);
							echo "<br>";
							
							?>
			</div>
			<div class="container text-center"><br><br>

			<form action="" method="post">
				<input type="submit" value="add movies" name="submit" class="text-center btn btn-info">
			</form>

			</div>

 	</div>
	</div>


<?php
	}

	$videoUrl          = $data['videoUrl'] ;
	$year          = $data['year'] ;
   
	$fullTitle_data      = $data['fullTitle'] ;

	
    if(isset($_POST['submit'])){

    	$data = array(
          'imDbId' => $imDbId    ,
          'title' =>   $title   ,
          'fullTitle' => $fullTitle    ,
          'type' =>  $type   ,
          'year' =>  $year   ,
          'image' =>   $image  ,
          'releaseDate' => $releaseDate    ,
          'runtimeStr' =>  $runtimeStr  ,
          'stars' =>  $stars   ,
          'genres' =>   $genres  ,
          'languages' =>  $languages  ,
          'imDbRating' =>  	$imDbRating   ,
          'imDbRatingVotes' => $imDbRatingVotes   ,
          'videoId' =>  $tr_videoId   ,
          'videoUrl' =>   	$videoUrl ,
          'videoTitle' => $tr_videoTitle      ,
          'videoDescription' => $tr_videoDescription   ,
          'thumbnailUrl' =>  	$thumbnailUrl    ,
          'uploadDate' => $tr_uploadDate    ,
          'link' =>   	$tr_link   ,
          'linkEmbed' => $tr_linkEmbed    
    	);


		$id=$_GET['id'];
		echo $id;






 		$condition = $wpdb->get_results("SELECT imDbId FROM $wp_gms_movies WHERE imDbId=$id");




	echo "<pre>";
	print_r($condition);
	echo "</pre>";

        if($condition)
		{
			echo "this movie is alredy exists in local";
		}
		else{
			echo "successfully added";
		}
       
        // $f_imDbId = $results[1][5]->imDbId;

		


        // if($imDbId == $f_imDbId){
        // 	echo "Data already inserted";
        // }else{
	    //        if($wpdb->insert($wp_gms_movies,$data)){
	    // 		$success_msg = "Data inserted Successfully";
	    // 		}else{
	    // 		$error_msg= "Data Not inserted";
	    // 		 }
        // 	}

    	
    }
    
}else{
	echo "Movie id Not Found";
}
?>



<style>
	.add-movie-cont label{
	font-family: 'League Spartan', sans-serif;
    font-size: 12px;
    margin-bottom: 5px;
    text-transform: uppercase;
    color:#212529;
	}

	.add-movie-cont form{

	}

	.add-movie-cont .form-control{
     border: 1px solid #21252926 !important;
     box-shadow: none!important;
     outline: none!important;
	}
</style>

<div class="container add-movie-cont mt-5">
<div class="row">
	<div class="col-sm-12 col-lg-12 col-md-12 ">

		<h5><?php if(isset($success_msg)){ echo $success_msg;} ?></h5>
		<h5><?php  if(isset($error_msg)){echo $error_msg; }?></h5>
		
	
	</div>
</div>	
</div>



 <?php 

 include('footer.php');

  ?>