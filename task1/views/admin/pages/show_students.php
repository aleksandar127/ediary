<div class="container">
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
                <td><?php echo $student['class_id']; ?></td>
                <td><?php echo $student['parent_name'].' '.$student['parent_surname']; ?></td>
                <td><a class="btn btn-dark" href="<?php echo URLROOT; ?>/admin/edit_student/<?php echo $student['id'];?>">Izmeni učenika</a></td>
                <td><a class="btn btn-danger" href="#">Izbriši učenika</a></td>
            </tr>
        <?php endforeach;?>
    </tbody>
    </table>
</div>