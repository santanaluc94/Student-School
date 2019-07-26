<main class="content">
	<div class="cotainer">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Login</div>
					<div class="card-body">
						<form action="<?= base_url('guest/login/login') ?>" method="post">
							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
								<div class="col-md-6">
									<input type="text" id="email" class="form-control" name="email"
										placeholder="exampl@email.com" required autofocus>
								</div>
								<p class="help-block"></p>
							</div>
							<div class="form-group row">
								<label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
								<div class="col-md-6">
									<input type="password" id="password" class="form-control" name="password" required>
								</div>
								<p class="help-block"></p>
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
								<button type="submit" class="btn btn-primary" id="btn_login">
									Login
								</button>
								<a href="<?= base_url('guest/forgotpassword/forgotpassword'); ?>" class="btn btn-link">
									Forgot Your Password?
								</a>
								<p class="help-block"></p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>