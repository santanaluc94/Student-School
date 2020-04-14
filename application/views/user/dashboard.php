<main class="content">
    <div class="container">
        <div class="row justify-content-center">

        <!-- Search -->
        <div class="col-md-3">
            <?php $this->load->view('user/search/search_input'); ?>
        </div>

        <!-- Page -->
        <div class="col-md-9">
            <h1>Welcome <?= $_SESSION['userData']->name ?>!</h1>
        </div>
    </div>
</main>