<br>
<div class="list-group">
<?php foreach($this->data['classes'] as $class):
 echo "<a class='list-group-item list-group-item-action' href='http://localhost/eDiary/task1/professor/diaryof/".$class['id']." '>".$class['name']."</a>";
endforeach;
?>

</div>