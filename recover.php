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



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Password Recovery</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-r from-blue-400 to-indigo-600 flex items-center justify-center">
  <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg">
    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Password Recovery</h2>

    <form method="post" class="space-y-5">
      <div>
        <label class="block text-gray-700 font-medium mb-1">Enter your email</label>
        <input name="email" type="email" required
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
               placeholder="your@email.com" />
      </div>

      <button type="submit"
              class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-md transition duration-200">
        Recover Password
      </button>
    </form>
  </div>
</body>
</html>
