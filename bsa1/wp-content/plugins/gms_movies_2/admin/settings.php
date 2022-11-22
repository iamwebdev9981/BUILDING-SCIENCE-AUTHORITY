<html>
  <head>
    <style>
      
        .div1{
                  margin-top: 30px;

              }
        .div2{
                margin-top: 50px;
                margin-left:20px;

              }
              .bttn{
                      margin-left: 5px;
                      padding: 3px;
                      padding-left:10px;
                      padding-right:10px;

              }
             

    </style>
  </head>
  <body>
  <div class="div1">

  <?php 
  include('header.php');
  ?>

  <h3>Settings</h3>
   <nav>
      <div class="div2">

          <button class="bttn"><a href="admin.php?page=settings&api_settings=<?php echo "api_settings"?>">Api Settings</a></button>
          <button class="bttn"><a href="admin.php?page=settings&titles=<?php echo "titles"?>">Titles</a></button>
          
          <button class="bttn"><a href="admin.php?page=settings&request=<?php echo "request"?>">Request</a></button>
          <button class="bttn"><a href="admin.php?page=settings&advanced=<?php echo "advanced"?>">Advanced</a></button>
          
          

      </div>

     
  </nav>

  <?php

  if((!$_GET['api_settings']) && (!$_GET['titles']) && (!$_GET['request']) && (!$_GET['advanced']))
  {
    include('add_api.php');
  }


    if($_GET['api_settings'])
    {
      include('add_api.php');

    }
    if($_GET['titles'])
    {
      include('titles.php');
    
    }
    if($_GET['request'])
    {
      include('request.php');
    
    }
    if($_GET['advanced'])
    {
      include('advanced.php');
    
    }
  
  ?>

<!-- 
 <div class="container mt-5">
 	<h5>Settings</h5>

<div class="container mt-3">

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" href="">API Settings</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Disabled</a>
    </li>
  </ul>
</div>

<?php /* echo admin_url(); */ ?>
<?php /* echo "<br>" */ ?>
<?php /* echo PLUGIN_URL ;  */?>

 </div>
 -->
 <?php 

include("footer.php");

  ?>
 </div>

</body>
</html>
