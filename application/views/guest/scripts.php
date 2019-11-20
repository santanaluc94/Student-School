<!-- Javascript -->
<script type="text/javascript" src="<?= base_url('public/plugins/jquery-3.3.1.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('public/plugins/popper.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('public/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>

<!-- Page Specific JS -->
<script type="text/javascript" src="<?= base_url('public/plugins/jquery-flipster/dist/jquery.flipster.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('public/js/flipster-custom.js'); ?>"></script>
<?php if (base_url($this->uri->uri_string()) == base_url('guest/login') || base_url($this->uri->uri_string()) == base_url('guest/forgotPassword')): ?>
    <script type="text/javascript" src="<?= base_url('public/js/login.js'); ?>"></script>
<?php endif; ?>
<?php if (base_url($this->uri->uri_string()) == base_url('guest/register') || base_url($this->uri->uri_string()) == base_url('guest/forgotPassword')) : ?>
    <script type="text/javascript" src="<?= base_url('public/jquery_mask/dist/jquery.mask.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('public/jquery_mask/dist/jquery.mask.min.js'); ?>"></script>
<?php endif; ?>

</body>

</html>