<?php $this->view("admin/admin-header"); ?>


<?php if ($action == 'new'): ?>

    <div class="col-md-6 mx-auto p-3">
        <h5 class="text-center">Add new story:</h5>

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
                placeholder="Story title" class="form-control mt-2">
            <textarea name="description" placeholder="Story description" class="form-control mb-2"
                value="<?= old_value('description') ?>" rows="6"></textarea>
            <br>

            <label class="text-start d-block">Story date:</label>
            <input value="<?= old_value('date') ?>" type="date" name="date"
                placeholder="Story date" class="form-control mt-2">
            <br>

            <label class="text-start d-block">List order (if 0, then story in top of list):</label>
            <input value="<?= old_value('list_order') ?>" type="number" name="list_order"
                class="form-control mb-2" min="0" placeholder="0">
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
        <h5>Edit story info:</h5>

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
                placeholder="Story title" class="form-control mt-2">
                <textarea name="description" placeholder="Story description" class="form-control mb-2"
                    rows="6"><?= old_value('description', $row->description) ?></textarea>
                <br>

                <label class="text-start d-block">Story date:</label>
                <input value="<?= old_value('date', $row->date) ?>" type="date" name="date"
                    placeholder="Story date" class="form-control mt-2 story-date">
                <br>

                <label class="text-start d-block">
                    List order (if 0, then story in top of list):
                </label>
                <input value="<?= old_value('list_order', $row->list_order) ?>" type="number" 
                    name="list_order" class="form-control mb-2" min="0">
                <br>

                <button class="btn btn-primary mt-2">Save</button>

                <a href="<?= ROOT ?>/admin/story">
                    <button type="button" class="btn btn-secondary mt-2">Back</button>
                </a>
            </form>
        <?php else: ?>
            <div class="alert alert-danger text-center">
                Images not found
            </div>
            <a href="<?= ROOT ?>/admin/story">
                <button type="button" class="btn btn-secondary mt-2">Back</button>
            </a>
        <?php endif; ?>

        <script>
            function display_image(file, e) {
                let img = e.currentTarget.parentNode.querySelector("img");
                img.src = URL.createObjectURL(file);
            }

            document.querySelector(".story-date").valueAsDate = new Date('<?= old_value('date', $row->date) ?>');
        </script>
    </div>
<?php elseif ($action == 'delete'): ?>
    <div class="col-md-6 mx-auto p-3">
        <h5>Delete story from the list:</h5>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger text-center">
                <?= implode("<br>", $errors); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($row)): ?>
            <form method="POST">
                <input value="<?= old_value('title', $row->title) ?>" type="text" name="title" 
                    placeholder="Story title" class="form-control mt-2" disabled>
                <br>

                <label class="mb-4">
                    <input onchange="display_image(this.files[0], event)" type="file" name="image" class="d-none">
                    <img src="<?= get_image($row->image) ?>"
                        style="width: 300px; height: 300px; object-fit: cover;">
                </label>
                <br>

                <button class="btn btn-danger mt-4">Delete</button>

                <a href="<?= ROOT ?>/admin/story">
                    <button type="button" class="btn btn-secondary mt-4">Back</button>
                </a>
            </form>
        <?php else: ?>
            <div class="alert alert-danger text-center">
                Story not found
            </div>
            <a href="<?= ROOT ?>/admin/story">
                <button type="button" class="btn btn-secondary mt-2">Back</button>
            </a>
        <?php endif; ?>
    </div>
<?php else: ?>

    <h5>
        Story Gallery |

        <a href="<?= ROOT ?>/admin/story/new">
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
                <th>Story Title</th>
                <th class="col-sm-3">Description</th>
                <th>Date</th>
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

                        <td><?= ucfirst(esc($row->title)) ?></td>
                        <td><?= esc($row->description) ?></td>
                        <td><?= get_date(esc($row->date)) ?></td>
                        <td><?= $row->list_order ?></td>

                        <td>
                            <a href="<?= ROOT ?>/admin/story/edit/<?= $row->id ?>">
                                <button class="btn btn-sm btn-warning">Edit</button>
                            </a>

                            <a href="<?= ROOT ?>/admin/story/delete/<?= $row->id ?>">
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>No story were found</tr>
            <?php endif; ?>
        </tbody>

    </table>

<?php endif; ?>


<?php $this->view("admin/admin-footer"); ?>