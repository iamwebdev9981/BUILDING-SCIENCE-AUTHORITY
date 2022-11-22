<?php 

include('header.php');


if(isset($_GET['id'])){



function getImdbRecord($ApiKey)
{

    $id = $_GET['id'];
   // $path = "https://imdb-api.com/en/API/Top250Movies/k_si1i9oap";
    $path = "https://imdb-api.com/en/API/YouTubeTrailer/".API."/".$id;

    
  
    
    $json = file_get_contents($path);
    return json_decode($json, TRUE);
}

//$data = getImdbRecord("f3d054e8");
$data = getImdbRecord("k_s4p9eng8");

$videoUrl = $data["videoUrl"];

$convertUrl =  str_replace("watch?v=", "embed/", $videoUrl);



/*echo "<pre>";
print_r($data);
echo "</pre>";
*/
?>

<table  style="width:100%">
    <thead>
        <tr>
            
            <th>Title</th>
            <th>Year</th>
           <th>Link</th>
        </tr>
    </thead>
    <tbody>
        <tr >
              <td><?php echo $data["title"];?></td>
              <td><?php echo $data["year"];?></td>
             <td><iframe src="<?php echo $convertUrl; ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;"width="420" height="345" frameborder="0" allowfullscreen></iframe></td>
    </tbody>
</table>

<?php 
}


?>

<?php 

 include('footer.php');

  ?>