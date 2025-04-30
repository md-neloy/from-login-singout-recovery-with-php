<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if ($username && $email && $password) {
        $users = file("user.txt", FILE_IGNORE_NEW_LINES);
        foreach ($users as $user) {
            list($u, $e, $p) = explode("|", $user);
            if ($u == $username || $e == $email) {
                die("Username or Email already exists.");
            }
        }
        $newUser = "$username|$email|$password". PHP_EOL;
        file_put_contents("user.txt", $newUser, FILE_APPEND);
        echo "Registration successful. <br> <a href='login.php'>Login now</a>";
    } else {
        echo "All fields are required.";
    }
}
?>

<h2 style="text-align: center; margin: 50 0 20px 0; color: #333; font-family: Arial, sans-serif;">Register</h2>
<form method="post" style="max-width: 400px; margin: 50 auto; padding: 20px; background: #fff; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px; color: #555;">Username:</label>
        <input name="username" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
    </div>
    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px; color: #555;">Email:</label>
        <input name="email" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
    </div>
    <div style="margin-bottom: 20px;">
        <label style="display: block; margin-bottom: 5px; color: #555;">Password:</label>
        <input name="password" type="password" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
    </div>
    <button type="submit" style="width: 100%; padding: 10px; background: #4285f4; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">Register</button>
</form>
