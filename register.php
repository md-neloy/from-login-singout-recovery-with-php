<?php
$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if ($username && $email && $password) {
        $users = file("user.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($users as $user) {
            list($u, $e, $p) = explode("|", $user);
            if ($u == $username || $e == $email) {
                $error = "Username or Email already exists.";
                break;
            }
        }

        if (!$error) {
            $newUser = "$username|$email|$password" . PHP_EOL;
            file_put_contents("user.txt", $newUser, FILE_APPEND);
            $success = "Registration successful.";
        }
    } else {
        $error = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-r from-blue-400 to-indigo-600 flex items-center justify-center">
  <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Register</h2>

    <!-- Success Message -->
    <?php if ($success): ?>
      <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded-md">
        <?= htmlspecialchars($success) ?> 
        <a href="login.php" class="text-blue-600 underline ml-2">Login now</a>
      </div>
    <?php endif; ?>

    <!-- Error Message -->
    <?php if ($error): ?>
      <div class="mb-4 p-4 bg-red-100 text-red-800 border border-red-300 rounded-md">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <form method="post" class="space-y-5">
      <div>
        <label class="block text-gray-700 font-medium mb-1">Username</label>
        <input name="username" type="text" required
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"/>
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-1">Email</label>
        <input name="email" type="email" required
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"/>
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-1">Password</label>
        <input name="password" type="password" required
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"/>
      </div>

      <button type="submit"
              class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-md transition duration-200">
        Register
      </button>

      <a href="login.php"
         class="block text-center w-full bg-gray-100 hover:bg-gray-200 text-blue-600 font-medium py-2 rounded-md transition duration-200">
        Login
      </a>
    </form>
  </div>
</body>
</html>

