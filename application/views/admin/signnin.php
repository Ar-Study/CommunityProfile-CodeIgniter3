
<body class="hold-transition login-page">
<div class="login-box">

  <!-- /.login-logo -->
  <div class="login-box-body">
    <h3 class="login-box-msg"> <img src="<?php echo base_url().'vendor/frontend/kpm/logo/Untitled-001.png'?>" 
        width="150px" height="150px"></h3>
        <h2><p><center>Administrator</center></p></h2>
        <br>
        <?= $this->session->flashdata('message'); ?>
    <form class="user" method="post" action="<?=base_url('admin/signnin'); ?>">
      <div class="form-group has-feedback">
        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('name'); ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="row">
        <div class="col-xs-8">
      <div>
          </div>
        </div>

        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
    <!-- /.social-auth-links -->
    <hr/>
    <div class="text-center">
        <h5><a href="<?php echo base_url('admin/forgotpassword'); ?>" style="color:#ff0000;">Lupa Password?</a></h5>
    </div>
    <div class="text-center">
        <h5><a href="<?php echo base_url('admin/registration'); ?>" style="color:#ffa500;">Buat Akun Sekarang!</a></h5>
    </div>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

