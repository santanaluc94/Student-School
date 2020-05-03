<main class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="container d-flex">
                <div class="col-md-3">
                    <?php $this->load->view('user/search/search_input'); ?>
                </div>

                <!-- Page Search -->
                <div class="col-md-9">
                    <div class="text_search">
                        <h3>Search for '<?= $search ?>' find <?= $countAllResult ?> results.</h3>
                        <?php if (empty($countAllResult)) : ?>
                            <h3>We could not find any course with the word '<?= $search ?>'</h3>
                        <?php else : ?>
                            <div class="card-deck">
                                <?php foreach ($result as $course) : ?>
                                    <div class="card-deck">
                                        <div class="card-md-4 _card" style="width: 18rem;">
                                            <img class="card-img-top" src="<?= base_url('public/images/courses/') . $course['url'] ?>" style="height: 200px; width: 200px;" />
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $course['course'] ?></h5>
                                                <p class="card-text"><?= substr($course['description'], 0, 200) ?>...</p>
                                                <a href="<?= base_url('/user/course/page/?id=') . $course['id'] ?>" class="btn btn-primary">Page Course</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <?php if ($countResult !== 1) : ?>
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <?php if ($previousPage > 0) : ?>
                            <li class="page-item">
                                <a class="page-link" href="<?= base_url('user/search/searchPost/?numberPage=') . $previousPage ?>">Previous</a>
                            </li>
                        <?php endif; ?>

                        <?php for ($_i = 0; $_i < $countResult; $_i++) : ?>
                            <?php $i = $_i + 1 ?>
                            <li class="page-item"><a class="page-link" href="<?= base_url('user/search/searchPost/?numberPage=') . $i ?>"><?= $i ?></a></li>
                        <?php endfor; ?>

                        <?php if ($nextPage <= (int) $countResult) : ?>
                            <li class="page-item">
                                <a class="page-link" href="<?= base_url('user/search/searchPost/?numberPage=') . $nextPage ?>">Next</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            <?php endif; ?>
        </div>
    </div>
</main>