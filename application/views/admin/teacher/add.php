<main class="content">
    <div class="container">
        <div class="row justify-content-center">

            <!-- Page -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">Add New Teacher</div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/teacher/teacherPost/execute') ?>" method="post">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Full Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="form-control" name="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nickname" class="col-md-4 col-form-label text-md-right">Nickname</label>
                                <div class="col-md-6">
                                    <input type="text" id="nickname" class="form-control" name="nickname" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
                                <div class="col-md-6">
                                    <input type="email" id="email" class="form-control" name="email" placeholder="example@email.com" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cpf" class="col-md-4 col-form-label text-md-right">C.P.F.</label>
                                <div class="col-md-6">
                                    <input type="text" id="cpf" class="form-control" name="cpf" placeholder="000.000.000-00" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Teacher Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control password" name="password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="confirm-password" class="col-md-4 col-form-label text-md-right">Confirm Teacher Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="confirm-password" class="form-control password" name="cpassword" required>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label for="your-password" class="col-md-4 col-form-label text-md-right">Your Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="your-password" class="form-control password danger" name="your_password" required>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" href='?page=submit'>
                                    Register
                                </button>
                            </div>
                            <?php if ($this->session->flashdata('danger')) : ?>
                                <?php foreach ($this->session->flashdata('danger') as $number) : ?>
                                    <div class="alert alert-danger" style="margin-top: 15px;">
                                        <?= $number ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('warning')) : ?>
                                <?php foreach ($this->session->flashdata('warning') as $number) : ?>
                                    <div class="alert alert-warning" style="margin-top: 15px;">
                                        <?= $number ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
    window.onload = function() {
        $('#cpf').mask('000.000.000-00');
    };
</script>