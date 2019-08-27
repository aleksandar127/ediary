<?php
//print_r($this->data['subject_id']);
//print_r($this->data['final']);
//print_r($this->data['diaries']);

$count=0;
$sum=0;
$students_has_finals=[];
$subject_id=$this->data['subject_id'];
$id=0;
$is_equal=false;
$br=0;
$keys=[];
foreach($this->data['final'] as $niz):
    $students_has_finals[$niz['student_id']]=$niz['grades'];
    $keys=array_keys($students_has_finals);
    endforeach;
    
   
echo "<br>";
$array_is_long=0;
foreach($this->data['diaries'] as $students):
    $array_is_long++;
    if($id==$students['id']):
        $br++;
        $count++;
        echo "<div style=display:inline-block;font-size:20px;margin-top:10px;>";
        echo $students['grades'];
        echo "&nbsp;&nbsp;";
        echo "<a  class='btn btn-danger' href='http://localhost/eDiary/task1/professor/delete/".$students['mark']."'>Izbrisi</a>";
        echo "&nbsp;";
        echo "<input id='i".$br."".$students['id']."' type='number' style='width:50px;' min='1' max='5'></input>";
        echo "&nbsp;";
        echo "<a   id='a".$br."".$students['id']."' onclick='edit(this.id)' class='btn btn-success' href='http://localhost/eDiary/task1/professor/edit/".$students['mark']."/".$subject_id."'>izmeni</a>";
        echo "&nbsp;&nbsp;";
        $is_equal=true;
        $id=$students['id'];
        $sum+=$students['grades'];
        
        echo "</div>";
        
    
        if($array_is_long==count($this->data['diaries']))
        echo substr($sum/$count,0,4);
        continue;
            endif;
            if(($count>0 && $is_equal==false) || $is_equal){
            
            echo substr($sum/$count,0,4);
            $sum=0;
            $count=0;
            echo "<br>";
            }
           
            
            $sum+=$students['grades'];
            $count++;
            echo "<div style=display:inline-block;font-size:20px;margin-top:10px;>";
            echo "<span style='color:red;font-size:20px;width:150px;display:inline-block;'>";
    echo ucfirst($students['first_name'])."<br>".ucfirst($students['last_name'])."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "</span>";
    echo "&nbsp;";
    if($this->data['class'] ['id']==$students['class_id'])
    echo "<a  class='btn btn-warning' href='http://localhost/eDiary/task1/professor/success/".$students['id']."'>Svedocanstvo</a>";
    echo "&nbsp;";
    $final_grade="";
    if(in_array($students['id'], $keys)):
    $final_grade=$students_has_finals[$students['id']];
        endif;
    echo "<input id='m".$br."".$students['id']."' type='number' style='width:50px;' min='1' max='5' value='".$final_grade."'></input>";
    echo "&nbsp;";
   
    echo "<a href='http://localhost/eDiary/task1/professor/final_grade/".$students['id']."/".$subject_id."' id='f".$br."".$students['id']."' onclick='finalGrade(this.id)' class='btn btn-dark' >Zakljuci</a>";
    echo "&nbsp;&nbsp";
    echo "<input id='o".$students['id']."' type='number' style='width:50px;' min='1' max='5'></input>";
    echo "&nbsp;";
    echo "<a  id='b".$students['id']."' onclick='newGrade(this.id)' class='btn btn-primary' href='http://localhost/eDiary/task1/professor/new_grade/".$students['id']."/".$subject_id."'>Unesi</a>";
    echo "&nbsp;&nbsp;";
    if($students['mark']!=null):
            
    echo $students['grades'];
    echo "&nbsp;&nbsp;";
    echo "<a  class='btn btn-danger' href='http://localhost/eDiary/task1/professor/delete/".$students['mark']."'>Izbrisi</a>";
    echo "&nbsp;";
    echo "<input id='i".$br."".$students['id']."' type='number' style='width:50px;' min='1' max='5'></input>";
    echo "&nbsp;";
    echo "<a  id='a".$br."".$students['id']."' onclick='edit(this.id)'  class='btn btn-success' href='http://localhost/eDiary/task1/professor/edit/".$students['mark']."/".$subject_id."'>izmeni</a>";
    echo "&nbsp;&nbsp;";
   
    endif;
    if($array_is_long==count($this->data['diaries'])){
        $sum=$students['grades'];
        $count=1;
    echo substr($sum/$count,0,4);
    }
    echo "</div>";
  
   
  
    
    $id=$students['id'];
    $is_equal=false;
    
endforeach;
?>

<script src="http://localhost/eDiary/task1/assets/professor/js/diaryof.js"></script>
