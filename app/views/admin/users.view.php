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
    <div class="col-md-6 mx-auto p-3">
        <h5>Edit user info:</h5>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger text-center">
                <?= implode("<br>", $errors); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($row)): ?>
            <form method="POST">
                <input value="<?= old_value('username', $row->username) ?>" type="text" name="username"
                    placeholder="Username" class="form-control mt-2">
                <input value="<?= old_value('email', $row->email) ?>" type="email" name="email"
                    placeholder="Email" class="form-control mt-2">
                <input value="<?= old_value('password') ?>" type="text" name="password"
                    placeholder="Password (leave empty to save old password)" class="form-control mt-2">

                <button class="btn btn-primary mt-2">Save</button>

                <a href="<?= ROOT ?>/admin/users">
                    <button type="button" class="btn btn-secondary mt-2">Back</button>
                </a>
            </form>
        <?php else: ?>
            <div class="alert alert-danger text-center">
                Record not found
            </div>
            <a href="<?= ROOT ?>/admin/users">
                <button type="button" class="btn btn-secondary mt-2">Back</button>
            </a>
        <?php endif; ?>
    </div>
<?php elseif ($action == 'delete'): ?>
    <div class="col-md-6 mx-auto p-3">
        <h5>Delete user:</h5>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger text-center">
                <?= implode("<br>", $errors); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($row)): ?>
            <form method="POST">
                <div class="form-control mt-2">
                    Username: <?= old_value('username', $row->username) ?>
                </div>
                <div class="form-control mt-2">
                    Email: <?= old_value('email', $row->email) ?>
                </div>

                <button class="btn btn-danger mt-4">Delete</button>

                <a href="<?= ROOT ?>/admin/users">
                    <button type="button" class="btn btn-secondary mt-4">Back</button>
                </a>
            </form>
        <?php else: ?>
            <div class="alert alert-danger text-center">
                Record not found
            </div>
            <a href="<?= ROOT ?>/admin/users">
                <button type="button" class="btn btn-secondary mt-2">Back</button>
            </a>
        <?php endif; ?>
    </div>
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
                            <a href="<?= ROOT ?>/admin/users/edit/<?= $row->id ?>">
                                <button class="btn btn-sm btn-warning">Edit</button>
                            </a>

                            <a href="<?= ROOT ?>/admin/users/delete/<?= $row->id ?>">
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </a>
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