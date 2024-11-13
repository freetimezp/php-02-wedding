<?php $this->view("admin/admin-header"); ?>

<?php if ($action == 'delete'): ?>
    <div class="col-md-6 mx-auto p-3">
        <h5>Delete this message from the list:</h5>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger text-center">
                <?= implode("<br>", $errors); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($row)): ?>
            <form method="POST">
                <input value="<?= old_value('email', $row->email) ?>" type="email" name="email"
                    placeholder="Message" class="form-control mt-2" disabled>
                <br>


                <button class="btn btn-danger mt-4">Delete</button>

                <a href="<?= ROOT ?>/admin/rsvp">
                    <button type="button" class="btn btn-secondary mt-4">Back</button>
                </a>
            </form>
        <?php else: ?>
            <div class="alert alert-danger text-center">
                RSVP message not found
            </div>
            <a href="<?= ROOT ?>/admin/rsvp">
                <button type="button" class="btn btn-secondary mt-2">Back</button>
            </a>
        <?php endif; ?>
    </div>
<?php else: ?>

    <h5>RSVP messages</h5>

    <table class="table table-striped table-bordered">

        <?php if (!empty($data['rows'])): ?>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Attending</th>
                <th>Guests</th>
                <th class="col-sm-3">Message</th>
                <th>Actions</th>
            </tr>
        <?php endif; ?>

        <tbody>
            <?php if (!empty($data['rows'])): ?>
                <?php foreach ($data['rows'] as $row): ?>
                    <td class="border-b">
                        <tr>
                            <td>#<?= $row->id ?></td>
                            <td><?= ucfirst(esc($row->name)) ?></td>
                            <td><?= esc($row->email) ?></td>
                            <td><?= esc($row->attending) ?></td>
                            <td><?= esc($row->guests) ?></td>
                            <td><?= esc($row->message) ?></td>
                            <td>
                                <a href="<?= ROOT ?>/admin/rsvp/delete/<?= $row->id ?>">
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </a>
                            </td>
                        </tr>
                    </td>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>No rsvp messages were found</tr>
            <?php endif; ?>
        </tbody>

    </table>

<?php endif; ?>


<?php $this->view("admin/admin-footer"); ?>