<?php
include 'config.php';
$query = "SELECT * FROM student";
$result = $pdo->query($query);
$objects=$result->fetchAll(PDO::FETCH_OBJ);
foreach($objects as $obj){
    echo 
        "<tr>
            <td class = \"student_id\">".$obj->id."</td>
            <td>".$obj->nom."</td>
            <td>".$obj->date_naissance."</td>";
    if($_SESSION['role'] == 'admin'){
        echo "<td>
                <a href=\"detailEtudiant.php\" class = \"info-extract\"><i class=\"bi bi-info-circle-fill\"></i></a>
                <a href=\"delete.php\" class = \"delete\"><i class=\"bi bi-trash\"></i></a>
                <a href=\"update-page.php\" class = \"update\"><i class=\"bi bi-pencil-square\"></i></a>
                </td> </tr>";
    }else{
        echo "<td>
                <a href=\"detailEtudiant.php\" class = \"info-extract\"><i class=\"bi bi-info-circle-fill\"></i></a>
            </td> </tr>";
    }
}
?>