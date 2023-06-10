<?php

$conn = mysqli_connect("localhost", "root", "", "todolist_db");

if($conn->connect_error){
    die("koneksi gagal: " . $conn->connect_error);
} 