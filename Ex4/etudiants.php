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
        .icon{
            font-size: 2rem;
        }
        .upperBar{
            display: flex;
            justify-content: space-between;
            width: 500px;
            height: 62px;
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
    <div class = "upperBar">
        <?php
        session_start();
        if($_SESSION['role']==='admin'){
            echo "<a href=\"add-page.php\">
            <i class=\"bi bi-person-plus icon\">Add Student</i>
            </a>";
        }
        ?>
        <form action="etudiants.php" method="post">
            <input type="text" name="searchPlace" placeholder="Search Student">
            <input type="submit" value="Search">
        </form>
    </div>
    <div id = "centerDiv">
        <table id = "myTable" class = "display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date de Naissance</th>
                    <th>Info additionel</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include 'config.php';
                if($_SERVER['REQUEST_METHOD']==='POST'){
                    $prepstring = $_POST['searchPlace']."%";
                    $stmt = $pdo->prepare("SELECT * FROM student WHERE nom LIKE :pattern");
                    $stmt->bindParam(':pattern',$prepstring,PDO::PARAM_STR);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                    foreach($result as $obj){
                        echo 
                            "<tr>
                                <td class = \"student_id\">".$obj->id."</td>
                                <td>".$obj->nom."</td>
                                <td>".$obj->date_naissance."</td>"; 
                        if($_SESSION['role']==='admin'){
                            echo "<td>
                                <a href=\"detailEtudiant.php\" class = \"info-extract\"><i class=\"bi bi-info-circle-fill\"></i></a>
                                <a href=\"delete.php\" class = \"delete\"><i class=\"bi bi-trash\"></i></a>
                                <a href=\"update-page.php\" class = \"update\"><i class=\"bi bi-pencil-square\"></i></a>
                                </td> </tr>";
                        }else{
                            echo "<td>
                                <a href=\"detailEtudiant.php\" class = \"info-extract\"><i class=\"bi bi-info-circle-fill\"></i></a> </td> </tr>";
                        }
                    }
                }else{
                    include 'fetch-student.php';
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        const currentPage = window.location.pathname.split("/").pop();
        const navMap = {"etudiants.php" : "nav-Liste-Etudiant",
            "sections.php" : "nav-Liste-Section",
            "index.php" : "nav-Home"};
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
    <script>
        document.querySelectorAll('.info-extract').forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const studentId = this.closest('tr').querySelector('.student_id').textContent;
                window.location.href = 'detailEtudiant.php?id=' + studentId;
            });
        });
        document.querySelectorAll('.update').forEach(function(link){
            link.addEventListener('click',function(event){
                event.preventDefault();
                const studentId = this.closest('tr').querySelector('.student_id').textContent;
                window.location.href = 'update-page.php?id=' + studentId;
            })
        })
    </script>
    <script>
        document.querySelectorAll('.delete').forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const studentId = this.closest('tr').querySelector('.student_id').textContent;
                window.location.href = 'delete.php?id=' + studentId;
            });
        });
    </script>
</body>
</html>