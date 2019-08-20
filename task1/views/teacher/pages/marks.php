    <div id="table">
        <div class="wrapper">
            <table>
                 <tr>
                    <th>#</th>
                    <?php foreach($this->data['subjects'] as $subject): ?>
                    <th><?php echo $subject['name']; ?></th>
                    <?php endforeach; ?>
                </tr>
                <?php foreach($this->data['students'] as $student): ?>
                <tr>
                    <td><a href="#"><a href="#"><span><?php echo $student['id']; ?>. </span> <span><?php echo $student['first_name']; ?> </span> <span> <?php echo $student['last_name'];?></span> </a></td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>

                </tr>
                <?php endforeach; ?>
            </table>
        </div><!-- end .wrapper -->
    </div><!-- end #table -->