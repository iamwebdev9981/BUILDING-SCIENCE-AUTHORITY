<?php include('header.php'); 
global $wpdb,$table_prefix;
 $wp_imdb_api = $table_prefix.'imdb_api';
 // echo API; 


  if(isset($_POST['submit'])){

	$api_key = $_POST['api_key'];

	if($api_key == ''){
		$err_msg =  "Please Enter Api Key";
	}else{

		if($api_key == API){
			$err_msg =  "Api Key Already Exists";
		}else{
			$data = array('imDbId_api' => $api_key);

			if($wpdb->insert($wp_imdb_api,$data)){
				$success_msg = "Key Activated successfully";
				 echo '<meta http-equiv="refresh" content="1">';
			}else{
				$err_msg = "Key Activation Failed";
			}

		}


	}


}


if(isset($_POST['rmv_btn'])){
$api_id = API_ID;

            $table='wp_imdb_api';
           if( $wpdb->delete( $table, array( 'id' => $api_id ) )){
           	echo '<meta http-equiv="refresh" content="3">';
           	$del_msg = "API key Deleting...";
           }else{
           	echo '<meta http-equiv="refresh" content="30">';
           	$del_err_msg = "API key not Deleted ";

           }
}



 ?>





<div class="container mt-5">



	<div class="row">
		<div class="col-sm-12 col-lg-6 col-md-6">
			
			<form action="" method="post"  >
				<h5>Enter IMDB Api Key Here</h5><hr>
				<div class="row mt-3">
					<div class="col-2">
						<label for="">Api Key :</label>
					</div>
					<div class="col-6">
						<input type="text" class="form-control" name="api_key" id="api_key" <?php if(!API == ''){echo 'Value=" '.API . '"  ';} ?> <?php if(!API == ''){echo 'readonly';} ?> >
					</div>
					<div class="col-4">
						<input type="submit" class="btn btn-primary " value="Activate" name="submit" id="submit" >
					</div>
				</div>
				<h6 class="success_msg"><?php  if(isset($success_msg)){echo $success_msg;} ?></h6>
				<h6 class="err_msg"><?php  if(isset($err_msg)){echo $err_msg;} ?></h6>
			</form>
			<div class="row mt-3">
				<div class="col-sm-12 col-lg-6 col-md-6">
					<form action="" method="post">
						<button class='remove_api_btn btn btn-danger' id="rm_btn" name="rmv_btn" style="display: none;">Remove Api Key</button>
					</form>
					<div class="del_err_div">
					<h6 class="del_msg"><?php  if(isset($del_msg)){echo $del_msg;} ?></h6>
				  <h6 class="del_err_msg"><?php  if(isset($del_err_msg)){echo $del_err_msg;} ?></h6>
				</div>
				</div>
			</div> 
		</div>
	</div>
</div>





<script>
	$(document).ready(function(){
      const  API = '<?php echo API ?>';
     

       if(!API == ''){
       	  $('#submit').addClass('disabled');
       	  $("#submit").attr("value","Activated");
       	  $('.form-control').css({

       	  	"border":"2px solid green",
       	  	"color":"green",
       	  	"box-shadow":"none",
       	  	"outline-none":"none",

       	  });
       	  $('#rm_btn').css({

       	  	"display":"block",
       	  });


       }





	});
</script>














<?php include('footer.php') ?>