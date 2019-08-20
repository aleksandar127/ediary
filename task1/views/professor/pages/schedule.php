<?php

//print_r($this->data['schedule']);
echo "<br>";
$days=["","ponedeljak","utorak","sreda","cetvrtak","petak"];
echo "<table border=2px solid black>";
for($i=0;$i<8;$i++){
echo "<tr>";
    for($y=0;$y<6;$y++){
        $ima=false;
        foreach($this->data['schedule'] as $term){
            if($term['dan']==$y && $term['cas']==$i){
           $dan=$i;
           $cas=$y;
           $class=$term['name'];
           $ima=true;
            }

        } 
        if($ima==true)
        echo "<td>".$class."</td>";
        else
        if($i==0 && $y==0)
        echo "<td>#</td>";
        
        else if($i==0 && $y!=0)
        echo "<td>".next($days)."</td>";
        else if($y==0)
        echo "<td>$i</td>";
       
        else
        echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";



    }
    echo "</tr>";
}

echo "</table>";

























?>