<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body { font-family: Arial; background: #f9f9f9; }
        .register-box {
            width: 350px; margin: 80px auto; background: white; padding: 20px;
            border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 { text-align: center; }
        input[type=text], input[type=email], input[type=password] {
            width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type=submit] {
            background: #28a745; color: white; padding: 10px; border: none;
            border-radius: 5px; width: 100%; cursor: pointer;
        }
        input[type=submit]:hover { background: #218838; }
        .login-link { text-align: center; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="register-box">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <label>Username</label>
            <input type="text" name="username" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required>

            <input type="submit" value="Daftar">
        </form>
        <div class="login-link">
            <a href="/login">Sudah punya akun? Login</a>
        </div>
    </div>
</body>
</html>
