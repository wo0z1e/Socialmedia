<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log IN</title>
</head>
<body>
    <center>
        <fieldset style="width: 0;">
            <legend>Log In</legend>
            <form action="../controller/logincheck.php" method="post">
                <table>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email" ></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="pass"></td>
                    </tr>
                    <tr>
                
                <td colspan="2" ><hr></td>
            </tr>
                    <tr>
                        <td></td>
                        <td align="right">
                            <input type="button" name="signin" value="Sign In">
                            <input type="button" name="signup" value="Sign Up">

                        </td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </center>
</body>
</html>