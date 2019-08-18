<?php
//print_r($this->data['subject_id']);
//print_r($this->data['diaries']);
$subject_id=$this->data['subject_id']['id'];
$id=0;
$is_equal=false;
$br=0;
echo "<br>";
foreach($this->data['diaries'] as $students):
  
    if($id==$students['id']):
        $br++;
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
        
        echo "</div>";
       
        continue;
            endif;
            echo $is_equal?"<br>":"";
            
            echo "<div style=display:inline-block;font-size:20px;margin-top:10px;>";
            echo "<span style='color:red;font-size:20px;width:150px;display:inline-block;'>";
    echo ucfirst($students['first_name'])." ".ucfirst($students['first_name'])."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "</span>";
    echo "<input id='z".$br."".$students['id']."' type='number' style='width:50px;' min='1' max='5'></input>";
    echo "&nbsp;";
    echo "<a   id='f".$br."".$students['id']."' onclick='edit(this.id)' class='btn btn-dark' href='http://localhost/eDiary/task1/professor/edit/".$students['mark']."/".$subject_id."'>Zakljuci</a>";
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
    echo "<a  id='a".$br."".$students['id']."' onclick='edit(this.id)' class='btn btn-success' href='http://localhost/eDiary/task1/professor/edit/".$students['mark']."/".$subject_id."'>izmeni</a>";
    echo "&nbsp;&nbsp;";
   
    endif;
    echo "</div>";
   
   
  
    
    $id=$students['id'];
    $is_equal=false;
    
endforeach;
?>
<script>
function edit(id){
var a=document.getElementById(id);
var student_id = id.substr(2);
var el=id.substr(1,1)+student_id;
el="i"+el;
var i=document.getElementById(el).value;
a.href+="/"+i;
}

function newGrade(id){
var a=document.getElementById(id);
var student_id = id.substr(2);
var el=id.substr(1,1)+student_id;
el="o"+el;
var i=document.getElementById(el).value;
a.href+="/"+i;

}
</script>