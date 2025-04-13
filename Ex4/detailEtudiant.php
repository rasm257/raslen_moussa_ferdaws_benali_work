<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .active{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class = "navbar navbar-expand-lg navbar-dark bg-primary">
        <a class = "navbar-brand" href="index.php">Students Management System</a>
        <button class = "navbar-toggler" type = "button" data-toggle="collapse" data-target = "#navbarNav">
            <span class = "navbar-toggler-icon"></span>
        </button>
        <div class = "collapse navbar-collapse" id = "navbarNav">
            <ul class = "navbar-nav ml-auto">
            <li class = "nav-item" id = "nav-Home">
                    <a href="index.php" class = "nav-link">Home</a>
                </li>
                <li class = "nav-item" id = "nav-Liste-Etudiant">
                    <a href="etudiants.php" class = "nav-link">Liste des etudiants</a>
                </li>
                <li class = "nav-item" id = "nav-Liste-Section">
                    <a href="section.php" class = "nav-link">Liste des sections</a>
                </li>
                <li class = "nav-item" id = "nav-Login">
                    <a href="login-page.php" class = "nav-link">Login</a>
                </li>
                <li class = "nav-item" id = "nav-Logout">
                    <a href="logout.php" class = "nav-link">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php
        include 'config.php';
        $student_id = $_GET['id'];
        if (!isset($student_id)) {
            echo "<h1>Invalid student ID</h1>";
            exit;
        }
        $query = "SELECT section_id,nom FROM student WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $student_id, PDO::PARAM_INT);
        $stmt->execute();
        $student = $stmt->fetch(PDO::FETCH_OBJ);
        if (!$student) {
            echo "<h1>Student not found</h1>";
            exit;
        }
        $secondquer = "SELECT designation,description FROM section WHERE id = :id";
        $stmt = $pdo->prepare($secondquer);
        $stmt->bindParam(':id', $student->section_id, PDO::PARAM_INT);
        $stmt->execute();
        $section_info = $stmt->fetch(PDO::FETCH_OBJ);
        if (!$section_info) {
            echo "<h1>Student not assigned to section.</h1>";
            exit;
        }
        echo "<h3>".$student->nom."'s Additional Info</h3>";
        echo "<div id = 'centerDiv'>
                <table id = 'myTable' class = 'display'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Designation</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>";
        echo "<tr>
                <td>".$student_id."</td>
                <td>".$section_info->designation."</td>
                <td>".$section_info->description."</td>
            </tr>";
        echo "</tbody>
                </table>";
        echo "</div>";
    ?>

    <script>
        const currentPage = window.location.pathname.split("/").pop();
        const navMap = {"etudiants.php" : "nav-Liste-Etudiant",
            "sections.php" : "nav-Liste-Section",
            "index.php" : "nav-Home",
            "login.php" : "nav-Login",
            "logout.php" : "nav-Logout"
        };
        const activeNav =navMap[currentPage];
        if(activeNav){
            document.getElementById(activeNav).classList.add("active");
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>