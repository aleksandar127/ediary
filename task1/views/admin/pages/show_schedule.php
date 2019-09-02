<div class="container">
    <h3>Raspored časova za odeljenje <?php echo $this->data['class']['name']; ?></h3>
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
        <!-- <tbody>
        <?php foreach($this->data['class_schedule'] as $schedule):?>
            <tr>
            <th scope="row"><?php echo $schedule['lesson_no'];?></th>
            <?php if($schedule['day_in_week'] == 1): ?>
                <td><?php echo $schedule['subject'];?></td>
            <?php endif; ?>
            <?php if($schedule['day_in_week'] == 2): ?>
                <td><?php echo $schedule['subject'];?></td>
            <?php endif; ?>
            <td>Otto</td>
            <td>@mdo</td>
            </tr>
        <?php endforeach;?>
        </tbody> -->
    </table>
</div>