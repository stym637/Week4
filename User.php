<?php
require_once "regis.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        form {
            max-width: 400px;
        }
        .form-group {
            margin-bottom: 12px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 6px;
            box-sizing: border-box;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        .success {
            padding: 10px;
            margin-bottom: 15px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .file-error {
            padding: 10px;
            margin-bottom: 15px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        button {
            padding: 8px 16px;
        }
    </style>
</head>
<body>
<h2>User Registration</h2>
<?php if (!empty($successMessage)): ?>
    <div class="success"><?php echo htmlspecialchars($successMessage); ?></div>
<?php endif; ?>

<?php if (!empty($errors["file"])): ?>
    <div class="file-error"><?php echo htmlspecialchars($errors["file"]); ?></div>
<?php endif; ?>

<form method="post" action="">
    <div class="form-group">
        <label for="name">Name:</label>
        <input
            type="text"
            id="name"
            name="name"
            value="<?php echo htmlspecialchars($name); ?>"
        >
        <?php if (!empty($errors["name"])): ?>
            <div class="error"><?php echo htmlspecialchars($errors["name"]); ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="email">Email address:</label>
        <input
            type="email"
            id="email"
            name="email"
            value="<?php echo htmlspecialchars($email); ?>"
        >
        <?php if (!empty($errors["email"])): ?>
            <div class="error"><?php echo htmlspecialchars($errors["email"]); ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input
            type="password"
            id="password"
            name="password"
        >
        <?php if (!empty($errors["password"])): ?>
            <div class="error"><?php echo htmlspecialchars($errors["password"]); ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="confirm_password">Confirm password:</label>
        <input
            type="password"
            id="confirm_password"
            name="confirm_password"
        >
        <?php if (!empty($errors["confirm_password"])): ?>
            <div class="error"><?php echo htmlspecialchars($errors["confirm_password"]); ?></div>
        <?php endif; ?>
    </div>

    <button type="submit">Register</button>
</form>

</body>
</html>
