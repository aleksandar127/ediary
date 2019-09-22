<div class="container">
    <form action="#" method="POST">
        <div class="form-group">
            <label for="parent_news">Ispiši novo obaveštenje za roditelje:</label>
            <textarea class="form-control" id="parent_news" name="parent_news" rows="3"></textarea>
        </div>
        <input type="submit" class="btn btn-dark" value="Ispiši">
    </form>

    <?php foreach($this->data['notifications'] as $notification): ?> 
    
        <div class="card-deck">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Obaveštenje:</h5>
                <p class="card-text"><?php echo $notification['notifications'];?></p>
            </div>
            <a href="#" class="btn btn-danger">Izbriši obaveštenje</a>

            <div class="pop-up" id="pop-up">
                <p>Da li ste sigurni da želite da izbrišete ovo obaveštenje?</p>
                <a class="delete" href="<?php echo URLROOT; ?>/admin/delete_notification/<?php echo $notification['id'];?>">Izbriši</a>
                <a class="cancel">Otkaži</a>
              </div>

            <div id="overlay"></div>
        </div>
        </div>
    <?php endforeach;?> 
</div>

<script src="<?php echo URLROOT;?>/assets/admin/js/delete_confirm.js"></script>