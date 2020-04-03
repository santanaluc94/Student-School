<?php
$typeError = parse_url($_SERVER['REQUEST_URI']);
?>

<main class="content">
    <div class="container">
        <h1>Profile Page</h1>

        <div class="row justify-content-center">
            <!-- Menu to Profile Page  -->
            <?php $this->load->view('user/account/account_menu'); ?>

            <!-- Page Change Password -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                        <form action="<?= base_url('user/account/passwordPost/execute') ?>" method="post">
                            <div class="form-group row" style="display: none">
                                <label for="id" class="col-md-4 col-form-label text-md-right">User Id</label>
                                <div class="col-md-6">
                                    <input value="<?= $id ?>" type="number" id="id" class="form-control" name="id" required />
                                </div>
                            </div>
                            <p>To change your password, just fill the following fields</p>
                            <div class="form-group row">
                                <label for="currentPassword" class="col-md-4 col-form-label text-md-right">Current Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="currentPassword" class="form-control" name="currentPassword" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="newPassword" class="col-md-4 col-form-label text-md-right">New Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="name" class="form-control" name="newPassword" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="confirmNewPassword" class="col-md-4 col-form-label text-md-right">Confirm New Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="confirmNewPassword" class="form-control" name="confirmNewPassword" required />
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                            <?php if (isset($typeError['query'])) : ?>
                                <?php
                                $errorsType = explode('=', $typeError['query']);
                                $errors = explode('&', $errorsType[1]);
                                ?>
                                <?php if ($errorsType[1] == "newPasswordIsDifferentConfirmPassword") : ?>
                                    <div class="alert alert-danger" style="margin-top: 15px;">
                                        <span><strong>New Password</strong> and <strong>Confirm New Password</strong> must be equals!</span>
                                    </div>
                                <?php elseif ($errorsType[1] == "currentPasswordIsWrong") : ?>
                                    <div class="alert alert-danger" style="margin-top: 15px;">
                                        <span><strong>Current Password</strong> is wrong!</span>
                                    </div>
                                <?php elseif ($errorsType[1] == "currentPasswordIsEqualsToNewPassword") : ?>
                                    <div class="alert alert-danger" style="margin-top: 15px;">
                                        <span><strong>Current Password</strong> must be different from <strong>New Password</strong>!</span>
                                    </div>
                                <?php elseif ($errorsType[1] == "passwordChanged") : ?>
                                    <div class="alert alert-success" style="margin-top: 15px;">
                                        <span><strong>Current Password</strong> changed!</span>
                                    </div>
                                <?php endif; ?>
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
        $('#birthday').mask('00/00/0000');
        $('#phone').mask('(00) 0000-00009');

        let value = $('#gender').attr('value');
        $('#gender').prop('selectedIndex', value)
    };
</script>