<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stud_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Create Operation
if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (name, email, course) VALUES ('$name', '$email', '$course')";

    if ($conn->query($sql) === TRUE) {
        echo "New student added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle Update Operation
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "UPDATE students SET name='$name', email='$email', course='$course' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Student updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle Delete Operation
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM students WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Student deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch Data for Update Form
$updateData = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $sql = "SELECT * FROM students WHERE id=$id";
    $result = $conn->query($sql);
    $updateData = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
</head>
<body>
    <h2>Student List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["course"] . "</td>
                    <td>
                        <a href='index.php?edit=" . $row["id"] . "'>Edit</a>
                        <a href='index.php?delete=" . $row["id"] . "'>Delete</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No students found</td></tr>";
        }
        ?>
    </table>

    <h2><?php echo isset($updateData) ? 'Update Student' : 'Add New Student'; ?></h2>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo isset($updateData) ? $updateData['id'] : ''; ?>">
        Name: <input type="text" name="name" value="<?php echo isset($updateData) ? $updateData['name'] : ''; ?>" required><br>
        Email: <input type="email" name="email" value="<?php echo isset($updateData) ? $updateData['email'] : ''; ?>" required><br>
        Course: <input type="text" name="course" value="<?php echo isset($updateData) ? $updateData['course'] : ''; ?>" required><br>
        <input type="submit" name="<?php echo isset($updateData) ? 'update' : 'create'; ?>" value="<?php echo isset($updateData) ? 'Update Student' : 'Add Student'; ?>">
    </form>
</body>
</html>