
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $this->config->item('nama_aplikasi') ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/')?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/')?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/')?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="<?= base_url('assets/swal/')?>sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="<?= base_url('assets/swal/')?>sweetalert2.min.css">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url('assets/adminlte/')?>"><b><?= $this->config->item('nama_aplikasi') ?></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form id="formLogin" action="<?= base_url()?>login/auth" method="post">
        <div class="input-group mb-3">
          <input name="user" type="text" class="form-control" placeholder="user">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="pw" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <!-- /.social-auth-links -->


    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url('assets/adminlte/')?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/adminlte/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminlte/')?>dist/js/adminlte.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() { 
        $("#formLogin").submit(function(e) {
            e.preventDefault();
            // var url = e.attr('action');
console.log(this)
var formData = new FormData(this); 
console.log(formData)
            $.ajax({
                url: this.action,
                method: 'POST', 
                data: formData, 
                processData: false, 
                contentType: false,          
                success: function(data) {   
                  var data = $.parseJSON(data);
                  console.log(data)       
                  Swal.fire({
                      icon: data.status?'success':'error',
                      title: data.status?'Success...':'Oops...',
                      text: data.message
                      // footer: '<a href="">Why do I have this issue?</a>'
                  })

                  if (data.status) {
                    window.location.replace(data.link);
                  }
                    
                }
            });
        });
    })
</script>
</body>
</html>
