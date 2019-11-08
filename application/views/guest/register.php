<?php
    $typeError = parse_url($_SERVER['REQUEST_URI']);
?>

<main class="content">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form action="<?= base_url('guest/register/registerPost') ?>" method="post">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Full Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="form-control" name="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
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
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                                <div class="col-md-6">
                                    <input type="text" id="phone" class="form-control" name="phone" placeholder="(00) 0000-0000" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="birthday" class="col-md-4 col-form-label text-md-right">Birthday</label>
                                <div class="col-md-6">
                                    <input type="text" id="birthday" class="form-control" name="birthday" placeholder="00/00/0000" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                                <div class="col-md-6">
                                    <select type="custom-select" id="gender" class="form-control" name="gender" required style="padding-top: 0; padding-bottom:0">
									    <option value="0"></option>
									    <option value="1">Male</option>
									    <option value="2">Female</option>
									    <option value="3">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control password" name="password" required>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="confirm-password" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="confirm-password" class="form-control password" name="cpassword" required>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" href='?page=submit'>
                                    Register
                                </button>
                            </div>
                            <?php if(isset($typeError['query'])): ?>
                                <?php
                                    $errorsType = explode('=', $typeError['query']);
                                    $errors = explode('&', $errorsType[1]);
                                ?>
                                <?php if ($errorsType[0] == "fieldExist"): ?>
                                    <?php foreach ($errors as $error): ?>
                                    <div class="alert alert-danger" style="margin-top: 15px;">
                                        <span><strong><?= ucfirst($error) ?></strong> is already registered!</span>
                                    </div>
                                    <?php endforeach; ?>

                                <?php elseif ($typeError['query'] == "UserExist"): ?>
                                    <div class="alert alert-danger" style="margin-top: 15px;">
                                        <span><strong>User</strong> already exist!</span>
                                    </div>

                                <?php else: ?>
                                    <?php foreach ($errors as $error): ?>
                                    <div class="alert alert-danger" style="margin-top: 15px;">
                                        <span><strong><?= ucfirst($error) ?></strong> is not valid!</span>
                                    </div>
                                    <?php endforeach; ?>
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
    };
</script>