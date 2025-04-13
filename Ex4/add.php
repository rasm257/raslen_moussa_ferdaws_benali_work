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
    <style>
        .active{
            font-weight: bold;
        }
        h1{
            margin: 0;
            height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
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
    <h1>
    <?php
        include 'config.php';
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $query = "INSERT INTO student(id,nom,date_naissance,section_id) VALUES(:id,:nom,:date_naissance,:section_id)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id',$_POST['student_id'],PDO::PARAM_INT);
            $stmt->bindParam(':nom',$_POST['student_name'],PDO::PARAM_STR);
            $stmt->bindParam(':date_naissance',$_POST['student_date_naissance'],PDO::PARAM_STR);
            $stmt->bindParam(':section_id',$_POST['student_section_id'],PDO::PARAM_INT);
            $stmt->execute();
            echo "Student added successfully!";
        }
    ?>
    </h1>
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




