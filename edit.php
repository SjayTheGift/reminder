<?php 
include_once ('includes/header.php');
include_once 'libs/list_todo.php';
include_once 'libs/edit_todo.php';
?>


<form method="post" action="edit.php?id=<?php echo $_GET['id'];?>">
    <div class="col-md-9">
        <div id='mainContent'>
            <div id='head'>
                <h2>Edit Todo</h2>
            </div>
        </div>
        <?php
        if (isset($error)) {
            echo '<div class="alert-danger">' . $error . '</div><br/>';
        }
        ?>
        <?php
        if (isset($success)) {
            echo '<div class="alert-success">' . $success . '</div><br/>';
        }
        ?>
        
        <?php  foreach ($list_todo as $td)
            $given_array = array("Inbox","Read Later","Important");
            $selected_array = array($td['label']);
            $array_remaining = array_diff($given_array,$selected_array);
        {?>
        <div class="form-group">
            <label for="Title">Title</label>
            <input type="text" name="title" id='title' value="<?php echo $td['title']; ?>" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="Title">Description <small>(Optional)</small></label>
            <textarea name="desc" id='desc' class="form-control"><?php echo $td['description']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="Title">Due Date</label>
            <input type="text" name="due_date" id='due_date' value="<?php echo $td['due_date']; ?>" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="Title">Label Under</label>
            <select name="label_under" id='label_under' class="form-control">
                <?php
                     echo '<option value ="'.$td['label'].'">'.$td['label'].'</option>';
                     foreach($array_remaining as $ar){
                         echo '<option value ="'.$ar.'">'.$ar.'</option>';
                     }
                ?>
            </select>
        </div>

        <div class="form-group">
            <div id="seekbar"></div>
            <div id="progress"><?php echo $td['progress']; ?>%</div>
            <input type="hidden" name="progress_value" value="<?php echo $td['progress']; ?>" id="progress_value"/>
        </div>
        
        <div class="form-group">
            <input type="submit" value="Edit" name="edit_todo" id='edit_todo' class="btn btn-info"/>
        </div>
        <?php }?>
    </div>     
</form>


<script>
    $(function () {
     var currentValue = $("#progress_value").val();
        $("#due_date").datepicker({
            dateFormat: 'dd-mm-yy'

        });
        
        $("#seekbar").slider({
            range: "max",
            min: 0,
            max: 100,
            value: currentValue,
            slide: function (event, ui) {
                $("#progress").html(ui.value + '%');
                $("#progress_value").val(ui.value);       
           }
        });
        //$("#progress_value").val($("#seekbar").slider("value"));
    });

</script>
</body>
</html>
 