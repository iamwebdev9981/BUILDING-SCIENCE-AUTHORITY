<?php 
include("header.php");

 global $wpdb,$table_prefix;
 $wp_gms_movies = $table_prefix.'gms_movies';
 $results = $wpdb->get_results("SELECT * FROM $wp_gms_movies ");  
  ?>






    <div class="container-fluid">
        <div class="row mt-3">
            <h5>ALL MOVIES OF LOCAL SEVER</h5>
            <hr>

            <?php $i =1; 

            foreach($results as $value){  

               // echo "<pre>";
               // print_r($value);
               // echo "</pre>";

               $videoUrl   = $value->videoUrl;
               $convertUrl =  str_replace("watch?v=", "embed/", $videoUrl);


            	?>

            <div class="col-sm-3 col-lg-2 col-md-2 movie_col">

            	<div class="movie-card">
            		<div class="card-img">
            			<img src="<?php print_r($value->image);?>" alt="" >
            		</div>
            		<div class="card-content">
            		<h6 class="title"><?php print_r($value->title); ?></h6>
                    <p><b>Year : </b> <?php print_r($value->year); ?></p>
               
<!--                     <p><b>Genres : </b> <?php //print_r($value->genres); ?></p>-->
               <!--      <p><b>RatingVotes : </b> <?php //print_r($value->imDbRatingVotes); ?></p> -->
                    <p><b><i class="fa-solid fa-star"></i> </b> <?php print_r($value->imDbRating); ?></p> 
            		</div>
            		<div class="card-footer-sec">
            			<button type="button" class="btn-sm btn-info tr-btn" data-bs-toggle="modal" data-bs-target="<?php echo '#myModal_'.$i; ?>">
				  View Trailer
				         </button>
            		</div>
                    <div class="modal fade" id="<?php echo 'myModal_'.$i; ?>" ;>
               <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content" style="background: transparent!important;border:none!important">

                      <!-- Modal Header -->
                      <div class="modal-header" style="border:none!important">
                        <h6 class="modal-title"></h6>
                        <button type="button" data-bs-dismiss="modal" style="border: none;box-shadow:none;background: transparent!important;" > <i class="fa-solid fa-xmark" style="color:#fff!important;"></i></button>
                      </div>

                      <!-- Modal body -->

                      <div class="modal-body" style="height: 450px; padding: 0px;">
                        <?php echo $convertUrl;?>
                          <iframe width="100%" height="100%" src="<?php echo $convertUrl;?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
                      </div>

                    </div>
                  </div>
                </div>
            	</div>
               


               
            </div>
       <?php $i++; } ?>
        </div>    
    </div>



<!-- Button to Open the Modal -->


<!-- The Modal -->



















<?php include("footer.php"); ?>