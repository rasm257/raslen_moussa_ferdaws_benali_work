<?php
include 'config.php';
session_start();
$id=$_GET['id'];
if (!isset($id)) {
    echo "<h1>Invalid student ID</h1>";
    exit;
}
$query = "DELETE FROM student WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
if ($stmt->rowCount() > 0) {
    echo "<h1>Student with ID : $id deleted.</h1>";
}else{
    echo "<h1>Failed to delete student.</h1>";
}
header("Location: etudiants.php");
exit;
?>