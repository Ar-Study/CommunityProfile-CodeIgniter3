
<body class="hold-transition login-page">
<div class="login-box">
<div>
    <p><?php echo $this->session->flashdata('msg');?></p>
</div>

<!-- /.forgotpassword -->
    <div class="login-box-body">
        <h2>Reset Password</h2>
        <h5>Hello <span><?php echo $nama; ?></span>, Silakan isi password baru anda.</h5>
        <?php echo form_open('admin/reset_password/token/' . $token); ?>
        <br>
            <form class="user" method="post" action="<?= base_url('admin/reset_password'); ?>">
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Masukkan Password Baru" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="passconf" name="passconf" value="<?php echo set_value('passconf'); ?>" placeholder="Masukkan Konfirmasi Password" required>
                </div>
                    <button type="submit" class="btn btn-danger btn-user btn-block">Reset Password</button>
                <hr>
                    <div class="text-center">
                        <h5><a href="<?php echo base_url('admin/signnin'); ?>" style="color:#ffa500;">Kembali Sign In!</a></h5>
                    </div>
                </div>
            </form>
        </body>
    </html>