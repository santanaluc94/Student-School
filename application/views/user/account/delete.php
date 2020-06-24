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

            <!-- Delete Profile -->
            <div class="col-md-9">
                <div class="card box-card">
                    <div class="card-header head-card">Delete Account</div>
                    <div class="card-body">
                        <form action="<?= base_url('user/account/deletePost/delete') ?>" method="post" onsubmit="return checkForm()">
                            <div class="form-group row " style="display: none">
                                <label for="id" class="col-md-4 col-form-label text-md-right">User Id</label>
                                <div class="col-md-6">
                                    <input value="<?= $id ?>" type="number" id="id" class="form-control" name="id" required />
                                </div>
                            </div>
                            <p class="text-form">This proccess can not be reverted. Are you sure that you want do delete your account?</p>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input box-field" id="deleteAccount" name="deleteAccount">
                                <label class="form-check-label text-form" for="deleteAccount">Yes, I want to delete my account.</label>
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