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

// $year=$result['year'];
// echo "<pre>";
// print_r($year);
// echo "</pre>";

 ?>

        <header>
                <nav class="left mt-4" style=" display: inline;">


                        <strong> GMS Movies</strong>

                    <a href="index.php/movies/?preview=true&movies=<?php echo "movies"; ?>" class="tr_btn" >Movies</a>
                    <a href="index.php/movies/?preview=true&tvshows=<?php echo "tvshows"; ?>" class="tr_btn" >TVShows</a>


                    
                </nav>
                <hr>
        </header>

        <?php
                if($_GET['movies'])
                {
                    echo "this is movies site";
                }
                if($_GET['tvshows'])
                {
                    echo "this is tvshows site";
                }

        ?>


    <div class="container-fluid">
        <div class="row mt-3">
            <!-- <div class="d-flex">
            <h2 >All Movies</h2>  
            </div>        
            <hr> -->


            <!-- code for filtering -->

            <?php
                if(isset($_POST['filter'])){



                    echo "filtered data";

                    // $year             = $_POST['year'];
                    // $page             = $_POST['page'];
                    // $popularity_order = $_POST['popularity_order'];
                    // $genres_movie     = $_POST['genres_movie'];


                    // $filter_data=array('year'=> $year, 'page'=>$page, 'popularity_order'=> $popularity_order, 'genres_movie'=>$genres_movie );

                    // echo "<pre>";
                    // print_r($filter_data);
                    // echo "</pre>";


                    


                    //   foreach($result['items'] as $value){ 
                        
                    ?>

                        <!-- <div class="col-sm-6 col-lg-2 col-md-2 movie_col">
                           
                           <div class="card p-0" >
                            <div class="card-header p-0">
                                <div class="card-header-img-div">
                                     <img src="<?php //print_r($value['image']);?>" alt="" >
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="title"><?php //print_r($value['title']); ?></h6>
                                <p><b>Year : </b> <?php// print_r($value['year']); ?></p>
                                <p><b><i class="fa-solid fa-star"></i> </b> <?php //print_r($value['imDbRating']); ?></p>
            
                            </div>
            
                           </div> -->
            
            
                        </div>
                   <?php  //} ?>
                  
            


                <?php  } ?>


        <!-- nav bar  -->

        <nav class="left m-0 pl-0">
        <form action="" method="post">

            <ul style="list-style-type: none; display: flex; ">
                <li>
                <input type="number" min="1900" max="2023" name="year" value="2000" style="width: 100px; height: 40px; ">
                </li>
                <li style="margin-left: 10px;">
                <input type="number" min="1" name="page" value="1" style="width: 90px; height: 40px;">
                    
                </li>
                <li style="margin-left: 10px;">
                <select name="popularity_order" style="height: 40px; width: 160px; font-size: 17px;" >
                    <option value="popularity_desc">Popularity desc</option>
                    <option value="popularity_asc">Popularity asc</option>
                </select>              
              </li>

              <li style="margin-left: 10px;">
              <select id="movies-genres" name="genres_movie" style="height: 40px; width: 160px; font-size: 17px;" >
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
              </li>

              <li style="margin-left: 10px;">

              <input type="submit" name="filter" value="Filter" class="btn btn-primary " style="height: 40px; padding-top:10px;">
            
              </li>
            </ul>
            </form>

        </nav><br><br><br>


            <?php  foreach($result['items'] as $value){ ?>

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

                </div>

               </div>


            </div>
       <?php  } ?>
        </div>
        
    </div>



<!-- Button trigger modal -->







 <?php 

 include('footer.php');

  ?>