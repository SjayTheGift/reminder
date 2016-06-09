<?php
include_once ('includes/header.php');
include_once 'libs/list_todo.php';
include_once 'libs/delete.php';
?>
<div class="col-md-9">
    <div id='mainContent'>
        <h2 id='space'>Manage Todo</h2>
        <a href="add_new.php" id='btn' class="btn btn-success btn-sm">+ Add New</a>
    </div>
    <?php
    if (isset($error)) {
        echo '<div class="alert-danger">' . $error . '</div><br/>';
    }
    ?>
    <div class="table-responsive">
        <table  class="table table-condensed table-hover">
            <tbody>
                <tr>
                    <th>Title</th>
                    <th>Snippet</th>
                    <th>Due Date</th>
                    <th>Time Left</th>
                    <th>Progress</th>
                    <th>Actions</th>
                </tr>
                <tr>
                    <?php
                    if ($list_todo !== 0) {
                        foreach ($list_todo as $key => $value) {
                            $today = strtotime("now");
                            $due_date = strtotime($value['due_date']);
                            if ($due_date > $today) {
                                $hours = $due_date - $today;
                                $hours = $hours / 3600;
                                $time_left = $hours / 24;
                                if ($time_left < 1) {
                                    $time_left = 'Less than 1 day';
                                } else {
                                    $time_left = round($time_left) . ('days remaining');
                                }
                            } else {
                                $time_left = 'Expired';
                            }
                            ?>
                            <td><?php echo $value['title']; ?></td>
                            <td><?php echo $value['description']; ?></td>
                            <td><?php echo $value['due_date']; ?></td>
                            <td><?php echo $time_left; ?></td>
                            <td><div class="progress progress-striped active">
                                    <div class="progress-bar" 
                                         style="width:<?php echo $value['progress']; ?>%"></div>
                                </div>
                            </td>
                            <td>
                                <a href="edit.php?id=<?php echo $value['id']; ?>" title="<?php echo $value['title']; ?>">edit</a> | 
                                <a href="index.php?delete=<?php echo $value['id']; ?>" title="<?php echo $value['title']; ?>">delete</a>
                            </td>
                        </tr>
        <?php
    }
} else {
    echo '<td><td><td>Sorry no more to do under this section</td></td></td>' . '<td></td><td></td><td></td>';
}
?>

            </tbody>
        </table>
    </div>
</div>
</div><!--End Row-->
</div>
</body>
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
