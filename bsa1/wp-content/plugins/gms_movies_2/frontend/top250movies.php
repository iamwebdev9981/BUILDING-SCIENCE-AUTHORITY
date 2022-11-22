<?php 

include('header.php');

//$ImdbId = "tt1375666";
$API = API;


function getImdbRecord($API)
{
   // $path = "https://imdb-api.com/en/API/Top250Movies/k_pkdivmkv";
    $path = "https://imdb-api.com/en/API/Top250Movies/".API;
    $json = file_get_contents($path);
    return json_decode($json, TRUE);
}



//$data = getImdbRecord("f3d054e8");
$result = getImdbRecord(API);

//echo"<pre>";
//print_r($result);
/* ----------------------------------------------------------------------------------- */

?>  <div class="container-fluid">
        <div class="row mt-3">
            <h5 >Top 250 Movies</h5>          
            <hr>
            <?php 
            foreach($result['items'] as $value){ ?>

    
            <div class="col-sm-6 col-lg-2 col-md-2 movie_col">
               
               <div class="card p-0" >
                <div class="card-header p-0">
                    <div class="card-header-img-div">
                         <img src="<?php print_r($value['image']);?>" alt="" >
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="title"><?php print_r($value['title']); ?></h6>
                    <p><b>Year : </b> <?php print_r($value['year']); ?></p>
                    <p><b><i class="fa-solid fa-star"></i> </b> <?php print_r($value['imDbRating']); ?></p>

                    <a href="<?php echo admin_url(); ?>admin.php?page=add_movies&id=<?php print_r($value['id']); ?>" class="tr_btn" >View Trailor</a>
                </div>

               </div>


            </div>
       


       <?php 
        } 
       ?>
        </div>
    </div>
      <?php
    
/*   function trailor(){ 
    
      include('view-trailor.php');
}
   */ 
     
   
  ?>
       <?php 
/*function getImdbPoster($API)
{
	$id = $_GET['id'];
    // $path = "https://imdb-api.com/en/API/Posters/k_pkdivmkv/".$id;
    $path = "https://imdb-api.com/hi/API/Title/".API."/".$id."/FullCast,Posters,Images,Trailer,Ratings,";
    $json = file_get_contents($path);
    return json_decode($json, TRUE);
}
    $poster = getImdbPoster(API);




    foreach($poster['items'] as $value){ 

        $id_main=$value['id'];

        print_r($id_main);

        echo "<br>";

        break;
    }
*/
  


/* --------------------------------------------------------------------------------------- */
 ?>
 <?php 

 include('footer.php');

  ?>