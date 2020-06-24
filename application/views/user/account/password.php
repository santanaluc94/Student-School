<main class="content">
    <div class="container">
        <div class="box-title-page">
            <h1 class="title-page">Profile Page</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-3">
                <!-- Menu to Profile Page  -->
                <?php $this->load->view('user/account/account_menu'); ?>

                <!-- Search -->
                <?php $this->load->view('user/search/search_input'); ?>
            </div>

            <!-- Page Change Password -->
            <div class="col-md-9">
                <div class="card box-card">
                    <div class="card-header head-card">Change Password</div>
                    <div class="card-body">
                        <form action="<?= base_url('user/account/passwordPost/execute') ?>" method="post">
                            <div class="form-group row" style="display: none">
                                <label for="id" class="col-md-4 col-form-label text-md-right">User Id</label>
                                <div class="col-md-6">
                                    <input value="<?= $id ?>" type="number" id="id" class="form-control box-field" name="id" required />
                                </div>
                            </div>
                            <p class="text-form">To change your password, just fill the following fields</p>
                            <div class="form-group row">
                                <label for="currentPassword" class="col-md-4 col-form-label text-md-right text-form">Current Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="currentPassword" class="form-control box-field" name="currentPassword" required />
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label for="newPassword" class="col-md-4 col-form-label text-md-right text-form">New Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="name" class="form-control box-field" name="newPassword" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="confirmNewPassword" class="col-md-4 col-form-label text-md-right text-form">Confirm New Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="confirmNewPassword" class="form-control box-field" name="confirmNewPassword" required />
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn button-change-password">
                                    Save
                                </button>
                            </div>
                            <?php if ($this->session->flashdata('danger')) : ?>
                                <div class="alert alert-danger" style="margin-top: 15px;">
                                    <?= $this->session->flashdata('danger') ?>
                                </div>
                            <?php elseif ($this->session->flashdata('success')) : ?>
                                <div class="alert alert-success" style="margin-top: 15px;">
                                    <?= $this->session->flashdata('success') ?>
                                </div>
                            <?php endif ?>
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