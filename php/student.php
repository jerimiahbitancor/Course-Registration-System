<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['loggedin'])) {
    header("Location: ../index.html");
    exit;
}

$studentId = $_SESSION['loggedin'];
$studentData = $_SESSION['users'][$studentId];
$enrolledCourses = $_SESSION['enrolled'][$studentId] ?? [];

// Available courses (same as used in dashboard)
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

// Handle unenrollment
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['unenroll'])) {
    $toRemove = $_POST['unenroll'];
    $_SESSION['enrolled'][$studentId] = array_diff($enrolledCourses, $toRemove);
    // Refresh page to reflect changes
    header("Location: student.html");
    exit;
}
?>