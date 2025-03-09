<?php
include 'db.php'; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data from the form
    $name = $_POST['name'];
    $university = $_POST['university'];
    $role = $_POST['role'];
    $runs = $_POST['runs'];
    $wickets = $_POST['wickets'];

    // Insert into the database
    $query = "INSERT INTO players (name, university, role, runs, wickets) VALUES ('$name', '$university', '$role', '$runs', '$wickets')";
    if (mysqli_query($conn, $query)) {
        // Redirect back to the index.php after successful insertion
        header('Location: index.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Player</title>
    <link rel = "stylesheet" href = "styles_add_player.css">
</head>
<body>
    <h1>Add Player</h1>
    <form action="add_player.php" method="POST">
        <label for="name">Player Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="university">University:</label><br>
        <input type="text" id="university" name="university" required><br><br>

        <label for="role">Role:</label><br>
        <select type="text" id="role" name="role" required >
            <option value="Batsman">Batsman</option>
            <option value="Bowler">Bowler</option>
            <option value="Allrounder" selected>Allrounder</option>
        </select>
        <br><br>

        <label for="runs">Runs:</label><br>
        <input type="number" id="runs" name="runs" required><br><br>

        <label for="wickets">Wickets:</label><br>
        <input type="number" id="wickets" name="wickets" required><br><br>

        <button type="submit">Add Player</button>
    </form>
</body>
</html>
