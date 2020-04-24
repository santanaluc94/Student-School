<main class="content">
    <div class="container">
        <h1>Profile Page</h1>

        <div class="row justify-content-center">
            <div class="col-md-3">
                <!-- Menu to Profile Page  -->
                <?php $this->load->view('user/account/account_menu'); ?>

                <!-- Search -->
                <?php $this->load->view('user/search/search_input'); ?>
            </div>

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
                            <hr />
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