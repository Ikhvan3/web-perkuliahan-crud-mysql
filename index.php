<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Slamet Ikhvan Nurhana Rifki - A12.2022.06882</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #1abc9c, #3498db);
        }

        .container {
            background: rgba(255, 255, 255, 0.2);
            width: 400px;
            padding: 40px 50px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(15px);
            text-align: center;
        }

        .container h1 {
            margin-bottom: 30px;
            font-size: 28px;
            color: #ffffff;
        }

        .input-box {
            position: relative;
            margin-bottom: 20px;
        }

        .input-box input {
            width: 100%;
            height: 50px;
            padding: 0 20px;
            border: none;
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.1);
            font-size: 16px;
            color: #ffffff;
            transition: background 0.3s ease;
        }

        .input-box input:focus {
            background: rgba(255, 255, 255, 0.2);
            outline: none;
        }

        .input-box i {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #ffffff;
        }

        .btn {
            width: 100%;
            height: 50px;
            background: #ffffff;
            border: none;
            border-radius: 25px;
            color: #1abc9c;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .btn:hover {
            background: #1abc9c;
            color: #ffffff;
        }

        .toggle-link {
            margin-top: 20px;
            font-size: 14px;
            color: #ffffff;
        }

        .toggle-link a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 600;
        }

        .toggle-link a:hover {
            text-decoration: underline;
        }

        .nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 100;
            background: rgba(0, 0, 0, 0.1);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        .nav-logo p {
            font-size: 24px;
            color: #ffffff;
            font-weight: 700;
        }

        .nav-button button {
            background: transparent;
            border: 2px solid #ffffff;
            outline: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            color: #ffffff;
            font-weight: 600;
            padding: 10px 20px;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .nav-button button:hover {
            background: #ffffff;
            color: #1abc9c;
        }
    </style>
</head>
<body>
    <nav class="nav">
        <div class="nav-logo">
            <p>IKHVAN RIFKI</p>
        </div>
        <div class="nav-button">
            <button id="loginBtn" onclick="showLogin()">Sign In</button>
            <button id="registerBtn" onclick="showRegister()">Sign Up</button>
        </div>
    </nav>

    <div class="container">
        <form action="login.php" method="post" id="loginForm">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="email" placeholder="Username or Email" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="toggle-link">
                <p>Don't have an account? <a href="#" onclick="showRegister()">Register</a></p>
            </div>
        </form>

        <form action="register.php" method="post" id="registerForm" style="display:none;">
            <h1>Register</h1>
            <div class="input-box">
                <input type="text" name="firstname" placeholder="First Name" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" name="lastname" placeholder="Last Name" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="input-box">
                <input type="text" name="status" placeholder="Status" required>
                <i class='bx bx-info-circle'></i>
            </div>
            <button type="submit" class="btn">Register</button>
            <div class="toggle-link">
                <p>Already have an account? <a href="#" onclick="showLogin()">Login</a></p>
            </div>
        </form>
    </div>

    <script>
        function showLogin() {
            document.getElementById('loginForm').style.display = 'block';
            document.getElementById('registerForm').style.display = 'none';
        }

        function showRegister() {
            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('registerForm').style.display = 'block';
        }
    </script>
</body>
</html>
