
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
        <td><?php print($row['title']); ?></td>
        <td>
            <a href="?action=questions&id=<?php print($row['title']); ?>">Questions</a>
            <a href="?action=delete_test&id=<?php print($row['id']); ?>&table=<?php print($row['title']); ?>">Delete</a>
        </td>
    </tr>

    <?php endforeach ?>


    </tbody>
</table>

