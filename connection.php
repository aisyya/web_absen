<?php

$conn = mysqli_connect('localhost', 'root', '', 'nilai_db');

if($conn->connect_errno){
	echo "Error: ";
}