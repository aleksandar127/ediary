<br>

<div class="container">
<?php
foreach(array_reverse($this->data['news']) as $news){
echo "<div class='col-md-6 bg-info m-2 p-2 font-weight-bold text-center mx-auto notification'>".$news['notifications']."</div>";
}
?>


</div>



<!-- <br>

<div class="container"> -->
<?php
// foreach(array_reverse($this->data['news']) as $news){
// $notification = <<<DELIMITER
// <div class='row'>
// <div class='col-md-12 bg-info text-center'>{$news['notifications']}</div>
// </div>
// DELIMITER;

// echo $notification;
// }
?>


<!-- </div> -->