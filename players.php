<?php
include "db.php";

$action = $_GET['action'];

if ($action == "read") {
    $result = $conn->query("SELECT * FROM players");
    $players = [];
    while ($row = $result->fetch_assoc()) {
        $players[] = $row;
    }
    echo json_encode($players);
}

if ($action == "delete" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM players WHERE id=$id");
}

if ($action == "create" && $_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $university = $_POST['university'];
    $role = $_POST['role'];
    $runs = $_POST['runs'];
    $wickets = $_POST['wickets'];

    $stmt = $conn->prepare("INSERT INTO players (name, university, role, runs, wickets) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssii", $name, $university, $role, $runs, $wickets);
    $stmt->execute();
    echo json_encode(["status" => "success"]);
}
?>
