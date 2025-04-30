<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $useremail = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $users = file("user.txt", FILE_IGNORE_NEW_LINES);
    print_r($users) ;
    foreach ($users as $user) {
        list($u, $e, $p) = explode("|", $user);
        if ($e == $useremail && $p == $password) {
            $_SESSION["username"] = $u;
            header("Location: welcome.php");
            exit;
        }
    }
    echo "Invalid username or password.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 to-indigo-600">
  <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">User Login</h2>

    <?php if (!empty($error)): ?>
      <div class="mb-4 text-red-600 text-center font-semibold">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <form method="POST" class="space-y-5">
      <div>
        <label class="block text-gray-700">Email</label>
        <input type="email" name="email" required
               class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div>
        <label class="block text-gray-700">Password</label>
        <input type="password" name="password" required
               class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div class="text-right">
        <a href="recover.php" class="text-sm text-blue-500 hover:underline">Forgot Password?</a>
      </div>

      <button type="submit"
              class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition duration-200">
        Login
      </button>

      <p class="text-center text-sm mt-4 text-gray-600">
        Don't have an account?
        <a href="register.php" class="text-blue-500 hover:underline">Register</a>
      </p>
    </form>
  </div>
</body>
</html>


