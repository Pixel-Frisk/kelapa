<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/style1.css')); ?>"/>
    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="/postLogin" class="sign-in-form" method="post">
            <?php echo csrf_field(); ?>
            <h2 class="title">Login</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input name="email" type="text" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input name="password" type="password" placeholder="Password" />
            </div>
            <input type="submit" value="Login" class="btn solid" />
          </form>
        </div>
      </div>
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Selamat Datang</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
          </div>
          <img src="<?php echo e(asset('admin/assets/img/111.png')); ?>" class="image" alt="" />
        </div>
      </div>
    </div>
    <script src="<?php echo e(asset('admin/assets/js/app1.js')); ?>"></script>
  </body>
</html>
<?php /**PATH E:\Kuliah\Semester 5\kelapa\resources\views/login.blade.php ENDPATH**/ ?>