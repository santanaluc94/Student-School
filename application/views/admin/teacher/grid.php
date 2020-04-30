<main class="content">
    <div class="container">
        <div class="row justify-content-center">

            <!-- Page -->
            <div class="col-md-12">
                <h1>All Teachers</h1>

                <table class="table table-hover table-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Nickname</th>
                            <th scope="col">Email</th>
                            <th scope="col">CPF</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($teachers as $teacher) : ?>
                            <tr>
                                <td scope="row"><?= $teacher['id'] ?></td>
                                <td scope="row"><?= $teacher['name'] ?></td>
                                <td scope="row"><?= $teacher['nickname'] ?></td>
                                <td scope="row"><?= $teacher['email'] ?></td>
                                <td scope="row"><?= $teacher['cpf'] ?></td>
                                <td scope="row">
                                    <a class="btn btn-primary text-white" href="<?= base_url('admin/teacher/edit/?id=') . $teacher['id']; ?>">
                                        Edit
                                    </a>
                                </td>
                                <td scope="row">
                                    <a class="btn btn-danger text-white" href="<?= base_url('admin/teacher/delete/?id=') . $teacher['id']; ?>">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
</main>