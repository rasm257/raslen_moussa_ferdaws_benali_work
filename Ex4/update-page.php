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
        .form-group{
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        #username{
            width: 300px;
        }
        #password{
            width: 300px;
        }
        h1{
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
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
    <div class = "login">
        <h2>Update Student</h2>
        <form method = "post" class = "text-center mb-4" action="update.php">
        <div class = "form-group">
                <label for = "Student-ID">Current Student ID</label>
                <input type = "text" name = "c_student_id" id = "c_student_id" class = "form-control" required readonly>
            </div>
            <div class = "form-group">
                <label for = "Student-ID">New Student ID</label>
                <input type = "text" name = "n_student_id" id = "n_student_id" class = "form-control" required>
            </div>
            <div class = "form-group">
                <label for = "Student-Name">New Student Name</label>
                <input type = "text" name = "n_student_name" id = "n_student_name" class = "form-control" required>
            </div>
            <div class = "form-group">
                <label for = "Student-Birthdate">New Student Birthdate</label>
                <input type = "text" name = "n_student_date_naissance" id = "n_student_date_naissance" class = "form-control" required>
            </div>
            <div class = "form-group">
                <label for = "password">New Student Section ID</label>
                <input type = "text" name = "n_student_section_id" id = "n_student_section_id" class = "form-control" required>
            </div>
            <button type = "submit" class = "btn btn-primary form-group change" name="updateButton">Change</button>
        </form>
    </div>
    <script>
        const currentPage = window.location.pathname.split("/").pop();
        const navMap = {"etudiants.php" : "nav-Liste-Etudiant",
            "sections.php" : "nav-Liste-Section",
            "index.php" : "nav-Home",
            "login-page.php" : "nav-Login",
            "logout.php" : "nav-Logout"
        };
        const activeNav = navMap[currentPage];
        if(activeNav){
            document.getElementById(activeNav).classList.add("active");
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        let input=document.getElementById("n_student_id");

    </script>
    <script>
        const student_id =window.location.search.split("=").pop();
        const inputId=document.getElementById("c_student_id");
        inputId.value=student_id;
    </script>
</body>
</html>