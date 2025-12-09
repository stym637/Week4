<?php
$name = "";
$email = "";
$successMessage = "";
$errors = [
    "name" => "",
    "email" => "",
    "password" => "",
    "confirm_password" => "",
    "file" => ""
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";
    $confirmPassword = $_POST["confirm_password"] ?? "";
    $isValid = true;

    // Name validation
    if ($name === "") {
        $errors["name"] = "Name is required";
        $isValid = false;
    }

    // Email validation
    if ($email === "") {
        $errors["email"] = "Email is required";
        $isValid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Email is not valid";
        $isValid = false;
    }

    // Password validation
    if ($password === "") {
        $errors["password"] = "Password is required";
        $isValid = false;
    } elseif (strlen($password) < 8) {
        $errors["password"] = "Password must be at least 8 characters long";
        $isValid = false;
    } elseif (!preg_match("/[\W_]/", $password)) {
        $errors["password"] = "Password must contain at least one special character.";
        $isValid = false;
    }

    // Confirm password validation
    if ($confirmPassword === "") {
        $errors["confirm_password"] = "Confirm Password is required";
        $isValid = false;
    } elseif ($password !== $confirmPassword) {
        $errors["confirm_password"] = "Passwords do not match";
        $isValid = false;
    }

    if ($isValid) {
        $jsonFile = __DIR__ . "/users.json";

        try {
            // Ensure file exists
            if (!file_exists($jsonFile)) {
                if (file_put_contents($jsonFile, json_encode([])) === false) {
                    throw new Exception("Could not create users.json file.");
                }
            }

            // Read existing users
            $jsonData = file_get_contents($jsonFile);
            if ($jsonData === false) {
                throw new Exception("Error reading users.json file.");
            }

            $users = json_decode($jsonData, true);
            if (!is_array($users)) {
                $users = [];
            }

            // Duplicate email check
            foreach ($users as $user) {
                if (isset($user["email"]) && $user["email"] === $email) {
                    $errors["email"] = "This email is already registered.";
                    $isValid = false;
                    break;
                }
            }

            if ($isValid) {
                // Hash password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // New user
                $newUser = [
                    "name" => $name,
                    "email" => $email,
                    "password" => $hashedPassword
                ];

                $users[] = $newUser;

                $newJsonData = json_encode($users, JSON_PRETTY_PRINT);
                if (file_put_contents($jsonFile, $newJsonData) === false) {
                    throw new Exception("Error writing to users.json file.");
                }

                $successMessage = "Registration successful!";
                $name = "";
                $email = "";
            }

        } catch (Exception $e) {
            $errors["file"] = $e->getMessage();
        }
    }
}
