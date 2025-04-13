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
    <div>
        <a href=""></a>
    </div>
    <div id = "centerDiv">
        <table id = "myTable" class = "display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Designation</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'fetch-section.php'?>
            </tbody>
        </table>
    </div>
    <script>
        const currentPage = window.location.pathname.split("/").pop();
        const navMap = {"etudiants.php" : "nav-Liste-Etudiant",
            "section.php" : "nav-Liste-Section",
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