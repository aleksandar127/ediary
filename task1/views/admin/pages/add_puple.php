<p></p>
<h1><?php echo $this->data['title'];?></h1>
<a class="btn btn-success add">&#43;</a>

    <form action="<?php echo URLROOT; ?>/admin/save_new_pupils/<?php echo $this->data['class_id'];?>" method="POST">
    
    <div class="row">
     <div class="form-group">
            <label for="puple_n">Ime:</label>
            <input type="text" class="form-control" id="puple_n" name="puple_n1" placeholder="Petar">
            <p></p>
        </div>
        <div class="form-group">
            <label for="puple_s">Prezime:</label>
            <input type="text" class="form-control" id="puple_s" name="puple_s1" placeholder="Petrović">
            <p></p>
        </div>
        <div class="form-group">
            <label for="puple_n">Ime roditelja:</label>
            <input type="text" class="form-control" id="parent_n" name="parent_n1" placeholder="Petar">
            <p></p>
        </div>
        <div class="form-group">
            <label for="puple_s">Prezime roditelja:</label>
            <input type="text" class="form-control" id="parent_s" name="parent_s1" placeholder="Petrović">
            <p></p>
        </div>
        <div class="form-group">
            <label for="parent_usr">Username roditelja:</label>
            <input type="text" class="form-control" id="parent_usr" name="parent_username1" placeholder="mikica">
            <p></p>
        </div>

        <div class="form-group">
            <label for="pass">Generisati šifru roditelja:</label>
            <input type="text" class="form-control" id="pass" name="parent_pass1" placeholder="123456">
            <p></p>
        </div>

        <div class="form-group">
            <label for="re_pass">Potvrditi šifru:</label>
            <input type="text" class="form-control" id="re_pass" name="parent_re_pass1" placeholder="123456">
            <p></p>
    </div>
   
    </div>
    <button type="submit" class="btn btn-dark">Dodaj učenika/e</button>
    </form>
    <?php if(isset($_GET['success'])): ?>
        <small style="color: green; font-weight: bold; margin-top: 5px; margin-left:5%;">
            <?php echo $_GET['success']; ?>
        </small>
    <?php endif; ?>

<script src="<?php echo URLROOT; ?>/assets/admin/js/add_pupils.js"></script>