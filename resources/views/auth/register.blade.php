<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <link rel="stylesheet" href="{{asset('auth/style.css')}}" />
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
    rel="stylesheet"
  />
</head>
<body>
  <div class="container">
    <div class="form-wrapper">
      <h2 class="form-title">Create an Account</h2>
      <form action="{{ route('register.perform') }}" method="post" class="form">
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
            <label for="name">Full Name</label>
            <input
                type="text"
                id="name"
                name="name"
                placeholder="Your Name"
                value="{{ old('name') }}"
                required
            />
        </div>
    
        <div class="form-group">
            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="example@domain.com"
                value="{{ old('email') }}"
                required
            />
        </div>
    
        <div class="form-group">
            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Create Password"
                required
            />
        </div>
    
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Confirm Password"
                required
            />
        </div>
    
        <div class="form-group">
            <label>
                <input type="checkbox" name="remember"> Remember Me
            </label>
        </div>
    
        <div class="form-group">
            <button type="submit" class="btn-primary">Register</button>
        </div>
    </form>
    
      <p class="form-footer">
        Already have an account? <a href="{{route('login.show')}}">Login here</a>
      </p>
    </div>
  </div>
</body>
</html>
