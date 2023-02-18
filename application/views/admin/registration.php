
<body class="hold-transition login-page">
<div class="login-box">
  <div>
  <p><?php echo $this->session->flashdata('msg');?></p>
  </div>
  <!-- /.registration -->
  <div class="login-box-body">
        <h2><p><center>Buat Akun</center></p></h2>
        <br>
    <form class="user" method="post" action="<?= base_url('admin/registration'); ?>">
      <div class="form-group has-feedback">
      <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
      <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group has-feedback">
      <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control control-user" id="password1" name="password1" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group has-feedback">
      <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
        <span class="glyphicon glyphicon-repeat form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
      <div>
          </div>
        </div>
        <!-- /.links -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registrasi</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
    <!-- /.links -->
    <hr/>
    <div class="text-center">
        <h5><a href="<?php echo base_url('admin/signnin'); ?>" style="color:#ffa500;">Sudah Punya Akun? Sign In!</a></h5>
    </div>
  </div>

</body>
</html>
