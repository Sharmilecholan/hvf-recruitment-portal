<?php
$conn = new mysqli("localhost", "root", "2005", "hvf_portal",3307);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
