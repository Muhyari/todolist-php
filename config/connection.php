<?php

$conn = mysqli_connect("localhost", "root", "", "surat");

if($conn->connect_error){
    die("koneksi gagal: " . $conn->connect_error);
} 