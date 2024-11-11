<?php
include 'db.php';

if (isset($_POST['name']) && isset($_POST['age']) && isset($_POST['email']) && isset($_POST['course'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (name, age, email, course) VALUES ('$name', '$age', '$email', '$course')";

    if ($conn->query($sql) === TRUE) {
        echo "New student added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header('Location: index.php');
    exit;
} else {
    echo "Please fill in all fields.";
    header('Location: index.php');
    exit;
}
?>
