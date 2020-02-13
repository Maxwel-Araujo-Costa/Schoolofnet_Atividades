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
                <td><?php echo $user->email; ?></td>
                <td>
                    <a href="/admin/users/view/<?php echo $user->id; ?>">view</a>
                    <a href="/admin/users/edit/<?php echo $user->id; ?>">edit</a>
                    <?php echo $this->Form->create($user, ['type' => 'delete', 'url' => ['action' => 'delete/']]); ?>
                    <input type="submit" value="delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="/admin/users/add">new</a>