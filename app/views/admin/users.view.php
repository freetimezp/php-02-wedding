<?php $this->view("admin/admin-header"); ?>

<h5>
    Users |

    <a href="<?= ROOT ?>/admin/users/new">
        <button class="btn btn-sm btn-primary">
            Add new
        </button>
    </a>

</h5>

<table class="table table-striped table-bordered">

    <?php if (!empty($data['rows'])): ?>
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    <?php endif; ?>

    <tbody>
        <?php if (!empty($data['rows'])): ?>
            <?php foreach ($data['rows'] as $row): ?>
                <tr>
                    <td>#<?= $row->id ?></td>
                    <td><?= $row->username ?></td>
                    <td><?= $row->email ?></td>
                    <td>
                        <button class="btn btn-sm btn-warning">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>No users were found</tr>
        <?php endif; ?>
    </tbody>

</table>

<?php $this->view("admin/admin-footer"); ?>