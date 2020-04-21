<main class="content">
    <div class="container">
        <div class="row justify-content-center">

            <!-- Search -->
            <div class="col-md-3">
                <?php $this->load->view('user/search/search_input'); ?>
            </div>
            <!-- Page -->
            <div class="col-md-9">
                <img src="<?= base_url('public/images/courses/') . $course['url'] ?>" style="height: 300px; width: 45 0px;" />
                <h1><?= $course['course'] ?>!</h1>
                <span>Price: <?= number_format($course['price'], 2, ',', '.'); ?></span>
                <button type="button" class="btn btn-primary">Buy</button>
                <span>Description</span>
                <p><?= $course['description'] ?>
            </div>
        </div>
</main>