<?php $this->view("admin/admin-header"); ?>


<?php if ($action == 'new'): ?>

    <div class="col-md-6 mx-auto p-3">
        <h5 class="text-center">Add About section item:</h5>

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

            <input value="<?= old_value('title') ?>" type="text" name="title"
                placeholder="Title" class="form-control mt-2">
            <input value="<?= old_value('name') ?>" type="text" name="name"
                placeholder="Full Name" class="form-control mt-2">
            <input value="<?= old_value('icon') ?>" type="text" name="icon"
                placeholder="Icon class" class="form-control mt-2">
            <textarea name="description" placeholder="Description" class="form-control mt-2"
                value="<?= old_value('description') ?>" rows="6"></textarea>
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
            <br>

            <label class="text-start d-block">List order (if 0, then about in top of list):</label>
            <input value="<?= old_value('list_order') ?>" type="number" name="list_order"
                class="form-control mb-2" min="0" placeholder="0">
            <br>

            <button class="btn btn-primary mt-2">Save</button>

            <a href="<?= ROOT ?>/admin/about">
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
        <h5>Edit about info:</h5>

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

                <input value="<?= old_value('title', $row->title) ?>" type="text" name="title"
                    placeholder="Title" class="form-control mt-2">
                <input value="<?= old_value('name', $row->name) ?>" type="text" name="name"
                    placeholder="Full Name" class="form-control mt-2">
                <input value="<?= old_value('icon', $row->icon) ?>" type="text" name="icon"
                    placeholder="Icon class" class="form-control mt-2">
                <textarea name="description" placeholder="Description" class="form-control mt-2"
                    rows="6"><?= old_value('description', $row->description) ?></textarea>
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
                <br>

                <button class="btn btn-primary mt-2">Save</button>

                <a href="<?= ROOT ?>/admin/about">
                    <button type="button" class="btn btn-secondary mt-2">Back</button>
                </a>
            </form>
        <?php else: ?>
            <div class="alert alert-danger text-center">
                Images not found
            </div>
            <a href="<?= ROOT ?>/admin/about">
                <button type="button" class="btn btn-secondary mt-2">Back</button>
            </a>
        <?php endif; ?>

        <script>
            function display_image(file, e) {
                let img = e.currentTarget.parentNode.querySelector("img");
                img.src = URL.createObjectURL(file);
            }

            document.querySelector(".about-date").valueAsDate = new Date('<?= old_value('date', $row->date) ?>');
        </script>
    </div>
<?php elseif ($action == 'delete'): ?>
    <div class="col-md-6 mx-auto p-3">
        <h5>Delete this about section from the list:</h5>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger text-center">
                <?= implode("<br>", $errors); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($row)): ?>
            <form method="POST">
                <input value="<?= old_value('title', $row->title) ?>" type="text" name="title"
                    placeholder="About title" class="form-control mt-2" disabled>
                <br>

                <label class="mb-4">
                    <input onchange="display_image(this.files[0], event)" type="file" name="image" class="d-none">
                    <img src="<?= get_image($row->image) ?>"
                        style="width: 300px; height: 300px; object-fit: cover;">
                </label>
                <br>

                <button class="btn btn-danger mt-4">Delete</button>

                <a href="<?= ROOT ?>/admin/about">
                    <button type="button" class="btn btn-secondary mt-4">Back</button>
                </a>
            </form>
        <?php else: ?>
            <div class="alert alert-danger text-center">
                About section not found
            </div>
            <a href="<?= ROOT ?>/admin/about">
                <button type="button" class="btn btn-secondary mt-2">Back</button>
            </a>
        <?php endif; ?>
    </div>
<?php else: ?>

    <h5>
        About Gallery |

        <a href="<?= ROOT ?>/admin/about/new">
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
                <th>Icon class</th>
                <th>About Title</th>
                <th class="col-sm-3">Description</th>
                <th>Rank List</th>
                <th>Actions</th>
            </tr>
        <?php endif; ?>

        <tbody>
            <?php if (!empty($data['rows'])): ?>
                <?php foreach ($data['rows'] as $row): ?>
                    <td class="border-b">
                        <tr>
                            <td>#<?= $row->id ?></td>
                            <td>
                                <img src="<?= get_image($row->image) ?>" alt=""
                                    style="width: 200px; height: 200px; object-fit:cover;">
                            </td>

                            <td><?= ucfirst(esc($row->name)) ?></td>
                            <td class="text-center">
                                <i class="fs-1 fa fa-<?= esc($row->icon) ?>"></i>
                            </td>
                            <td><?= ucfirst(esc($row->title)) ?></td>
                            <td><?= esc($row->description) ?></td>
                            <td><?= $row->list_order ?></td>

                            <td>
                                <a href="<?= ROOT ?>/admin/about/edit/<?= $row->id ?>">
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                </a>

                                <a href="<?= ROOT ?>/admin/about/delete/<?= $row->id ?>">
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>Twitter</th>
                            <td><?= $row->twitter_link == "" ? "none" : $row->twitter_link ?></td>
                            <th>Facebook</th>
                            <td><?= $row->facebook_link == "" ? "none" : $row->facebook_link ?></td>
                            <th>LinkedIn</th>
                            <td><?= $row->linkedin_link == "" ? "none" : $row->linkedin_link ?></td>
                            <th>Instagram</th>
                            <td><?= $row->instagram_link == "" ? "none" : $row->instagram_link ?> </td>
                        </tr>
                    </td>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>No about section were found</tr>
            <?php endif; ?>
        </tbody>

    </table>

<?php endif; ?>


<?php $this->view("admin/admin-footer"); ?>