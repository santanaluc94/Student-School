<main class="content">
    <div class="container">
        <!-- Flash messages of pages without permissions -->
        <?php if ($this->session->flashdata('danger')) : ?>
            <div class="alert alert-danger" style="margin-top: 15px;">
                <?= $this->session->flashdata('danger') ?>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">


            <!-- Page -->
            <div class="col-md-9">
                <h1>Welcome Admin <?= $_SESSION['adminData']->name ?>!</h1>
            </div>
        </div>
</main>