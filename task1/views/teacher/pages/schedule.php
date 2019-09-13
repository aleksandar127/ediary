<?php $days=["","ponedeljak","utorak","sreda","cetvrtak","petak"]; ?>
    <div id="table">
        <div class="wrapper">
            <table>
                <?php for($i=0;$i<8;$i++): ?>
                    <tr>
                        <th> # </th>
                        <th> </th>
                        <th>Utorak</th>
                        <th>Sreda</th>
                        <th>Cetvrtak</th>
                        <th>Petak</th>
                    </tr>
                    <tr>
                        <td>1. cas</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                    </tr>
                    <tr>
                        <td>2. cas</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                    </tr>
                    <tr>
                        <td>3. cas</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                    </tr>
                    <tr>
                        <td>4. cas</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                    </tr>
                    <tr>
                        <td>5. cas</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        </tr>
                    <tr>
                        <td>6. cas</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                    </tr>
                        <tr>
                        <td>7. cas</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                    </tr>
                <?php endfor; ?>
            </table>
        </div><!-- end .wrapper -->
    </div><!-- end #table -->


    <?php

//print_r($this->data['schedule']);
echo "<br>";
$days=["","ponedeljak","utorak","sreda","cetvrtak","petak"];
echo "<table border=3px solid black style=width:500px;height:250px;margin-left:450px;margin-top:100px;>";
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
        echo "<td style='background-color:silver;text-align:center;font-size:20px;'>".$class."</td>";
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





