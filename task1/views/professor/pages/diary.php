<br>
<div class="list-group">
<?php foreach($this->data['classes'] as $class):
if($this->data['class']['id']==$class['id'])
echo "<a class='list-group-item list-group-item-action' style='background-color:gold' href='".URLROOT."/professor/diaryof/".$class['id']." '>".$class['name']."</a>";
else
 echo "<a class='list-group-item list-group-item-action' href='".URLROOT."/professor/diaryof/".$class['id']." '>".$class['name']."</a>";
endforeach;
?>

</div>