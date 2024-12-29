<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>
    <center>
    <fieldset style="width: 0;">
        <Legend>Registration</Legend>
        <form action="../controller/registrationcheck.php" method="post">
            <table>
            <tr>
                <th>Profile Picture</th>
                <td><input type="file" name="propic"></td>
            </tr>
                <tr>
                    <th>First Name </th>
                    <td><input type="text" name="fname"></td>

                </tr>
                <tr>
                    <th>Last Name</th>


                    <td><input type="text" name="lname"></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <hr>
                </tr>
                <tr>
                    <th>DOB</th>
                    <td><input type="date" name="dob"></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><input type="radio" name="gender" value="Male"> Male
                    <input type="radio" name="gender" value="Female">Female
                </td>
                    
                </tr>
                <tr><th>Address</th>
            <td><textarea name="address" rows="6" cols="20" ></textarea></td></tr>
                <tr>
                    <th>Phone Number</th>
                    <td><input type="number" name="pno"></td>
                </tr>
                <tr><th>Password</th>
            <td><input type="password" name="pass" ></td></tr>
            <tr>
                <th>Confirm Password</th>
                <td><input type="password" name="cpass" ></td>
            </tr>
            
            <tr>
                
                <td colspan="2" ><hr></td>
            </tr>
            <tr>
                <td></td>
                <td align="right">
                <input type="button" name="signup" value="Sign up">
                <input type="button" name="signin" value="Sign In"></td>
            </tr>
            </table>
        </form>
    </fieldset>
    </center>
  
</body>

</html>