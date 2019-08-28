<a  class="btn btn-success sub" href="http://localhost/eDiary/task1/admin/add_class">Kreiraj odeljenje</a>
<div class="row">
    <h3 class="col">Niži razredi</h3>
    <h3 class="col">Viši razredi</h3>
</div>
<div class="row">
    <div class="col-sm d-flex justify-content-center">    
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Odeljenje</th>
                <th scope="col">Učitelj</th>
                <th scope="col">Izmeni odeljenja</th>
                <th scope="col">Izbriši odeljenje</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($this->data['low_classes'] as $low_c): ?>
                <tr>
                <th scope="row"><?php echo $low_c['id']?></th>
                <td><?php echo $low_c['name']; ?></td>
                <td><?php echo $low_c['first_name'].' '.$low_c['last_name']; ?></td>
                <td><a class="btn btn-dark" href="<?php echo 'http://localhost/eDiary/task1/admin/edit_class/'.$low_c['id']?>">Izmeni odeljenje</a></td>
                <td><a class="btn btn-danger" href="<?php  echo 'http://localhost/eDiary/task1/admin/delete_class/'.$low_c['id'];?>">Izbriši odeljenje</a>
                
                <div class="pop-up" id="pop-up">
                    <p>Are you sure you want to delete this user?</p>
                    <a class="delete" href="<?php  echo 'http://localhost/eDiary/task1/admin/delete_class/'.$low_c['id'];?>">Izbriši</a>
                    <a class="cancel">Otkaži</a>
                </div>

                <div id="overlay"></div>
                </td>
                </tr>
                <?php endforeach;?>

            </tbody>
        </table>
    </div>
    <div class="col-sm d-flex justify-content-center">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Odeljenje</th>
                <th scope="col">Razredni starešina</th>
                <th scope="col">Izmeni odeljenje</th>
                <th scope="col">Izbriši odeljenje</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($this->data['high_classes'] as $high_c): ?>
                <tr>
                <th scope="row"><?php echo $high_c['id']; ?></th>
                <td><?php echo $high_c['name']; ?></td>
                <td><?php echo $high_c['first_name'].' '.$high_c['last_name']; ?></td>
                <td><a class="btn btn-dark" href="<?php echo 'http://localhost/eDiary/task1/admin/edit_class/'.$high_c['id']?>">Izmeni odeljenje</a></td>
                <td><a class="btn btn-danger" href="<?php  echo 'http://localhost/eDiary/task1/admin/delete_class/'.$high_c['id'];?>">Izbriši odeljenje</a>

                <div class="pop-up" id="pop-up">
                    <p>Da li ste sigurni da želite da izbrišete ovo odeljenje?</p>
                    <a class="delete" href="<?php  echo 'http://localhost/eDiary/task1/admin/delete_class/'.$high_c['id'];?>">Izbriši</a>
                    <a class="cancel">Otkaži</a>
                </div>

                <div id="overlay"></div>
                
                </td>
                <?php endforeach;?>
                </tr>
            </tbody>
        </table>
    </div>
  </div>

    <script src="http://localhost/eDiary/task1/assets/admin/js/delete_confirm.js"></script>