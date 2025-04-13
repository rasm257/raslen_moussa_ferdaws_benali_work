<?php
include 'config.php';
session_start();
$query = "SELECT * FROM section";
$result = $pdo->query($query);
$objects=$result->fetchAll(PDO::FETCH_OBJ);
foreach($objects as $obj){
    echo 
        "<tr>
            <td>".$obj->id."</td>
            <td>".$obj->designation."</td>
            <td>".$obj->description."</td>
        </tr>";
}
?>