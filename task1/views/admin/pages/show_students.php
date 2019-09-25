<div class="container">
    <p></p>
    <h1><?php echo $this->data['title']; ?></h1>
    <a  class="btn btn-success" href="http://localhost/eDiary/task1/admin/add_puple/<?php echo $this->data['class'];?>">Dodaj novog učenika</a>
        <?php if(isset($_GET['success'])): ?>
        <small style="color: green; font-weight: bold; margin-top: 5px;">
            <?php echo $_GET['success']; ?>
        </small>
        <?php endif; ?>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Ime učenika</th>
        <th scope="col">Prezime učenika</th>
        <th scope="col">Odeljenje</th>
        <th scope="col">Roditelj</th>
        <th scope="col">Izmeni informacije</th>
        <th scope="col">Izbriši učenika</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($this->data['students_info'] as $student): ?>
            <tr>
                <th scope="row"><?php echo $student['id']; ?></th>
                <td><?php echo $student['student_name']; ?></td>
                <td><?php echo $student['student_surname']; ?></td>
                <td><?php echo $student['class_name']; ?></td>
                <td><?php echo $student['parent_name'].' '.$student['parent_surname']; ?></td>
                <td><a class="btn btn-dark" href="<?php echo URLROOT; ?>/admin/edit_student/<?php echo $student['id'];?>">Izmeni učenika</a></td>
                <td><a class="btn btn-danger" href="#">Izbriši učenika</a>
                
                <div class="pop-up" id="pop-up">
                <p>Are you sure you want to delete this user?</p>
                <a class="delete" href="<?php echo URLROOT; ?>/admin/delete_student/<?php echo $student['id']; ?>">Izbriši</a>
                <a class="cancel">Otkaži</a>
                </div>

                <div id="overlay"></div>
                
                
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
    </table>
</div>

<script src="<?php echo URLROOT; ?>/assets/admin/js/delete_confirm.js"></script>