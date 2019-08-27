<br>
<div class="list-group">
<?php foreach($this->data['classes'] as $class):
if($this->data['class']['id']==$class['id'])
echo "<a class='list-group-item list-group-item-action' style='background-color:gold' href='http://localhost/eDiary/task1/professor/diaryof/".$class['id']." '>".$class['name']."</a>";
else
 echo "<a class='list-group-item list-group-item-action' href='http://localhost/eDiary/task1/professor/diaryof/".$class['id']." '>".$class['name']."</a>";
endforeach;
?>

</div>