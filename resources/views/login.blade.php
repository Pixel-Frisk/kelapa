<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{asset('admin/assets/css/style1.css')}}"/>
    <title>Login</title>
    <link rel="shortcut icon" href="{{asset('images/icon.png')}}" type="image/x-icon">
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="/postLogin" class="sign-in-form" method="post">
            {{csrf_field()}}
            <h2 class="title">Login</h2>
            @if (session('status'))
              <div>
                <font color="red">{{ session('status') }}</font>
              </div>
            @endif
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input name="email" type="text" placeholder="Email" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input name="password" type="password" placeholder="Password" required/>
            </div>
            <input type="submit" value="Login" class="btn solid" />
          </form>
        </div>
      </div>
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Welcome to SIIPAKA</h3>
            <p>
              Sistem Informasi Industri
              Penyaluran kelapa
            </p>
          </div>
          <img src="{{asset('admin/assets/img/111.png')}}" class="image" alt="" />
        </div>
      </div>
    </div>
    <script src="{{asset('admin/assets/js/app1.js')}}"></script>
  </body>
</html>
