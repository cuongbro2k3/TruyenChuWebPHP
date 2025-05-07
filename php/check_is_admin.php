<?php
    $id = $_SESSION['id'];
    include 'db_connection.php';
    $sql_account = "SELECT * FROM account WHERE id = $id";
    $result = $conn->query($sql_account);
    
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $is_admin = $row['is_admin'];
    }

    if ($is_admin == 0){
        header("Location: ../../../html/home.php");
        exit();
    }
?>