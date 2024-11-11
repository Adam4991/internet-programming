<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 500px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        input, button {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #28a745;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .actions {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .actions button {
            background-color: #007bff;
            color: white;
        }
        .actions button:hover {
            background-color: #0056b3;
        }
        .actions .delete-btn {
            background-color: #dc3545;
        }
        .actions .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Student Management System</h2>
        <form action="insert.php" method="post">
            <input type="text" name="name" placeholder="Enter name" required>
            <input type="number" name="age" placeholder="Enter age" required>
            <input type="email" name="email" placeholder="Enter email" required>
            <input type="text" name="course" placeholder="Enter course" required>
            <button type="submit">Add Student</button>
        </form>
        <h2>Student List</h2>
        <?php
        include 'db.php';
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Name</th><th>Age</th><th>Email</th><th>Course</th><th>Actions</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['age']}</td><td>{$row['email']}</td><td>{$row['course']}</td>";
                echo "<td class='actions'>
                      <form action='update.php' method='post' style='display:inline;'>
                      <input type='hidden' name='id' value='{$row['id']}'>
                      <input type='hidden' name='name' value='{$row['name']}'>
                      <input type='hidden' name='age' value='{$row['age']}'>
                      <input type='hidden' name='email' value='{$row['email']}'>
                      <input type='hidden' name='course' value='{$row['course']}'>
                      <button type='submit'>Update</button>
                      </form>
                      <form action='delete.php' method='post' style='display:inline;'>
                      <input type='hidden' name='id' value='{$row['id']}'>
                      <button type='submit' class='delete-btn'>Delete</button>
                      </form>
                      </td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No students found</p>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
