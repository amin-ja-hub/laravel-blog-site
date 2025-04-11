<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="{{asset('auth/style.css')}}" />
  <!-- Google Font for better typography -->
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
    rel="stylesheet"
  />
</head>
<body>
  <div class="container">
    <div class="form-wrapper">
      <h2 class="form-title">Login to Your Account</h2>
      <form action="{{route('login.perform')}}" method="post" class="form">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        @csrf
        <div class="form-group">
          <label for="email">Email</label>
          <input
            type="email"
            id="email"
            name="email"
            placeholder="example@domain.com"
            required
          />
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Your Password"
            required
          />
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" name="remember"> Remember Me
            </label>
        </div>        
        <div class="form-group">
          <button type="submit" class="btn-primary">Login</button>
        </div>
      </form>
      <p class="form-footer">
        Don't have an account? <a href="{{route('register.show')}}">Register here</a>
      </p>
    </div>
  </div>
</body>
</html>
