<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | edutipa-app</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: linear-gradient(135deg, #007bff, #004aad);
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-box {
      background: #ffffff;
      padding: 40px 35px;
      width: 360px;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    .login-box h2 {
      color: #007bff;
      margin-bottom: 25px;
      font-size: 26px;
      letter-spacing: 1px;
    }

    label {
      font-weight: 600;
      display: block;
      margin-top: 10px;
      text-align: left;
      color: #333;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 8px 0 15px 0;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 14px;
      transition: 0.3s;
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
      border-color: #007bff;
      outline: none;
    }

    input[type="submit"] {
      width: 100%;
      padding: 12px;
      background: #007bff;
      border: none;
      color: white;
      font-weight: 600;
      font-size: 15px;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s;
    }

    input[type="submit"]:hover {
      background: #0056b3;
    }

    .register-link {
      margin-top: 15px;
      font-size: 14px;
      color: #555;
    }

    .register-link a {
      color: #007bff;
      text-decoration: none;
      font-weight: 600;
    }

    .register-link a:hover {
      text-decoration: underline;
    }

    .alert-success {
      background: #d4edda;
      color: #155724;
      padding: 10px;
      border-radius: 6px;
      margin-bottom: 15px;
      border: 1px solid #c3e6cb;
      font-size: 14px;
    }

    .alert-error {
      background: #f8d7da;
      color: #721c24;
      padding: 10px;
      border-radius: 6px;
      margin-bottom: 15px;
      border: 1px solid #f5c6cb;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Login Akun</h2>

    {{-- Pesan sukses (setelah register) --}}
    @if(session('success'))
      <div class="alert-success">{{ session('success') }}</div>
    @endif

    {{-- Pesan error (jika login gagal) --}}
    @if(session('error'))
      <div class="alert-error">{{ session('error') }}</div>
    @endif

    <form action="/login" method="POST">
      @csrf
      <label for="email">Email</label>
      <input type="email" name="email" placeholder="Masukkan email..." required>

      <label for="password">Password</label>
      <input type="password" name="password" placeholder="Masukkan password..." required>

      <input type="submit" value="Masuk">
    </form>

    <div class="register-link">
      Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
    </div>
  </div>
</body>
</html>
