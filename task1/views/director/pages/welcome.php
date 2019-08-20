
<div style="background-color: grey; width:350px; margin:20px;">
<h1 > Director : </h1>

<?php
Director::nameDir();
foreach($this->data['names'] as $name):
    echo "<h1>" . $name['first_name']." ".$name['last_name']. "</h1>";
   endforeach;
   var_dump($this->data['names']);
   ?>
</div>
<?php
$classes = new Director;
var_dump($classes->clasName());




