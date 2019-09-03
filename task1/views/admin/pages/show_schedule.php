<div class="container">
    <h3>Raspored časova za odeljenje <?php echo $this->data['class']['name']; ?></h3>
    <!-- <?php //var_dump($this->data['monday_schedule']);?> -->
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Ponedeljak</th>
            <th scope="col">Utorak</th>
            <th scope="col">Sreda</th>
            <th scope="col">Četvrtak</th>
            <th scope="col">Petak</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($this->data['monday_schedule'] as $mon_sch):?>
            <tr>
                
            <th scope="row"><?php echo $this->data['counter']++; ?></th>
            <td><?php echo $mon_sch['subject']; ?></td>
            <td>hahahah</td>
        </tr>
            <?php endforeach;?>
            <tr>
        </tbody>
    </table>

