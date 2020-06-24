<main class="content">
    <div class="container">
        <div class="row justify-content-center">


            <div>
                <h1 class="title-course"><?= $course['course'] ?>!</h1>
                <div class="row">
                    <div class="col-sm-9 photo-course">
                        <div> <img class="img-course" src="<?= base_url('public/images/courses/') . $course['url'] ?>" /></div>
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <p><?= $course['description'] ?></p>
                        </div>
                    </div>
                    <div class="buy-course col-sm-3">
                        <span>Hours: <?= $course['workload']; ?></span>
                        <br />
                        <span>Price: <?= number_format($course['price'], 2, ',', '.'); ?></span>
                        <br />
                        <button type="button" class="btn btn buy-button">Buy</button>
                    </div>
                </div>
                <div class="courseinfo">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#teacher" role="tab" aria-controls="profile" aria-selected="false">Teacher</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#review" role="tab" aria-controls="contact" aria-selected="false">Review</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade" id="teacher" role="tabpanel">...</div>
                        <div class="tab-pane fade" id="review" role="tabpanel">...</div>
                    </div>

                </div>

            </div>
        </div>
</main>