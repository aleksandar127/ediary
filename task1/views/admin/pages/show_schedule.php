<div class="container">
    <h3 class="sch_hed">Raspored časova za odeljenje: <?php echo $this->data['class']['name']; ?></h3>
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
            <tr>
                <th scope="row"><?php echo $this->data['counter']++; ?></th>
                <?php foreach($this->data['first_classes'] as $first_classes):?>
                    <td><?php echo $first_classes['subject']; ?></td>
                <?php endforeach;?>
             </tr>
             <tr>
                <th scope="row"><?php echo $this->data['counter']++; ?></th>
                <?php foreach($this->data['second_classes'] as $second_classes):?>
                    <td><?php echo $second_classes['subject']; ?></td>
                <?php endforeach;?>
            </tr>
             <tr>
                <th scope="row"><?php echo $this->data['counter']++; ?></th>
                <?php foreach($this->data['third_classes'] as $third_classes):?>
                    <td><?php echo $third_classes['subject']; ?></td>
                <?php endforeach;?>
            </tr>
             <tr>
                <th scope="row"><?php echo $this->data['counter']++; ?></th>
                <?php foreach($this->data['fourth_classes'] as $fourth_classes):?>
                    <td><?php echo $fourth_classes['subject']; ?></td>
                <?php endforeach;?>
            </tr>
             <tr>
                <th scope="row"><?php echo $this->data['counter']++; ?></th>
                <?php foreach($this->data['fifth_classes'] as $fifth_classes):?>
                    <td><?php echo $fifth_classes['subject']; ?></td>
                <?php endforeach;?>
            </tr>
            <tr>
                <th scope="row"><?php echo $this->data['counter']++; ?></th>
                <?php foreach($this->data['sixth_classes'] as $sixth_classes):?>
                    <td><?php echo $sixth_classes['subject']; ?></td>
                <?php endforeach;?>
            </tr>
            <tr>
                <th scope="row"><?php echo $this->data['counter']++; ?></th>
                <?php foreach($this->data['seventh_classes'] as $seventh_classes):?>
                    <td><?php echo $seventh_classes['subject']; ?></td>
                <?php endforeach;?>
            </tr>
        </tbody>
    </table>

<script src="http://localhost/eDiary/task1/assets/admin/js/schedule.js"></script>