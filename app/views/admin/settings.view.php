<?php $this->view("admin/admin-header"); ?>


<?php if ($action == 'new'): ?>

    <div class="col-md-6 mx-auto p-3">
        <h5 class="text-center mb-3">Add new setting:</h5>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger text-center">
                <?= implode("<br>", $errors); ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="text-center" enctype="multipart/form-data">
            <input value="<?= old_value('setting') ?>" type="text" name="setting"
                placeholder="Setting name" class="form-control mb-2">

            <select name="type" class="form-select mb-2">
                <option <?= old_select('type', 'text') ?> value="text">Text</option>
                <option <?= old_select('type', 'image') ?> value="image">Image</option>
                <option <?= old_select('type', 'number') ?> value="number">Number</option>
            </select>
            <br>


            <button class="btn btn-primary mt-2">Save</button>

            <a href="<?= ROOT ?>/admin/family">
                <button type="button" class="btn btn-secondary mt-2">Back</button>
            </a>
        </form>

        <script>
            function display_image(file, e) {
                let img = e.currentTarget.parentNode.querySelector("img");
                img.src = URL.createObjectURL(file);
            }
        </script>
    </div>

<?php elseif ($action == 'edit'): ?>
    <div class="col-md-6 mx-auto p-3">
        <h5>Edit family person info:</h5>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger text-center">
                <?= implode("<br>", $errors); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($row)): ?>
            <form method="POST" class="text-center" enctype="multipart/form-data">
                <input value="<?= old_value('setting', $row->setting) ?>" type="text" name="setting"
                    placeholder="Setting name" class="form-control mb-2">

                <?php if ($row->type == 'image'): ?>
                    <label>(click to change image)</label><br>

                    <label class="mb-4">
                        <input onchange="display_image(this.files[0], event)" type="file" name="value" class="d-none">
                        <img src="<?= get_image($row->value) ?>"
                            style="width: 300px; height: 300px; object-fit: cover;">
                    </label>
                <?php else: ?>
                    <input value="<?= old_value('value', $row->value) ?>" type="text" name="value"
                        placeholder="Setting value" class="form-control mb-2">
                <?php endif; ?>
                <br>

                <button class="btn btn-primary mt-2">Save</button>

                <a href="<?= ROOT ?>/admin/settings">
                    <button type="button" class="btn btn-secondary mt-2">Back</button>
                </a>
            </form>
        <?php else: ?>
            <div class="alert alert-danger text-center">
                Setting not found
            </div>
            <a href="<?= ROOT ?>/admin/settings">
                <button type="button" class="btn btn-secondary mt-2">Back</button>
            </a>
        <?php endif; ?>

        <script>
            function display_image(file, e) {
                let img = e.currentTarget.parentNode.querySelector("img");
                img.src = URL.createObjectURL(file);
            }
        </script>
    </div>
<?php elseif ($action == 'delete'): ?>
    <div class="col-md-6 mx-auto p-3">
        <h5>Delete setting from list:</h5>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger text-center">
                <?= implode("<br>", $errors); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($row)): ?>
            <form method="POST">
                <input value="<?= old_value('saetting', $row->setting) ?>" type="text" name="setting"
                    class="form-control" disabled>
                <br>

                <?php if ($row->type == 'image'): ?>
                    <label>(click to change image)</label><br>

                    <label class="mb-4">
                        <input onchange="display_image(this.files[0], event)" type="file" name="value" class="d-none">
                        <img src="<?= get_image($row->value) ?>"
                            style="width: 300px; height: 300px; object-fit: cover;">
                    </label>
                <?php else: ?>
                    <input value="<?= old_value('value', $row->value) ?>" type="text" name="value"
                        class="form-control mb-3" disabled>
                <?php endif; ?>
                <br>


                <button class="btn btn-danger mt-4">Delete</button>

                <a href="<?= ROOT ?>/admin/settings">
                    <button type="button" class="btn btn-secondary mt-4">Back</button>
                </a>
            </form>
        <?php else: ?>
            <div class="alert alert-danger text-center">
                Setting not found
            </div>
            <a href="<?= ROOT ?>/admin/settings">
                <button type="button" class="btn btn-secondary mt-2">Back</button>
            </a>
        <?php endif; ?>
    </div>
<?php else: ?>

    <h5>
        Settings |

        <a href="<?= ROOT ?>/admin/settings/new">
            <button class="btn btn-sm btn-primary">
                Add new
            </button>
        </a>
    </h5>

    <table class="table table-striped table-bordered">

        <?php if (!empty($data['rows'])): ?>
            <tr>
                <th>#</th>
                <th>Setting</th>
                <th>Type</th>
                <th>Value</th>
                <th>Actions</th>
            </tr>
        <?php endif; ?>

        <tbody>
            <?php if (!empty($data['rows'])): ?>
                <?php foreach ($data['rows'] as $row): ?>
                    <tr>
                        <td>#<?= $row->id ?></td>
                        <td><?= esc($row->setting) ?></td>
                        <td><?= esc($row->type) ?></td>

                        <?php if ($row->type == 'image'):  ?>
                            <td>
                                <img src="<?= get_image($row->value) ?>" alt=""
                                    style="width: 200px; height: 200px; object-fit:cover;">
                            </td>
                        <?php else: ?>
                            <td><?= esc($row->value) ?></td>
                        <?php endif; ?>

                        <td>
                            <a href="<?= ROOT ?>/admin/settings/edit/<?= $row->id ?>">
                                <button class="btn btn-sm btn-warning">Edit</button>
                            </a>

                            <a href="<?= ROOT ?>/admin/settings/delete/<?= $row->id ?>">
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>No setting were found</tr>
            <?php endif; ?>
        </tbody>

    </table>

<?php endif; ?>


<?php $this->view("admin/admin-footer"); ?>