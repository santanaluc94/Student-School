<main class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="box-card card">
                    <div class="card-header head-card-admin">Admin Login</div>
                    <div class="card-body">
                        <form action="<?= base_url('guest/adminLoginPost/execute') ?>" method="post" id="admin_login_form">
                            <div class="form-group row">
                                <label for="nickname" class="col-md-4 col-form-label text-md-right text-form">Nickname</label>
                                <div class="col-md-6">
                                    <input type="text" id="nickname" class="box-field form-control" name="nickname" placeholder="Nickname" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right text-form">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="box-field form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"><span class="text-form">Remember me</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <div>
                                    <button type="submit" class="btn btn button-login" id="btn_login">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                        <?php if ($this->session->flashdata('danger')) : ?>
                            <div class="alert alert-danger" style="margin-top: 15px;">
                                <?= $this->session->flashdata('danger'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>