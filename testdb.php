<?php
$conn = new mysqli("localhost", "root", "2005", "hvf_portal");

if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
} else {
    echo "✅ Connected successfully to hvf_portal";
}
?>
