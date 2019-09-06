<?php
//print_r($this->data['subject_id']);
//print_r($this->data['final']);
//print_r($this->data['diaries']);

// $count=0;
// $sum=0;
// $students_has_finals=[];
// $subject_id=$this->data['subject_id'];
// $id=0;
// $is_equal=false;
// $br=0;
// $keys=[];
// foreach($this->data['final'] as $niz):
//     $students_has_finals[$niz['student_id']]=$niz['grades'];
//     $keys=array_keys($students_has_finals);
// endforeach;
    
// echo "<br>";
// $array_is_long=0;

// foreach($this->data['diaries'] as $students):
//     $array_is_long++;
//     if($id==$students['id']):
//         $br++;
//         $count++;
//         echo "<div style=display:inline-block;font-size:20px;margin-top:10px;>";
//         echo $students['grades'];
//         echo "&nbsp;&nbsp;";
//         echo "<a  class='btn btn-danger' href='".URLROOT."/professor/delete/".$students['mark']."'>Izbrisi</a>";
//         echo "&nbsp;";
//         echo "<input id='i".$br."".$students['id']."' type='number' style='width:50px;' min='1' max='5'></input>";
//         echo "&nbsp;";
//         echo "<a   id='a".$br."".$students['id']."' onclick='edit(this.id)' class='btn btn-success' href='".URLROOT."/professor/edit/".$students['mark']."/".$subject_id."'>izmeni</a>";
//         echo "&nbsp;&nbsp;";
//         $is_equal=true;
//         $id=$students['id'];
//         $sum+=$students['grades'];
//         echo "</div>";
        
//         if($array_is_long==count($this->data['diaries']))
//         echo substr($sum/$count,0,4);
//         continue;
//     endif;
    // if(($count>0 && $is_equal==false) || $is_equal){
    //     echo substr($sum/$count,0,4);
    //     $sum=0;
    //     $count=0;
    //     echo "<br>";
    // }
          
    // $sum+=$students['grades'];
    // $count++;
    // echo "<div style=display:inline-block;font-size:20px;margin-top:10px;>";
    // echo "<span style='color:red;font-size:20px;width:150px;display:inline-block;'>";
    // echo ucfirst($students['first_name'])."<br>".ucfirst($students['last_name'])."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    // echo "</span>";
    // echo "&nbsp;";
    // echo "&nbsp;";
    // $final_grade="";
    // if(in_array($students['id'], $keys)):
    //     $final_grade=$students_has_finals[$students['id']];
    // endif;
    // echo "<input id='m".$br."".$students['id']."' type='number' style='width:50px;' min='1' max='5' value='".$final_grade."'></input>";
    // echo "&nbsp;";
    // echo "<a href='".URLROOT."/professor/final_grade/".$students['id']."/".$subject_id."' id='f".$br."".$students['id']."' onclick='finalGrade(this.id)' class='btn btn-dark' >Zakljuci</a>";
    // echo "&nbsp;&nbsp";
    // echo "<input id='o".$students['id']."' type='number' style='width:50px;' min='1' max='5'></input>";
    // echo "&nbsp;";
    // echo "<a  id='b".$students['id']."' onclick='newGrade(this.id)' class='btn btn-primary' href='".URLROOT."/professor/new_grade/".$students['id']."/".$subject_id."'>Unesi</a>";
    // echo "&nbsp;&nbsp;";
    // if($students['mark']!=null):        
    //     echo $students['grades'];
    //     echo "&nbsp;&nbsp;";
    //     echo "<a  class='btn btn-danger'  href='".URLROOT."/professor/delete/".$students['mark']."'>Izbrisi</a>";
    //     echo "&nbsp;";
//         echo "<input id='i".$br."".$students['id']."' type='number' style='width:50px;' min='1' max='5'></input>";
//         echo "&nbsp;";
//         echo "<a  id='a".$br."".$students['id']."' onclick='edit(this.id)'  class='btn btn-success' href='".URLROOT."/professor/edit/".$students['mark']."/".$subject_id."'>izmeni</a>";
//         echo "&nbsp;&nbsp;";
//     endif;
//     if($array_is_long==count($this->data['diaries'])){
//         $sum=$students['grades'];
//         $count=1;
//         echo substr($sum/$count,0,4);
//     }
//     echo "</div>";
//     $id=$students['id'];
//     $is_equal=false;
    
// endforeach;
?>

<!-- <script src="<?php // echo URLROOT; ?>/assets/professor/js/diaryof.js"></script> -->
<!-- <script>
document.body.onclick = function( e ) { 
    Cross-browser handling
   var evt = e || window.event,
       target = evt.target || evt.srcElement;
    If the element clicked is an anchor
   if ( target.nodeName === 'A' && target.className != 'navProf' ) {
       Add the confirm box
        return confirm( 'POTVRDI' );
    }
};
</script> -->


<!-- ***************************************************************** -->

<div class="container-fluid">
    
<?php

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
    
// echo "<br>";
$array_is_long=0;

foreach($this->data['diaries'] as $students):
    $array_is_long++;
    if($id==$students['id']):
        $br++;
        $count++;
// echo "<div class='row'>";
        echo "<span class='col-md-6'>".$students['grades']."</span>";
      
        echo "<a class='py-3 btn btn-danger col mr-3'  href='".URLROOT."/professor/delete/".$students['mark']."'>Izbrisi</a>";
     
        echo "<input class='form-control col' id='i".$br."".$students['id']."' type='number' ' min='1' max='5'>";
  
        echo "<a id='a".$br."".$students['id']."' onclick='edit(this.id)' class='py-3 btn btn-success col mr-3' href='".URLROOT."/professor/edit/".$students['mark']."/".$subject_id."'>izmeni</a>";
// echo "</div>";
        $is_equal=true;
        $id=$students['id'];
        $sum+=$students['grades'];
       // echo "</div>";
        
        if($array_is_long==count($this->data['diaries']))
        echo "<div class='col-md-6 bg-light'>".substr($sum/$count,0,4)."</div>";
        continue;
    endif;
    if(($count>0 && $is_equal==false) || $is_equal){
        echo "<div class='col-md-6 bg-light'>".substr($sum/$count,0,4)."</div>";
        $sum=0;
        $count=0;
     //   echo "<br>";
    }
          
    $sum+=$students['grades'];
    $count++;

    echo "<div class='row bg-secondary p-2'>";

    echo "<div class='col-md-12'>";
    echo "<div class='col-md-3'>";
    echo "<h4 class='mr-2 mt-1 col-md-12 text-center'>".ucfirst($students['first_name'])." ".ucfirst($students['last_name']."</h4>");


    $final_grade="";
    if(in_array($students['id'], $keys)):
        $final_grade=$students_has_finals[$students['id']];
    endif;
echo "<div class='col-md-12'>";
    echo "<input class='form-control col-md-6 d-inline'  id='m".$br."".$students['id']."' type='number' min='1' max='5' value='".$final_grade."'>";
   
    echo "<a href='".URLROOT."/professor/final_grade/".$students['id']."/".$subject_id."' id='f".$br."".$students['id']."' type='btn' onclick='finalGrade(this.id)' class='form-control col-md-6 btn btn-dark mb-1'>Zakljuci</a>";
echo "</div>";

echo "<div class='col-md-12'>";
    echo "<input class='form-control col-md-6 d-inline'  id='o".$students['id']."' type='number' min='1' max='5'>";
  
    echo "<a type='btn' id='b".$students['id']."' onclick='newGrade(this.id)' class='btn btn-primary form-control col-md-6 mb-1' href='".URLROOT."/professor/new_grade/".$students['id']."/".$subject_id."'>Unesi</a>";
echo "</div>";
    
    
    if($students['mark']!=null):        

echo "<div class='col-md-12'>";     
        echo "<div class='text-center d-inline-block col-md-6 font-weight-bold bg-light mb-1' style='height:35px;'>".$students['grades']."</div>";
    
        echo "<a type='btn' class='btn btn-danger d-inline-block col-md-6 mb-1'  href='".URLROOT."/professor/delete/".$students['mark']."'>Izbrisi</a>";
echo "</div>";
        
echo "<div class='col-md-12'>";        
        echo "<input class='form-control col-md-6 d-inline' id='i".$br."".$students['id']."' type='number'  min='1' max='5'>";
      
        echo "<a id='a".$br."".$students['id']."' onclick='edit(this.id)'  class='form-control btn btn-success col-md-6' href='".URLROOT."/professor/edit/".$students['mark']."/".$subject_id."'>Izmeni</a>";
echo "</div>";
     
    endif;
    if($array_is_long==count($this->data['diaries'])){
        $sum=$students['grades'];
        $count=1;
        echo "<div class='col-md-12'>";     
        echo "<div class='col-md-6 m-0 bg-light text-center font-weight-bold' style='height:35px;'>".substr($sum/$count,0,4)."</div>";
        echo "<div>";
    }
  
    $id=$students['id'];
    $is_equal=false;
    
 echo "</div>"; // End od col-md-12
echo "</div>"; // End of row

endforeach;
?>

</div>  <!-- End of container-fluid -->

<script src="<?php echo URLROOT; ?>/assets/professor/js/diaryof.js"></script>
<script>
document.body.onclick = function( e ) { 
  //  Cross-browser handling
   var evt = e || window.event,
       target = evt.target || evt.srcElement;
    If the element clicked is an anchor
   if ( target.nodeName === 'A' && target.className != 'navProf' ) {
    //   Add the confirm box
        return confirm( 'POTVRDI' );
    }
};
</script>