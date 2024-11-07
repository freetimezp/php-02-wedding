<?php $this->view("admin/admin-header"); ?>


<?php if ($action == 'new'): ?>

    <div class="col-md-6 mx-auto p-3">
        <h5>Add new user:</h5>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger text-center">
                <?= implode("<br>", $errors); ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <input value="<?= old_value('username') ?>" type="text" name="username"
                placeholder="Username" class="form-control mt-2">
            <input value="<?= old_value('email') ?>" type="email" name="email"
                placeholder="Email" class="form-control mt-2">
            <input value="<?= old_value('password') ?>" type="text" name="password"
                placeholder="Password" class="form-control mt-2">

            <button class="btn btn-primary mt-2">Save</button>

            <a href="<?= ROOT ?>/admin/users">
                <button type="button" class="btn btn-secondary mt-2">Back</button>
            </a>
        </form>
    </div>

<?php elseif ($action == 'edit'): ?>
    edit
<?php elseif ($action == 'delete'): ?>
    delete
<?php else: ?>

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

<?php endif; ?>


<?php $this->view("admin/admin-footer"); ?>