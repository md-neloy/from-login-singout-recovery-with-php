<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);

    $users = file("user.txt", FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($u, $e, $p) = explode("|", $user);
        if ($e == $email) {
            echo "Your password is: $p <br>";
            echo "<a href='login.php'>login</a>";
            exit;
        }
    }
    echo "Email not found.";
}
?>



<div style="max-width: 400px; margin: 30px auto; padding: 2rem; background: #fff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); font-family: 'Segoe UI', Roboto, sans-serif;">
    <h2 style="text-align: center; margin: 0 0 1.5rem 0; color: #2d3748; font-size: 1.5rem; font-weight: 600;">Password Recovery</h2>
    
    <form method="post">
        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; margin-bottom: 0.5rem; color: #4a5568; font-size: 0.9rem; font-weight: 500;">
                Enter your email:
            </label>
            <input name="email" type="email" style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 1rem; transition: border-color 0.2s;" placeholder="your@email.com">
        </div>
        
        <button type="submit" style="width: 100%; padding: 0.75rem; background: #3182ce; color: white; border: none; border-radius: 6px; font-size: 1rem; font-weight: 600; cursor: pointer; transition: background 0.2s;">
            Recover Password
        </button>
    </form>
</div>