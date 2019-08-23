<a  class="btn btn-success sub" href="#">Dodaj novi predmet</a>
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
                <th scope="col">Predmeti</th>
                <th scope="col">Izmeni predmet</th>
                <th scope="col">Izbriši predmet</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($this->data['subjects_low_grades'] as $low): ?>
                <tr>
                <th scope="row"><?php echo $low['id'];?></th>
                <td><?php echo $low['name'];?></td>
                <td><a class="btn btn-dark" href="<?php echo 'http://localhost/eDiary/task1/admin/edit_subject/'.$low['id']?>">Izmeni predmet</a></td>
                <td><a class="btn btn-danger" href="<?php  echo 'http://localhost/eDiary/task1/admin/delete_sub/'.$low['id'];?>">Izbriši predmet</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm d-flex justify-content-center">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Predmeti</th>
                <th scope="col">Predavač</th>
                <th scope="col">Izmeni predmet</th>
                <th scope="col">Izbriši predmet</th>
                </tr>
            </thead>
            <tbody>
                 <?php foreach($this->data['subjects_high_grades'] as $high): ?>
                <tr>
                <th scope="row"><?php echo $high['id'];?></th>
                <td><?php echo $high['name'];?></td>
                <td><?php echo $high['first_name'].' '.$high['last_name']; ?></td>
                <td><a class="btn btn-dark" href="<?php echo 'http://localhost/eDiary/task1/admin/edit_subject/'.$high['id']?>">Izmeni predmet</a></td>
                <td><a class="btn btn-danger" href="<?php  echo 'http://localhost/eDiary/task1/admin/delete_sub/'.$high['id'];?>">Izbriši predmet</a>

                <div class="pop-up" id="pop-up">
                    <p>Are you sure you want to delete this user?</p>
                    <a class="delete" href="<?php  echo 'http://localhost/eDiary/task1/admin/delete_sub/'.$high['id'];?>">Izbriši</a>
                    <a class="cancel">Otkaži</a>
                </div>

                <div id="overlay"></div>
                
                </td>
                <?php endforeach; ?>
                </tr>
            </tbody>
        </table>
    </div>
  </div>

  <script src="http://localhost/eDiary/task1/assets/admin/js/delete_confirm.js"></script>