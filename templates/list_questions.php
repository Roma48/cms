<a href="?action=add_question&id=<?php print $_GET['id']; ?>">Add question</a>
<table class="table ">
    <thead>
    <tr>
        <th width="5%">#</th>
        <th width="85%">Title</th>
        <th>Function</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) :?>


    <tr>
        <td><?php print($row['id']); ?></td>
        <td><?php print($row['question']); ?></td>
        <td>
            <a href="?action=edit_question&test=<?php print($_GET['id']); ?>&id=<?php print($row['id']); ?>">Edit</a>
            <a href="?action=delete_question&id=<?php print($row['id']); ?>&table=<?php print($_GET['id']); ?>">Delete</a>
        </td>
    </tr>

    <?php endforeach ?>


    </tbody>
</table>

