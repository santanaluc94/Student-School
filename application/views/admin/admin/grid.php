<main class="content">
    <div class="container">
        <div class="row justify-content-center">

            <!-- Page -->
            <div class="col-md-12">
                <h1>All Admins</h1>
                <a class="btn btn-success text-white" href="<?= base_url('admin/admin/add') ?>">New Admin</a>
                <table class="table table-hover table-sm">
                    <thead class="bg-danger text-white">
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
                        <?php foreach ($admins as $admin) : ?>
                            <tr>
                                <td scope="row"><?= $admin['id'] ?></td>
                                <td scope="row"><?= $admin['name'] ?></td>
                                <td scope="row"><?= $admin['nickname'] ?></td>
                                <td scope="row"><?= $admin['email'] ?></td>
                                <td scope="row" class="cpf"><?= $admin['cpf'] ?></td>
                                <td scope="row">
                                    <a class="btn btn-primary text-white" href="<?= base_url('admin/admin/edit/?id=') . $admin['id']; ?>">
                                        Edit
                                    </a>
                                </td>
                                <td scope="row">
                                    <form id="form_to_delete" action="<?= base_url('admin/admin/adminPost/delete') ?>" method="post">
                                        <button type="submit" class="btn btn-danger text-white" name="id" value="<?= $admin['id']; ?>" onclick="return beforeSubmit()">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <?php if ($this->session->flashdata('danger')) : ?>
                    <div class="alert alert-danger" style="margin-top: 15px;">
                        <?= $this->session->flashdata('danger') ?>
                    </div>
                <?php elseif ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" style="margin-top: 15px;">
                        <?= $this->session->flashdata('success') ?>
                    </div>
                <?php elseif ($this->session->flashdata('warning')) : ?>
                    <div class="alert alert-warning" style="margin-top: 15px;">
                        <?= $this->session->flashdata('warning') ?>
                    </div>
                <?php endif ?>

            </div>
        </div>
</main>
<script type="text/javascript">
    window.onload = function() {
        $('.cpf').mask('000.000.000-00');
    };

    function beforeSubmit() {
        if (!confirm("Are you sure that you want to delete this Teacher?")) {
            return false;
        }

        return true;
    }
</script>