<?php

//print_r($this->data['schedule']);
echo "<br>";
$days=["","ponedeljak","utorak","sreda","cetvrtak","petak"];
echo "<table class='table table-dark table-striped scheduleProf'>";
for($i=0;$i<8;$i++){
 echo "<tr>";
    for($y=0;$y<6;$y++){
        $ima=false;
        foreach($this->data['schedule'] as $term){
            if($term['day_in_week']==$y && $term['lesson_no']==$i){
           $class=$term['name'];
           $ima=true;
            }

        } 
        if($ima==true)
          echo "<td class='hasTrue'>".$class."</td>";
        else
        if($i==0 && $y==0)
          echo "<td class='lessonNO'>#</td>";
        
        else if($i==0 && $y!=0)
          echo "<th>".next($days)."</th>";
        else if($y==0)
          echo "<td class='lessonNO'>$i</td>";
       
        else
          echo "<td>&nbsp;</td>";



    }
    echo "</tr>";
}

echo "</table>";




?>