<main class="content">
    <div class="container">
        <h1>Profile Page</h1>
        <div class="row justify-content-center">
            <!-- Menu to Profile Page  -->
            <?php $this->load->view('user/account/account_menu'); ?>

            <!-- Delete Profile -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Delete Account</div>
                    <div class="card-body">
                        <form action="<?= base_url('user/account/deletePost/delete') ?>" method="post" onsubmit="return checkForm()">
                            <div class="form-group row" style="display: none">
                                <label for="id" class="col-md-4 col-form-label text-md-right">User Id</label>
                                <div class="col-md-6">
                                    <input value="<?= $id ?>" type="number" id="id" class="form-control" name="id" required />
                                </div>
                            </div>
                            <p>This proccess can not be reverted. Are you sure that you want do delete your account?</p>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="deleteAccount" name="deleteAccount">
                                <label class="form-check-label" for="deleteAccount">Yes, I want to delete my account.</label>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    DELETE MY ACCOUNT
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    function checkForm() {
        if (!document.getElementById('deleteAccount').checked) {
            alert('You need to confirm that you want to delete your account.');
            return false;
        }
    }
</script>