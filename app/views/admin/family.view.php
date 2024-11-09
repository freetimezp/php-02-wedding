<?php $this->view("admin/admin-header"); ?>


<?php if ($action == 'new'): ?>

    <div class="col-md-6 mx-auto p-3">
        <h5 class="text-center">Add new family person:</h5>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger text-center">
                <?= implode("<br>", $errors); ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="text-center" enctype="multipart/form-data">
            <label>(click to change image)</label>
            <br>

            <label class="mb-4">
                <input onchange="display_image(this.files[0], event)" type="file" name="image" class="d-none">
                <img src="<?= get_image() ?>"
                    style="width: 300px; height: 300px; object-fit: cover;">
            </label>
            <br>

            <input value="<?= old_value('name') ?>" type="text" name="name"
                placeholder="Full name" class="form-control mt-2">
            <input value="<?= old_value('title') ?>" type="text" name="title"
                placeholder="Title" class="form-control mb-2">
            <br>

            <label class="text-start d-block">List order (if 0, then person in top of family list):</label>
            <input value="<?= old_value('list_order') ?>" type="number" name="list_order"
                class="form-control mb-2" min="0" placeholder="0">
            <br>

            <small class="bg-primary text-white rounded p-1 mb-3 d-block">
                Please, enter full links e.g https://www.yoursite.com
            </small>
            <br>

            <div class="text-start">
                <label>Twiiter link:</label>
                <input type="text" name="twitter_link" placeholder="Twiiter link" class="form-control mb-2"
                    value="<?= old_value("twitter_link") ?>">

                <label>Facebook link:</label>
                <input type="text" name="facebook_link" placeholder="Facebook link" class="form-control mb-2"
                    value="<?= old_value("facebook_link") ?>">

                <label>Instagram link:</label>
                <input type="text" name="instagram_link" placeholder="Instagram link" class="form-control mb-2"
                    value="<?= old_value("instagram_link") ?>">

                <label>LinkedIn link:</label>
                <input type="text" name="linkedin_link" placeholder="LinkedIn link" class="form-control mb-4"
                    value="<?= old_value("linkedin_link") ?>">
            </div>

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
                <label>(click to change image)</label><br>

                <label class="mb-4">
                    <input onchange="display_image(this.files[0], event)" type="file" name="image" class="d-none">
                    <img src="<?= get_image($row->image) ?>"
                        style="width: 300px; height: 300px; object-fit: cover;">
                </label>
                <br>

                <input value="<?= old_value('name', $row->name) ?>" type="text" name="name"
                    placeholder="Full name" class="form-control mt-2">
                <input value="<?= old_value('title', $row->title) ?>" type="text" name="title"
                    placeholder="Title" class="form-control mb-2">
                <br>

                <label class="text-start d-block">List order (if 0, then person in top of family list):</label>
                <input value="<?= old_value('list_order', $row->list_order) ?>" type="number" name="list_order"
                    class="form-control mb-2" min="0">
                <br>

                <small class="bg-primary text-white rounded p-1 mb-3 d-block">
                    Please, enter full links e.g https://www.yoursite.com
                </small>
                <br>

                <div class="text-start">
                    <label>Twiiter link:</label>
                    <input type="text" name="twitter_link" placeholder="Twiiter link" class="form-control mb-2"
                        value="<?= old_value("twitter_link", $row->twitter_link) ?>">

                    <label>Facebook link:</label>
                    <input type="text" name="facebook_link" placeholder="Facebook link" class="form-control mb-2"
                        value="<?= old_value("facebook_link", $row->facebook_link) ?>">

                    <label>Instagram link:</label>
                    <input type="text" name="instagram_link" placeholder="Instagram link" class="form-control mb-2"
                        value="<?= old_value("instagram_link", $row->instagram_link) ?>">

                    <label>LinkedIn link:</label>
                    <input type="text" name="linkedin_link" placeholder="LinkedIn link" class="form-control mb-4"
                        value="<?= old_value("linkedin_link", $row->linkedin_link) ?>">
                </div>

                <button class="btn btn-primary mt-2">Save</button>

                <a href="<?= ROOT ?>/admin/family">
                    <button type="button" class="btn btn-secondary mt-2">Back</button>
                </a>
            </form>
        <?php else: ?>
            <div class="alert alert-danger text-center">
                Images not found
            </div>
            <a href="<?= ROOT ?>/admin/family">
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
        <h5>Delete person from family list:</h5>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger text-center">
                <?= implode("<br>", $errors); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($row)): ?>
            <form method="POST">
                <label class="mb-4">
                    <input onchange="display_image(this.files[0], event)" type="file" name="image" class="d-none">
                    <img src="<?= get_image($row->image) ?>"
                        style="width: 300px; height: 300px; object-fit: cover;">
                </label>
                <br>

                <button class="btn btn-danger mt-4">Delete</button>

                <a href="<?= ROOT ?>/admin/family">
                    <button type="button" class="btn btn-secondary mt-4">Back</button>
                </a>
            </form>
        <?php else: ?>
            <div class="alert alert-danger text-center">
                Image not found
            </div>
            <a href="<?= ROOT ?>/admin/family">
                <button type="button" class="btn btn-secondary mt-2">Back</button>
            </a>
        <?php endif; ?>
    </div>
<?php else: ?>

    <h5>
        Family Gallery |

        <a href="<?= ROOT ?>/admin/family/new">
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
                <th>Name</th>
                <th>Title</th>
                <th>Rank List</th>
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

                        <td><?= ucfirst(esc($row->name)) ?></td>
                        <td><?= esc($row->title) ?></td>
                        <td><?= $row->list_order ?></td>

                        <td>
                            <a href="<?= ROOT ?>/admin/family/edit/<?= $row->id ?>">
                                <button class="btn btn-sm btn-warning">Edit</button>
                            </a>

                            <a href="<?= ROOT ?>/admin/family/delete/<?= $row->id ?>">
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>No family person were found</tr>
            <?php endif; ?>
        </tbody>

    </table>

<?php endif; ?>


<?php $this->view("admin/admin-footer"); ?>