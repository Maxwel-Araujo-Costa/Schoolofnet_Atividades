<table>

    <thead>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>username</td>
            <td>email</td>
            <td>action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) :    ?>
            <tr>
                <td><?php echo $user->id; ?></td>
                <td><?php echo $user->name; ?></td>
                <td><?php echo $user->username; ?></td>
                <td><?php echo $user->action; ?></td>
                <td>
                    <a href="">view</a>
                    <a href="">edit</a>
                    <a href="">delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="">new</a>