<?php $this->view("admin/admin-header"); ?>

<?php if ($action == 'edit'): ?>

    <div class="col-md-6 mx-auto p-3">
        <h5>Edit Contact data:</h5>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger text-center">
                <?= implode("<br>", $errors); ?>
            </div>
        <?php endif; ?>

        <small class="bg-primary text-white rounded p-1">
            Please, enter full links e.g https://www.yoursite.com
        </small>

        <?php if (!empty($row)): ?>
            <form method="POST" class="mt-4">
                <label>Twiiter link:</label>
                <input value="<?= old_value('twitter_link', $row->twitter_link) ?>" type="text"
                    name="twitter_link" placeholder="Twiiter link" class="form-control mb-2">

                <label>Facebook link:</label>
                <input value="<?= old_value('facebook_link', $row->facebook_link) ?>" type="text"
                    name="facebook_link" placeholder="Facebook link" class="form-control mb-2">

                <label>Instagram link:</label>
                <input value="<?= old_value('instagram_link', $row->instagram_link) ?>" type="text"
                    name="instagram_link" placeholder="Instagram link" class="form-control mb-2">

                <label>LinkedIn link:</label>
                <input value="<?= old_value('linkedin_link', $row->linkedin_link) ?>" type="text"
                    name="linkedin_link" placeholder="LinkedIn link" class="form-control mb-2">


                <input value="<?= old_value('email', $row->email) ?>" type="email" name="email"
                    placeholder="Email" class="form-control mt-2">
                <input value="<?= old_value('phone', $row->phone) ?>" type="text" name="phone"
                    placeholder="Phone" class="form-control mt-2">

                <button class="btn btn-primary mt-4">Save</button>

                <a href="<?= ROOT ?>/admin/contact">
                    <button type="button" class="btn btn-secondary mt-4">Back</button>
                </a>
            </form>
        <?php else: ?>
            <div class="alert alert-danger text-center">
                Record not found
            </div>
            <a href="<?= ROOT ?>/admin/contact">
                <button type="button" class="btn btn-secondary mt-2">Back</button>
            </a>
        <?php endif; ?>
    </div>

<?php else: ?>

    <h5>Contacts Info</h5>

    <table class="table table-striped table-bordered">
        <tbody>
            <?php if (!empty($data['rows'])): ?>
                <?php foreach ($data['rows'] as $row): ?>
                    <tr>
                        <th>Twitter</th>
                        <td><?= $row->twitter_link ?></td>
                    </tr>
                    <tr>
                        <th>Facebook</th>
                        <td><?= $row->facebook_link ?></td>
                    </tr>
                    <tr>
                        <th>Instagram</th>
                        <td><?= $row->instagram_link ?></td>
                    </tr>
                    <tr>
                        <th>LinkedIn</th>
                        <td><?= $row->linkedin_link ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= $row->email ?></td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td><?= $row->phone ?></td>
                    </tr>
                    <tr>
                        <th>Action</th>
                        <td>
                            <a href="<?= ROOT ?>/admin/contact/edit/<?= $row->id ?>">
                                <button class="btn btn-sm btn-warning">Edit</button>
                            </a>
                        </td>
                    </tr>

                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>

    </table>

<?php endif; ?>


<?php $this->view("admin/admin-footer"); ?>