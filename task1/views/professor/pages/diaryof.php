<?php
//print_r($this->data['subject_id']);
// print_r($this->data['final']);
// print_r($this->data['diaries']);

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
//         echo "<input id='ai".$br."".$students['id']."' type='number' style='width:50px;' min='1' max='5'></input>";
//         echo "&nbsp;";
//         echo "<a   id='i".$br."".$students['id']."' onclick='edit(this.id)' class='btn btn-success' href='".URLROOT."/professor/edit/".$students['mark']."/".$subject_id."'>izmeni</a>";
//         echo "&nbsp;&nbsp;";
//         $is_equal=true;
//         $id=$students['id'];
//         $sum+=$students['grades'];
//         echo "</div>";
        
//         if($array_is_long==count($this->data['diaries']))
//         echo substr($sum/$count,0,4);
//         continue;
//     endif;
//     if(($count>0 && $is_equal==false) || $is_equal){
//         echo substr($sum/$count,0,4);
//         $sum=0;
//         $count=0;
//         echo "<br>";
//     }
          
//     $sum+=$students['grades'];
//     $count++;
//     echo "<div style=display:inline-block;font-size:20px;margin-top:10px;>";
//     echo "<span style='color:red;font-size:20px;width:150px;display:inline-block;'>";
//     echo ucfirst($students['first_name'])."<br>".ucfirst($students['last_name'])."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
//     echo "</span>";
//     echo "&nbsp;";
//     echo "&nbsp;";
//     $final_grade="";
//     if(in_array($students['id'], $keys)):
//         $final_grade=$students_has_finals[$students['id']];
//     endif;
//     echo "<input id='af".$br."".$students['id']."' type='number' style='width:50px;' min='1' max='5' value='".$final_grade."'></input>";
//     echo "&nbsp;";
//     echo "<a href='".URLROOT."/professor/final_grade/".$students['id']."/".$subject_id."' id='f".$br."".$students['id']."' onclick='finalGrade(this.id)' class='btn btn-dark' >Zakljuci</a>";
//     echo "&nbsp;&nbsp";
//     echo "<input id='au".$students['id']."' type='number' style='width:50px;' min='1' max='5'></input>";
//     echo "&nbsp;";
//     echo "<a  id='u".$students['id']."' onclick='newGrade(this.id)' class='btn btn-primary' href='".URLROOT."/professor/new_grade/".$students['id']."/".$subject_id."'>Unesi</a>";
//     echo "&nbsp;&nbsp;";
//     if($students['mark']!=null):        
//         echo $students['grades'];
//         echo "&nbsp;&nbsp;";
//         echo "<a  class='btn btn-danger'  href='".URLROOT."/professor/delete/".$students['mark']."'>Izbrisi</a>";
//         echo "&nbsp;";
//         echo "<input id='ai".$br."".$students['id']."' type='number' style='width:50px;' min='1' max='5'></input>";
//         echo "&nbsp;";
//         echo "<a  id='i".$br."".$students['id']."' onclick='edit(this.id)'  class='btn btn-success' href='".URLROOT."/professor/edit/".$students['mark']."/".$subject_id."'>izmeni</a>";
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
// ?>

// <script src="<?php echo URLROOT; ?>/assets/professor/js/diaryof.js"></script>
//  <script>
// document.body.onclick = function( e ) {

// // Cross-browser handling
// var evt = e || window.event,
//     target = evt.target || evt.srcElement;
// // If the element clicked is an anchor
// if ( target.nodeName === 'A' && target.dataset.a !='0' ) {
//     var a=document.getElementById(target.id);
//     var inp='a'+target.id;
//     var inp=document.getElementById(inp).value;
//     if(inp<1 || inp>5 && a.className!='btn-danger'){
//         alert('Unesite validnu ocenu');
//         return false; 
//     }
//    // Add the confirm box
//     return confirm( 'POTVRDI' );
//     }
// };
//  </script>  -->


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
    
        echo $students['grades'];
        echo "&nbsp;&nbsp;";
        echo "<a  class='btn btn-danger' href='".URLROOT."/professor/delete/".$students['mark']."'>Izbrisi</a>";
        echo "&nbsp;";
        echo "<input id='ai".$br."".$students['id']."' type='number' style='width:50px;' min='1' max='5'></input>";
        echo "&nbsp;";
        echo "<a id='i".$br."".$students['id']."' onclick='edit(this.id);' class='btn btn-success' href='".URLROOT."/professor/edit/".$students['mark']."/".$subject_id."'>izmeni</a>";
        echo "&nbsp;&nbsp;";
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
?>

<div class="card col-md-4 card-diaryof">
<div class="card-header">
<span class="float-left"><i class="fa fa-user fa-2x text-light"></i></span> <h3 class="card-title text-center text-light">Ucenik: <?php
            echo ucfirst($students['first_name']). " " .ucfirst($students['last_name'])."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?>
</h3>
</div>
  <div class="card-body">
    <div class="row">
        <div class="col-md-6 mb-2">
            <input class="form-control d-inline" type="number" id="af<?php echo $br.$students['id']?>" type="number" min='1' max='5' value="<?php echo $final_grade; ?>">
        </div>
        <div class="col-md-6">
            <a id="f<?php echo $br.$students['id']; ?>" type="btn" class="btn btn-info col-md-10" href="<?php echo URLROOT; ?>/professor/final_grade/<?php echo $students['id']; ?>/<?php echo $subject_id; ?>" onclick="finalGrade(this.id)">Zakljuci</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-2">
            <input class='form-control' id="au<?php echo $students['id']; ?>" type='number' min='1' max='5'>
        </div>
        <div class="col-md-6">
            <a type="btn" class="btn btn-primary col-md-10" id="u<?php echo $students['id']; ?>" onclick="newGrade(this.id)" href="<?php echo URLROOT; ?>/professor/new_grade/<?php echo $students['id']; ?>/<?php echo $subject_id; ?>">Unesi</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 my-2 text-light text-right font-weight-bold">
            <?php if($students['mark']!=null):        
        echo $students['grades']; ?>
        </div>
        <div class="col-md-6">
            <a type="btn" class="btn btn-danger col-md-10 mb-2" href="<?php echo URLROOT; ?>/professor/delete/<?php echo $students['mark']; ?>">Izbrisi</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-2">
            <input class="form-control d-inline" type="number" min="1" max="5" id="ai<?php echo $br.$students['id'];?>">
        </div>
        <div class="col-md-6">
            <a id="i<?php echo $students['id'];?>" type="btn" class="btn btn-success col-md-10 mb-2" href="<?php echo URLROOT; ?>/professor/edit/<?php echo $students['mark']; ?>/<?php echo $subject_id; ?>">Izmeni</a>
        </div>
    </div>
  </div>
</div>

<?php 
endif;

echo "<div class='col-md-12'>";     
        echo "<div class='text-center d-inline-block col-md-6 font-weight-bold bg-light mb-1' style='height:35px;'>".$students['grades']."</div>";
    
        echo "<a type='btn' class='btn btn-danger d-inline-block col-md-6 mb-1'  href='".URLROOT."/professor/delete/".$students['mark']."'>Izbrisi</a>";
echo "</div>";
        
echo "<div class='col-md-12'>";        
        echo "<input class='form-control col-md-6 d-inline' id='i".$br."".$students['id']."' type='number'  min='1' max='5'>";
      
        echo "<a id='a".$br."".$students['id']."' onclick='edit(this.id)'  class='form-control btn btn-success col-md-6' href='".URLROOT."/professor/edit/".$students['mark']."/".$subject_id."'>Izmeni</a>";
echo "</div>";
     
    //endif;
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

// Cross-browser handling
var evt = e || window.event,
    target = evt.target || evt.srcElement;
    var a=document.getElementById(target.id);
var inp='a'+target.id;
var inp=document.getElementById(inp).value;


// If the element clicked is an anchor
if ( target.nodeName === 'A' && target.dataset.a !='0' ) {
    if(inp<1 || inp>5 && a.className!='btn-danger'){
    alert('Unesite validnu ocenu');
    return false; 
}
   // Add the confirm box
    return confirm( 'POTVRDI' );
}
};
</script>