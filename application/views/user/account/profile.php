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

            <!-- Page Profile -->
            <div class="col-md-9">
                <div class="card box-card">
                    <div class="card-header head-card">Personal Information</div>
                    <div class="card-body">
                        <form action="<?= base_url('user/account/profilePost/execute') ?>" method="post">
                            <div class="form-group row" style="display: none">
                                <label for="id" class="col-md-4 col-form-label text-md-right text-form">User Id</label>
                                <div class="col-md-6">
                                    <input value="<?= $id ?>" type="number" id="id" class="form-control box-field" name="id" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right text-form">Full Name</label>
                                <div class="col-md-6">
                                    <input value="<?= $name ?>" type="text" id="name" class="form-control box-field" name="name" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right text-form">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input value="<?= $email ?>" type="email" id="email" class="form-control box-field" name="email" placeholder="example@email.com" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cpf" class="col-md-4 col-form-label text-md-right text-form">C.P.F.</label>
                                <div class="col-md-6">
                                    <input value="<?= $cpf ?>" type="text" id="cpf" class="form-control box-field" name="cpf" placeholder="000.000.000-00" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right text-form">Phone Number</label>
                                <div class="col-md-6">
                                    <input value="<?= $phone ?>" type="text" id="phone" class="form-control box-field" name="phone" placeholder="(00) 0000-0000" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="birthday" class="col-md-4 col-form-label text-md-right text-form">Birthday</label>
                                <div class="col-md-6">
                                    <input type="text" value="<?= $birthday ?>" id="birthday" class="form-control box-field" name="birthday" placeholder="00/00/0000" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right text-form">Gender</label>
                                <div class="col-md-6">
                                    <select value="<?= $gender ?>" type="custom-select" id="gender" class="form-control" name="gender" required style="padding-top: 0; padding-bottom:0">
                                        <option value="0"></option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn button-profile">
                                    Save
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
                            <?php if ($this->session->flashdata('success')) : ?>
                                <div class="alert alert-success" style="margin-top: 15px;">
                                    <?= $this->session->flashdata('success') ?>
                                </div>
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