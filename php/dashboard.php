<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['loggedin'])) {
    header("Location: ../index.html");
    exit;
}

$studentId = $_SESSION['loggedin'];

// Course list (associative array)
$courses = [
    "COMP106" => "Applications Development and Emerging Technologies",
    "GE002" => "Readings in Philippine History",
    "GEE002" => "GE Elective: The Entrepreneurial Mind",
    "IT103" => "Advanced Database Systems",
    "IT104" => "Integrative Programming and Technologies I",
    "IT105" => "Networking I",
    "IT301" => "Web Programming",
    "PE104" => "PATHfit 4"
];

// Initialize enrolled courses for student if not set
if (!isset($_SESSION['enrolled'][$studentId])) {
    $_SESSION['enrolled'][$studentId] = [];
}
// echo "<pre>";
// print_r($studentId);
// echo "</pre>";

// Handle form submission for enrollment

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['courses'])) {
    $selected = $_POST['courses'];

    if (count($selected) !== 3) {
        $error = "Please select exactly 3 courses.";
    } else {
        $enrolled = &$_SESSION['enrolled'][$studentId];
        foreach ($selected as $code) {
            if (!in_array($code, $enrolled)) {
                $enrolled[] = $code;
            }
        }
        $success = "Courses successfully enrolled!";
    }
}

// Handle form submission for enrollment
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['courses'])) {
//     foreach ($_POST['courses'] as $code) {
//         if (!in_array($code, $_SESSION['enrolled'][$studentId])) {
//             $_SESSION['enrolled'][$studentId][] = $code;
//         }
//     }
// }

?>
