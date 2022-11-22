<?php 

include('header.php');

//$ImdbId = "tt1375666";
$API = API;


function getImdbRecord($API)
{
   // $path = "https://imdb-api.com/en/API/Top250Movies/k_pkdivmkv";
    $path = "https://imdb-api.com/en/API/Top250Movies/".API." ";
    $json = file_get_contents($path);
    return json_decode($json, TRUE);
}



//$data = getImdbRecord("f3d054e8");
$result = getImdbRecord(API);

/* ----------------------------------------------------------------------------------- */


function getImdbPoster($API)
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

  


/* --------------------------------------------------------------------------------------- */
 ?>

<header>
        <nav class="left mt-4 ml-0">
            <ul style="list-style-type: none; display: flex; ">
                <li>
                    <h4>GMS Movies</h4>
                </li>
                <li style="margin-left: 10px;">
                <a href="#" class="dbmvs-tab-content button button-primary" data-type="movie">Movies</a>
                    
                </li>
                <li style="margin-left: 10px;">
                <a href="#" class="dbmvs-tab-content button-primary" data-type="tv">TVShows</a>                
                </li>
            </ul>



        </nav>
        <hr>
</header>

<?php
        if($_GET['movies'])

    {

        echo "this is movies site";
    }



    
?>

    <div class="container-fluid">
        <div class="row mt-3">
            
            <h5 >All Movies</h5>          
            <hr>

            <!-- code for filtering -->
         

            <div style=" padding-top: 0;">
            <form action="" method="post">
                <input type="number" min="1960" max="2023" name="year_filter" value="<?php echo $_POST['year_filter'];?>" placeholder="1960" >
                <input type="number" min="1" name="page" value="1" style="width: 90px;">

                <select name="popularity_order" style="margin-left: 5px; height: 34px; width: 150px;" >
                    <option value="popularity_desc">Popularity desc</option>
                    <option value="popularity_asc">Popularity asc</option>
                </select>

                <select id="movies-genres" name="genres_movie" style="margin-left: 5px; height: 34px; width: 150px;" >
                      <option value="">All genres</option>
                      <option value="Action">Action</option>
                      <option value="Adventure">Adventure</option>
                      <option value="Animation">Animation</option>
                      <option value="Comedy">Comedy</option>
                      <option value="Crime">Crime</option>
                      <option value="Documentary">Documentary</option>
                      <option value="Drama">Drama</option>
                      <option value="Family">Family</option>
                      <option value="Fantasy">Fantasy</option>
                      <option value="History">History</option>
                      <option value="Horror">Horror</option>
                      <option value="Music">Music</option>
                      <option value="Mystery">Mystery</option>
                      <option value="Romance">Romance</option>
                      <option value="Science Fiction">Science Fiction</option>
                      <option value="TV Movie">TV Movie</option>
                      <option value="Thriller">Thriller</option>
                      <option value="War">War</option>
                      <option value="Western">Western</option>
                </select>

               
                <input type="submit" name="filter" value="Filter" class="btn btn-primary">

                </form>
            </div>

            <?php




                if(isset($_POST['filter'])){

                    $year_filter      = $_POST['year_filter'];
                    $page             = $_POST['page'];
                    $popularity_order = $_POST['popularity_order'];
                    $genres_movie     = $_POST['genres_movie'];


                    $filter_data=array('year'=> $year, 'page'=>$page, 'popularity_order'=> $popularity_order, 'genres_movie'=>$genres_movie );

                    // echo "<pre>";
                    // print_r($filter_data);
                    // echo "</pre>";
                    // echo "<br>";
                   // echo $year_filter;
                      foreach($result['items'] as $value){ 

                        $year=$value['year'];
                       
                       if($year==$year_filter)
                        {
                        ?>
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
             
                                 <a href="<?php echo admin_url(); ?>/admin.php?page=add_movies&id=<?php print_r($value['id']); ?>" class="tr_btn" >Add Movie</a>
                             </div>
             
                            </div>
             
             
                         </div>
                <?php
                       }
                      }

                   die;   

                }           
            
           //fetching all movie data
            
                    

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

                    <a href="<?php echo admin_url(); ?>/admin.php?page=add_movies&id=<?php print_r($value['id']); ?>" class="tr_btn" >Add Movie</a>
                </div>

               </div>


            </div>
       <?php 
        } 
       ?>
        </div>
        
    </div>



<!-- Button trigger modal -->







 <?php 

 include('footer.php');

  ?>