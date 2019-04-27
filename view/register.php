<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form name="my-form" onsubmit="return validform()" action="success.php" method="">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Full Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="form-control" name="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email_address" id="email_address" class="form-control" name="email_address">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cpf" class="col-md-4 col-form-label text-md-right">C.P.F.</label>
                                <div class="col-md-6">
                                    <input type="number" id="cpf" class="form-control" name="cpf">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                                <div class="col-md-6">
                                    <input type="text" id="phone" class="form-control" name="phone">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthday" class="col-md-4 col-form-label text-md-right">Birthday</label>
                                <div class="col-md-6">
                                    <input type="date" id="birthday" class="form-control" name="birthday">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                                <div class="col-md-6">
                                    <select type="custom-select" id="gender" class="form-control" name="gender">
									    <option value="1">Male</option>
									    <option value="2">Female</option>
									    <option value="3">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="text" id="password" class="form-control" name="password">
                                </div>
                            </div>

							<div class="form-group row">
                                <label for="confirm-password" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                <div class="col-md-6">
                                    <input type="text" id="confirm-password" class="form-control" name="confirm-password">
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                    	</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php

//$name = $_POST["name"];
//$date = $_POST["date"];
//$email = $_POST["email"];
//$phone = $_POST["phone"];
