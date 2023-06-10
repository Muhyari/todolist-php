<?php 

include("../config/connection.php");

$id = $_GET['id'];

$delete = mysqli_query($conn,"DELETE FROM todolist WHERE id='$id' ");

if(!$delete){
    echo "Error";
} else {
    header("location:../index.php");
}