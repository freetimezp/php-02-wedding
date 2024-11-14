<?php $this->view("admin/admin-header"); ?>

<h5>Dashboard</h5>

<div class="row">
    <div class="m-4 p-2 shadow text-center col-md-3 border rounded">
        <i class="fs-1 fa fa-users text-primary mb-2"></i>
        <h2>Users</h2>
        <h3><?= $total_users->total ?></h3>
    </div>

    <div class="m-4 p-2 shadow text-center col-md-3 border rounded">
        <i class="fs-1 fa fa-images text-primary mb-2"></i>
        <h2>Gallery Images</h2>
        <h3><?= $total_images->total ?></h3>
    </div>

    <div class="m-4 p-2 shadow text-center col-md-3 border rounded">
        <i class="fs-1 fa fa-envelope text-primary mb-2"></i>
        <h2>RSVP count</h2>
        <h3><?= $total_rsvp->total ?></h3>
    </div>
</div>

<?php $this->view("admin/admin-footer"); ?>