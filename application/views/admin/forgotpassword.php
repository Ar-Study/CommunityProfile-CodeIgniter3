
<body class="hold-transition login-page">
<div class="login-box">
<div>
    <p><?php echo $this->session->flashdata('msg');?></p>
</div>

<!-- /.forgotpassword -->
    <div class="login-box-body">
        <h2><p><center>Anda lupa kata sandi ?</center></p></h2>
        <p>Masukkan alamat email Anda dan kami akan mengirimkan instruksi tentang cara mengatur ulang kata sandi Anda.</p>
        <br>
            <form class="user" method="post" action="<?= base_url('Admin/a_forgot_password'); ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Masukkan Alamat Email" required>
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