<?php
session_start();

// Simulated users (no database)
$users = [
    [
        'id' => 1,
        'email' => 'admin@example.com',
        'password' => 'admin123',  // plaintext for demo only
        'role' => 'admin',
        'status' => 'active'
    ],
    [
        'id' => 2,
        'email' => 'seller@example.com',
        'password' => 'seller123',
        'role' => 'seller',
        'status' => 'active'
    ],
    [
        'id' => 3,
        'email' => 'buyer@example.com',
        'password' => 'buyer123',
        'role' => 'buyer',
        'status' => 'active'
    ]
];

$errors = [];

if(isset($_POST['login'])){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if(empty($email)){
        $errors[] = "Email is required.";
    }
    if(empty($password)){
        $errors[] = "Password is required.";
    }

    if(empty($errors)){
        // Find user in simulated array
        $user_found = null;
        foreach($users as $user){
            if($user['email'] === $email && $user['status'] === 'active'){
                $user_found = $user;
                break;
            }
        }

        if($user_found){
            if($user_found['password'] === $password){
                $_SESSION['user_id'] = $user_found['id'];
                $_SESSION['role'] = $user_found['role'];

                // Redirect by role
                switch($user_found['role']){
                    case 'admin': header("Location: admin_dashboard.php"); exit; 
                    case 'seller': echo "Welcome to Seller Dashboard"; break;
                    case 'buyer': echo "Welcome to Buyer Dashboard"; break;
                }
            } else {
                $errors[] = "Incorrect password.";
            }
        } else {
            $errors[] = "User not found or inactive.";
        }
    }

    // Display errors
    if(!empty($errors)){
        foreach($errors as $err){
            echo "<p style='color:red;'>$err</p>";
        }
    }
}
?>
