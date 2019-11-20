<?php
$typeError = parse_url($_SERVER['REQUEST_URI']);
?>

<main class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Forgot Password</div>
                    <div class="card-body">
                        <form action="<?= base_url('guest/forgotPassword/forgotPasswordPost') ?>" method="post">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" id="email" class="form-control" name="email" placeholder="example@email.com" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cpf" class="col-md-4 col-form-label text-md-right">C.P.F.</label>
                                <div class="col-md-6">
                                    <input type="text" id="cpf" class="form-control" name="cpf" placeholder="000.000.000-00">
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Send E-mail
                                </button>
                            </div>
                        </form>
                        <?php if (isset($typeError['query'])) : ?>
                            <?php
                                $errorsType = explode('=', $typeError['query']);
                                $errors = explode('&', $errorsType[1]);
                                ?>
                                <?php foreach ($errors as $error) : ?>
                                    <div class="alert alert-danger" style="margin-top: 15px;">
                                        <span><strong><?= ucfirst($error) ?></strong> is not valid!</span>
                                    </div>
                                <?php endforeach; ?>
                        <?php endif; ?>
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