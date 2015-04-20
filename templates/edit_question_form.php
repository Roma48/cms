<?php foreach ($result as $row) :?>


<form method="post">

    <div class="form-group">
        <label>Question</label>
        <input type="text" name="question" class="form-control" value="<?php print($row['question']) ?>">
    </div>

    <div class="form-group">
<!--        <a href="?action=edit&id=--><?php //print $row['id'] ?><!--">-->
        <button type="submit" class="btn btn-default">Submit</button>
<!--        </a>-->
    </div>

</form>

<?php endforeach ?>