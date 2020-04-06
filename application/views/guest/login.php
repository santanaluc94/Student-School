<main class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form action="<?= base_url('guest/loginPost/execute') ?>" method="post" id="login_form">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" id="email" class="form-control" name="email" placeholder="example@email.com" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <div>
                                    <button type="submit" class="btn btn-primary" id="btn_login">
                                        Login
                                    </button>
                                </div>
                                <br />
                                <div>
                                    <span class="help-block"></span>
                                </div>
                                <a href="<?= base_url('guest/forgotpassword'); ?>" class="btn btn-link">
                                    Forgot Your Password?
                                </a>
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