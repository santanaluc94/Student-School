<main class="content">
    <div class="container">
        <h1>Profile Page<h1>
    </div>
    <?= var_dump(($this->get_vars())) ?>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Register</div>
            <div class="card-body">
                <form action="<?= base_url('user/profile/profilePost') ?>" method="post">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Full Name</label>
                        <div class="col-md-6">
                            <input value="<?= $userData->name ?>" type="text" id="name" class="form-control" name="name" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                        <div class="col-md-6">
                            <input value="<?= $userData->email ?>" type="email" id="email" class="form-control" name="email" placeholder="example@email.com" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cpf" class="col-md-4 col-form-label text-md-right">C.P.F.</label>
                        <div class="col-md-6">
                            <input value="<?= $userData->cpf ?>" type="text" id="cpf" class="form-control" name="cpf" placeholder="000.000.000-00" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                        <div class="col-md-6">
                            <input value="<?= $userData->phone ?>" type="text" id="phone" class="form-control" name="phone" placeholder="(00) 0000-0000" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="birthday" class="col-md-4 col-form-label text-md-right">Birthday</label>
                        <div class="col-md-6">
                            <input type="text" value="<?= $userData->birthday ?>" id="birthday" class="form-control" name="birthday" placeholder="00/00/0000" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                        <div class="col-md-6">
                            <select value="<?= $userData->gender ?>" type="custom-select" id="gender" class="form-control" name="gender" required style="padding-top: 0; padding-bottom:0">
                                <option value="0"></option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Other</option>
                            </select>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</main>