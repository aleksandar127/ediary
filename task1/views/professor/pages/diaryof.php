<?php
//print_r($this->data['subject_id']);
// print_r($this->data['final']);
// print_r($this->data['diaries']);

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
    
echo "<div class='container-fluid'>";
echo "<div class='col-md-12'>";
$array_is_long=0;

foreach($this->data['diaries'] as $students):
    $array_is_long++;
    if($id==$students['id']):
        $br++;
        $count++;
echo "<div class='row'>";
echo "<div class='col-md-3 font-weight-bold form-group text-center'>";
        echo "<span class='form-control'>".$students['grades']."</span>";
echo "</div>";
echo "<div class='col-md-3 form-group'>";
        echo "<a  class='btn btn-danger col' href='".URLROOT."/professor/delete/".$students['mark']."'>Izbrisi</a>";
echo "</div>";
;
echo "<div class='col-md-3 form-group'>";
        echo "<input class='form-control' id='ai".$br."".$students['id']."' type='number' min='1' max='5'>";
echo "</div>";

echo "<div class='col-md-3 form-group'>";
        echo "<a id='i".$br."".$students['id']."' onclick='edit(this.id)' class='btn btn-success col' href='".URLROOT."/professor/edit/".$students['mark']."/".$subject_id."'>izmeni</a>";
echo "</div>";
echo "</div>";


        $is_equal=true;
        $id=$students['id'];
        $sum+=$students['grades'];
     //   echo "</div>";
        
        if($array_is_long==count($this->data['diaries']))
        echo "<div class='col-md-12 text-warning text-center'><span class='h4 font-weight-bold'>Prosecna ocena je: </span><span class='h5 font-weight-bold'>".  substr($sum/$count,0,4). "</span></div>";
        continue;
    endif;
    if(($count>0 && $is_equal==false) || $is_equal){
        echo "<div class='col-md-12 text-warning text-center'><span class='h4 font-weight-bold'>Prosecna ocena je: </span><span class='h5 font-weight-bold'>".substr($sum/$count,0,4)."</span></div></div>";
        $sum=0;
        $count=0;
       
    }
          
    $sum+=$students['grades'];
    $count++;
echo "<div class='col-md-3 card-diaryof p-2 rounded m-2'>";
echo "<div class='col-md-12 text-center'>";
echo "<h3 class='font-weight-bold mb-3 text-warning'><i class='fas fa-user-graduate text-warning mr-2'></i> ";
    echo ucfirst($students['first_name'])." ".ucfirst($students['last_name']);
echo "</h3>";
echo "</div>";
    $final_grade="";
    if(in_array($students['id'], $keys)):
        $final_grade=$students_has_finals[$students['id']];
    endif;
echo "<div class='row justify-content-center'>";
echo "<div class='col-md-4 form-group'>";
    echo "<input class='form-control' id='af".$br."".$students['id']."' type='number' min='1' max='5' value='".$final_grade."'>";
echo "</div>";

echo "<div class='col-md-4 form-group'>";
    echo "<a  class='btn btn-primary col' type='btn' href='".URLROOT."/professor/final_grade/".$students['id']."/".$subject_id."' id='f".$br."".$students['id']."' onclick='finalGrade(this.id)' >Zakljuci</a>";
echo "</div>";
echo "</div>";


echo "<div class='row justify-content-center'>";
echo "<div class='col-md-4 form-group'>";
    echo "<input class='form-control' id='au".$students['id']."' type='number' min='1' max='5'>";
echo "</div>";
echo "<div class='col-md-4 form-group'>";
    echo "<a class='btn btn-info col' id='u".$students['id']."' onclick='newGrade(this.id)' href='".URLROOT."/professor/new_grade/".$students['id']."/".$subject_id."'>Unesi</a>";
echo "</div>";
echo "</div>";



    if($students['mark']!=null):
echo "<div class='row'>";
echo "<div class='col-md-3 text-light text-center h4 font-weight-bold'>";
        echo "<span class='form-control'>".$students['grades']."</span>";
echo "</div>";

echo "<div class='col-md-3 form-group'>";
        echo "<a class='btn btn-danger col'  href='".URLROOT."/professor/delete/".$students['mark']."'>Izbrisi</a>";
echo "</div>";

 echo "<div class='col-md-3 form-group'>";
        echo "<input class='form-control' id='ai".$br."".$students['id']."' type='number' min='1' max='5'>";
echo "</div>";

echo "<div class='form-group col-md-3'>";
        echo "<a class='btn btn-success col'  id='i".$br."".$students['id']."' onclick='edit(this.id)' href='".URLROOT."/professor/edit/".$students['mark']."/".$subject_id."'>izmeni</a>";
echo "</div>";
echo "</div>";
        
    endif;
    if($array_is_long==count($this->data['diaries'])){
        $sum=$students['grades'];
        $count=1;
        echo "<div class='row'><div class='col-md-6 text-light font-weight-bold text-center form-group'>".substr($sum/$count,0,4)."</div></div>";
    }
 //   echo "</div>";
    $id=$students['id'];
    $is_equal=false;
    
endforeach;
?>

<script src="<?php echo URLROOT; ?>/assets/professor/js/diaryof.js"></script>
 <script>
document.body.onclick = function( e ) {

// Cross-browser handling
var evt = e || window.event,
    target = evt.target || evt.srcElement;
// If the element clicked is an anchor
if ( target.nodeName === 'A' && target.dataset.a !='0' ) {
    var a=document.getElementById(target.id);
    var inp='a'+target.id;
    var inp=document.getElementById(inp).value;
    if(inp<1 || inp>5 && a.className!='btn-danger'){
        alert('Unesite validnu ocenu');
        return false; 
    }
   // Add the confirm box
    return confirm( 'POTVRDI' );
    }
};
 </script> 