<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$mysqli = new mysqli("localhost", "root", "", "ehr_system");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = $_POST["patient_id"];
    $diagnosis = $_POST["diagnosis"];
    $treatment = $_POST["treatment"];
    $doctor_notes = $_POST["doctor_notes"];

    $stmt = $mysqli->prepare("INSERT INTO medical_records (patient_id, diagnosis, treatment, doctor_notes, record_date) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("isss", $patient_id, $diagnosis, $treatment, $doctor_notes);

    if ($stmt->execute()) {
        echo "Medical record added successfully.";
    } else {
        echo "Error adding record.";
    }
    $stmt->close();
}
?>