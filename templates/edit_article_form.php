<?php foreach ($result as $row) :?>


<form method="post">

    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="<?php print($row['title']) ?>">
    </div>

    <div class="form-group">
        <a href="?action=edit&id=<?php print $row['id'] ?>">
        <button type="submit" class="btn btn-default">Submit</button>
        </a>
    </div>

</form>

<?php endforeach ?>