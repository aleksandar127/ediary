<div class="container">
    <form action="<?php echo URLROOT;?>/admin/save_notification" method="POST">
        <div class="form-group">
            <label for="parent_news">Ispiši novo obaveštenje za roditelje:</label>
            <textarea class="form-control" id="parent_news" name="parent_news" rows="3"></textarea>
            <p></p>
        </div>
        <input type="submit" class="btn btn-dark" value="Ispiši">
    </form>


    <?php if(isset($_GET['success'])): ?>
        <small style="color: green; font-weight: bold; margin-top: 5px; ">
            <?php echo $_GET['success']; ?>
        </small>
    <?php endif; ?>

    <div class="nots">
        <?php foreach($this->data['notifications'] as $notification): ?> 
            <div class="card-deck">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Obaveštenje:</h5>
                    <p class="card-text"><?php echo $notification['notifications'];?></p>
                </div>
                <a href="#" class="btn btn-danger">Izbriši</a>

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
    
</div>

<script src="<?php echo URLROOT;?>/assets/admin/js/delete_confirm.js"></script>
<script src="<?php echo URLROOT;?>/assets/admin/js/validate_notificatons.js"></script>