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
//     echo "<input id='m".$br."".$students['id']."' type='number' style='width:50px;' min='1' max='5' value='".$final_grade."'></input>";
//     echo "&nbsp;";
//     echo "<a href='".URLROOT."/professor/final_grade/".$students['id']."/".$subject_id."' id='f".$br."".$students['id']."' onclick='finalGrade(this.id)' class='btn btn-dark' >Zakljuci</a>";
//     echo "&nbsp;&nbsp";
//     echo "<input id='o".$students['id']."' type='number' style='width:50px;' min='1' max='5'></input>";
//     echo "&nbsp;";
//     echo "<a  id='b".$students['id']."' onclick='newGrade(this.id)' class='btn btn-primary' href='".URLROOT."/professor/new_grade/".$students['id']."/".$subject_id."'>Unesi</a>";
//     echo "&nbsp;&nbsp;";
//     if($students['mark']!=null):        
//         echo $students['grades'];
//         echo "&nbsp;&nbsp;";
//         echo "<a  class='btn btn-danger'  href='".URLROOT."/professor/delete/".$students['mark']."'>Izbrisi</a>";
//         echo "&nbsp;";
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

<!-- <script src="<?php // echo URLROOT; ?>/assets/professor/js/diaryof.js"></script>
<script>
document.body.onclick = function( e ) { 
    // Cross-browser handling
 //   var evt = e || window.event,
 //       target = evt.target || evt.srcElement;
    // If the element clicked is an anchor
//    if ( target.nodeName === 'A' && target.className != 'navProf' ) {
       // Add the confirm box
//         return confirm( 'POTVRDI' );
//     }
// };
// </script>


<!-- ***************************************************************** -->

<div class="container-fluid">
<div class="card col-md-3 card-diaryof">
<div class="card-header">
    <span class="float-left"><i class="fa fa-user fa-2x"></i></span> <h3 class="card-title text-center">Ucenik: Pera Peric</h3>
</div>
  <div class="card-body">
    <h5 class="card-subtitle mb-4 text-muted">Predmet: Matematika</h5>
    <div class="row">
        <div class="col-md-6 mb-2">
            <input class="form-control d-inline" type="number">
        </div>
        <div class="col-md-6">
            <button class="btn btn-dark col-md-6" type="btn">Zakljuci</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-2">
            <input class="form-control d-inline" type="number">
        </div>
        <div class="col-md-6">
            <button class="btn btn-primary col-md-6" type="btn">Unesi</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-2">
            <input class="form-control d-inline" type="number">
        </div>
        <div class="col-md-6">
            <a type="btn" class="btn btn-danger col-md-6" href="#">Izbrisi</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-2">
            <input class="form-control d-inline" type="number">
        </div>
        <div class="col-md-6">
            <button class="btn btn-success col-md-6" type="btn">Izmeni</button>
        </div>
    </div>
  </div>
</div></div>

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

?>
<div class="container-fluid">

<?php
foreach($this->data['diaries'] as $students):
    $array_is_long++;
    if($id==$students['id']):
        $br++;
        $count++;
        echo "<div style=display:inline-block;font-size:20px;margin-top:10px;>";
        echo $students['grades'];
        echo "&nbsp;&nbsp;";
        echo "<a  class='btn btn-danger' href='".URLROOT."/professor/delete/".$students['mark']."'>Izbrisi</a>";
        echo "&nbsp;";
        echo "<input id='i".$br."".$students['id']."' type='number' style='width:50px;' min='1' max='5'></input>";
        echo "&nbsp;";
        echo "<a   id='a".$br."".$students['id']."' onclick='edit(this.id)' class='btn btn-success' href='".URLROOT."/professor/edit/".$students['mark']."/".$subject_id."'>izmeni</a>";
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
?>
    
<div class="card col-md-3 card-diaryof">
<div class="card-header">
<span class="float-left"><i class="fa fa-user fa-2x"></i></span> <h3 class="card-title text-center">Ucenik: 
<?php
    echo ucfirst($students['first_name']). " " .ucfirst($students['last_name'])."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
?>
    </h3>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-md-6 mb-2">

<?php
    $final_grade="";
    if(in_array($students['id'], $keys)):
        $final_grade=$students_has_finals[$students['id']];
    endif;
    echo "<input class='form-control d-inline' id='m".$br."".$students['id']."' type='number' min='1' max='5' value='".$final_grade."'>";
echo "<div>";
echo '<div class="col-md-6">';
    echo "<a type='btn' href='".URLROOT."/professor/final_grade/".$students['id']."/".$subject_id."' id='f".$br."".$students['id']."' onclick='finalGrade(this.id)' class='btn btn-dark col-md-6'>Zakljuci</a>";
echo "</div>";
    
    echo "<input class='form-control d-inline' id='o".$students['id']."' type='number' min='1' max='5'>";
  
    echo "<a  id='b".$students['id']."' onclick='newGrade(this.id)' class='btn btn-primary' href='".URLROOT."/professor/new_grade/".$students['id']."/".$subject_id."'>Unesi</a>";
    echo "&nbsp;&nbsp;";
    if($students['mark']!=null):        
        echo $students['grades'];
        echo "&nbsp;&nbsp;";
        echo "<a  class='btn btn-danger'  href='".URLROOT."/professor/delete/".$students['mark']."'>Izbrisi</a>";
        echo "&nbsp;";
        echo "<input id='i".$br."".$students['id']."' type='number' style='width:50px;' min='1' max='5'></input>";
        echo "&nbsp;";
        echo "<a  id='a".$br."".$students['id']."' onclick='edit(this.id)'  class='btn btn-success' href='".URLROOT."/professor/edit/".$students['mark']."/".$subject_id."'>izmeni</a>";
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

<script src="<?php echo URLROOT; ?>/assets/professor/js/diaryof.js"></script>
<script>
document.body.onclick = function( e ) {
    // Cross-browser handling
    var evt = e || window.event,
        target = evt.target || evt.srcElement;
    // If the element clicked is an anchor
    if ( target.nodeName === 'A' && target.className != 'navProf' ) {
       // Add the confirm box
        return confirm( 'POTVRDI' );
    }
};
</script>
