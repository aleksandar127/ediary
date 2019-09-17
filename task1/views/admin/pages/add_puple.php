<!-- <div class="container">
<p></p> -->
<h1><?php echo $this->data['title'];?></h1>
<a class="btn btn-success add">&#43;</a>
    <form action="<?php echo URLROOT; ?>/admin/save_new_pupils" method="POST">
   
    <div class="row">
     <div class="form-group">
            <label for="puple_n">Ime:</label>
            <input type="text" class="form-control" id="puple_n" name="puple_n" placeholder="Petar">
            <p></p>
        </div>
        <div class="form-group">
            <label for="puple_s">Prezime:</label>
            <input type="text" class="form-control" id="puple_s" name="puple_s" placeholder="Petrović">
            <p></p>
        </div>
        <div class="form-group">
            <label for="puple_n">Ime roditelja:</label>
            <input type="text" class="form-control" id="puple_n" name="parent_n" placeholder="Petar">
            <p></p>
        </div>
        <div class="form-group">
            <label for="puple_s">Prezime roditelja:</label>
            <input type="text" class="form-control" id="puple_s" name="parent_s" placeholder="Petrović">
            <p></p>
        </div>
        <div class="form-group">
            <label for="parent_usr">Username roditelja:</label>
            <input type="text" class="form-control" id="parent_usr" name="parent_username" placeholder="mikica">
            <p></p>
        </div>

        <div class="form-group">
            <label for="pass">Generisati šifru roditelja:</label>
            <input type="text" class="form-control" id="pass" name="parent_pass" placeholder="123456">
            <p></p>
        </div>

        <div class="form-group">
            <label for="re_pass">Potvrditi šifru:</label>
            <input type="text" class="form-control" id="re_pass" name="parent_re_pass" placeholder="123456">
            <p></p>
    </div>
   
  </div>
        <!-- <div class="form-group">
            <label for="puple_n">Ime:</label>
            <input type="text" class="form-control" id="puple_n" name="puple_n" placeholder="Petar">
            <p></p>
        </div>
        <div class="form-group">
            <label for="puple_s">Prezime:</label>
            <input type="text" class="form-control" id="puple_s" name="puple_s" placeholder="Petrović">
            <p></p>
        </div>
        <div class="form-group">
            <label for="puple_n">Ime roditelja:</label>
            <input type="text" class="form-control" id="puple_n" name="parent_n" placeholder="Petar">
            <p></p>
        </div>
        <div class="form-group">
            <label for="puple_s">Prezime roditelja:</label>
            <input type="text" class="form-control" id="puple_s" name="parent_s" placeholder="Petrović">
            <p></p>
        </div>
        <div class="form-group">
            <label for="parent_usr">Unesi username koji ce roditelj koristiti:</label>
            <input type="text" class="form-control" id="parent_usr" name="parent_username" placeholder="mikica">
            <p></p>
        </div>

        <div class="form-group">
            <label for="pass">Generisati šifru roditelja:</label>
            <input type="text" class="form-control" id="pass" name="parent_pass" placeholder="123456">
            <p></p>
        </div>

        <div class="form-group">
            <label for="re_pass">Potvrditi šifru:</label>
            <input type="text" class="form-control" id="re_pass" name="parent_re_pass" placeholder="123456">
            <p></p>
        </div> -->

        <button type="submit" class="btn btn-dark">Dodaj učenika</button>
    </form>

<!-- </div> -->

<script src="<?php echo URLROOT; ?>/assets/admin/js/add_pupils.js"></script>