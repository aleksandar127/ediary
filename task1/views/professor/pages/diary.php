<?php 

// $cacheFile = sprintf("views/professor/pages/diary_cache%s.php", date("Ymd"));

//  $timediff = time() - filemtime($cacheFile); 
//   // echo $timediff;
//  if($timediff > (24 * 60)) {
//  	unlink($cacheFile);
//  }


// if(file_exists($cacheFile)) {

// 	readfile($cacheFile);
// 	exit;
// }

// ob_start();

?>

<br>
<div class="container">
<div class="list-group col-md-10 mx-auto diary-wrapper">
<?php foreach($this->data['classes'] as $class):
if($this->data['class']['id']==$class['id'])
echo "<a class='list-group-item list-group-item-action col-md-12 bg-dark' href='".URLROOT."/professor/diaryof/".$class['id']." '><i class='fas fa-user-graduate fa-2x text-warning'></i> <span class='h2 ml-2 text-warning'>".$class['name']."</span></a>";
else
   echo "<a class='list-group-item list-group-item-action bg-warning col-md-12' href='".URLROOT."/professor/diaryof/".$class['id']." '><i class='fas fa-user-graduate fa-2x text-dark'></i> <span class='h2 ml-2'>".$class['name']."</span></a>";
endforeach;
 

?>

</div>
</div>

<?php 

// $content = ob_get_contents();
// ob_end_clean();

// $fp = fopen($cacheFile, "w");
// fwrite($fp, $content);
// fclose($fp);

// echo $content;

?>