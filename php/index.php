<?php
session_start();

// Simulate storage of registered users (in real apps, this should be a database)
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

// Handle Registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idnumber'])) {
    $user = [
        'idnumber' => $_POST['idnumber'],
        'age' => $_POST['age'],
        'sex' => $_POST['sex'],
        'lastname' => $_POST['lastname'],
        'firstname' => $_POST['firstname'],
        'middlename' => $_POST['middlename'],
        'program' => $_POST['program'],
        'yearsection' => $_POST['yearsection'],
        'department' => $_POST['department']
    ];

    // Save to session users
    $_SESSION['users'][$user['idnumber']] = $user;
    $_SESSION['loggedin'] = $user['idnumber'];
    header('Location: courses.php');
    exit;
}

// Handle Login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
    $id = $_POST['username'];
    if (isset($_SESSION['users'][$id])) {
        $_SESSION['loggedin'] = $id;
        header('Location: courses.php');
        exit;
    } else {
        echo "<p style='color:red;'>User not found. Please register first.</p>";
    }
}
?>