<?php
include_once ('includes/header.php');
include_once 'libs/created_todo.php';
?>


<form method="post" action="add_new.php">
    <div class="col-md-9">
        <div id='mainContent'>
            <div id='head'>
                <h2>Create Todo</h2>
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
        <div class="form-group">
            <label for="Title">Title</label>
            <input type="text" name="title" id='title' class="form-control"/>
        </div>

        <div class="form-group">
            <label for="Title">Description <small>(Optional)</small></label>
            <textarea name="desc" id='desc' class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="Title">Due Date</label>
            <input type="text" name="due_date" id='due_date' class="form-control"/>
        </div>

        <div class="form-group">
            <label for="Title">Label Under</label>
            <select name="label_under" id='label_under' class="form-control">
                <option value="" >Select</option>
                <option value="Inbox">Inbox</option>
                <option value="Read Later">Read Later</option>
                <option value="Important">Important</option>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" value="Create" name="create_todo" id='create_todo' class="btn btn-info"/>
        </div>

    </div>     
</form>


<script>

$( "#due_date" ).datepicker({
    dateFormat: 'dd-mm-yy'
	
});

</script>
</body>
</html>
 