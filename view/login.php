<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- Assuming you have an external CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('../assets/images/eminem.jpg') no-repeat center center fixed; /* Background image */
            background-size: cover; /* Ensures the image covers the entire background */
            margin: 0;
            padding: 0;
            color: #e0e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: rgba(30, 30, 30, 0.8); /* Semi-transparent background for form container */
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(14, 239, 255, 0.6); /* Neon cyan glow */
            width: 350px;
            text-align: center;
        }

        .login-title {
            font-size: 1.8em;
            margin-bottom: 20px;
            color: #0ef; /* Neon cyan text */
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 1em;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #0ef; /* Neon cyan border */
            border-radius: 5px;
            background-color: #1e1e1e;
            color: #e0e0e0;
            font-size: 1em;
            box-sizing: border-box;
        }

        .form-group input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #0ef; /* Neon cyan button */
            border: none;
            border-radius: 5px;
            color: #121212; /* Dark text for contrast */
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group input[type="submit"]:hover {
            background-color: #0bccd8; /* Slightly darker cyan on hover */
        }

        .login-links {
            margin-top: 20px;
        }

        .login-links a {
            color: #0ef; /* Neon cyan link */
            text-decoration: none;
            font-size: 0.9em;
        }

        .login-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-title">Login</div>
        <form action="logincheck.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Login">
            </div>
        </form>
        <div class="login-links">
            <a href="registration.php">Sign up</a> | <a href="#">Forgot password?</a>
        </div>
    </div>
</body>
</html>
