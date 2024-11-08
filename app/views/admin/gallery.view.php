<?php $this->view("admin/admin-header"); ?>


<?php if ($action == 'new'): ?>

    <div class="col-md-6 mx-auto p-3">
        <h5 class="text-center">Add new image:</h5>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger text-center">
                <?= implode("<br>", $errors); ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="text-center" enctype="multipart/form-data">
            <label>(click to change image)</label>

            <label class="mb-4">
                <input onchange="display_image(this.files[0], event)" type="file" name="image" class="d-none">
                <img src="<?= get_image() ?>"
                    style="width: 300px; height: 300px; object-fit: cover;">
            </label>
            <br>

            <button class="btn btn-primary mt-2">Save</button>

            <a href="<?= ROOT ?>/admin/gallery">
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
        <h5>Edit image:</h5>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger text-center">
                <?= implode("<br>", $errors); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($row)): ?>
            <form method="POST">
                <input value="<?= old_value('username', $row->username) ?>" type="text" name="username"
                    placeholder="Username" class="form-control mt-2">

                <button class="btn btn-primary mt-2">Save</button>

                <a href="<?= ROOT ?>/admin/gallery">
                    <button type="button" class="btn btn-secondary mt-2">Back</button>
                </a>
            </form>
        <?php else: ?>
            <div class="alert alert-danger text-center">
                Images not found
            </div>
            <a href="<?= ROOT ?>/admin/gallery">
                <button type="button" class="btn btn-secondary mt-2">Back</button>
            </a>
        <?php endif; ?>
    </div>
<?php elseif ($action == 'delete'): ?>
    <div class="col-md-6 mx-auto p-3">
        <h5>Delete image:</h5>

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

                <button class="btn btn-danger mt-4">Delete</button>

                <a href="<?= ROOT ?>/admin/gallery">
                    <button type="button" class="btn btn-secondary mt-4">Back</button>
                </a>
            </form>
        <?php else: ?>
            <div class="alert alert-danger text-center">
                Image not found
            </div>
            <a href="<?= ROOT ?>/admin/gallery">
                <button type="button" class="btn btn-secondary mt-2">Back</button>
            </a>
        <?php endif; ?>
    </div>
<?php else: ?>

    <h5>
        Image Gallery |

        <a href="<?= ROOT ?>/admin/gallery/new">
            <button class="btn btn-sm btn-primary">
                Add new
            </button>
        </a>
    </h5>

    <table class="table table-striped table-bordered">

        <?php if (!empty($data['rows'])): ?>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        <?php endif; ?>

        <tbody>
            <?php if (!empty($data['rows'])): ?>
                <?php foreach ($data['rows'] as $row): ?>
                    <tr>
                        <td>#<?= $row->id ?></td>
                        <td>
                            <img src="<?= get_image($row->image) ?>" alt=""
                                style="width: 200px; height: 200px; object-fit:cover;">
                        </td>
                        <td>
                            <a href="<?= ROOT ?>/admin/gallery/edit/<?= $row->id ?>">
                                <button class="btn btn-sm btn-warning">Edit</button>
                            </a>

                            <a href="<?= ROOT ?>/admin/gallery/delete/<?= $row->id ?>">
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>No images were found</tr>
            <?php endif; ?>
        </tbody>

    </table>

<?php endif; ?>


<?php $this->view("admin/admin-footer"); ?>