
//print_r($this->data['classes']);
<ul>
<?php foreach($this->data['classes'] as $class):?>
    <li><?php echo "<a href=' http://localhost/eDiary/task1/professor/diaryof/".$class['id']."'>".$class['name']."</a>;" ?></li>
    <?php endforeach; ?>
</ul>