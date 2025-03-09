<?php
include 'db.php';

if (isset($_GET['id'])) {
    // Get player ID from URL parameter
    $id = $_GET['id'];
    
    // Fetch player details from the database
    $query = "SELECT * FROM players WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $player = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the updated data from the form
    $name = $_POST['name'];
    $university = $_POST['university'];
    $role = $_POST['role'];
    $runs = $_POST['runs'];
    $wickets = $_POST['wickets'];

    // Update player in the database
    $updateQuery = "UPDATE players SET name='$name', university='$university', role='$role', runs='$runs', wickets='$wickets' WHERE id=$id";
    
    if (mysqli_query($conn, $updateQuery)) {
        // Redirect back to the index.php after successful update
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
    <title>Edit Player</title>
</head>
<body>
    <h1>Edit Player</h1>
    <form action="edit_player.php?id=<?php echo $id; ?>" method="POST">
        <label for="name">Player Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $player['name']; ?>" required><br><br>

        <label for="university">University:</label><br>
        <input type="text" id="university" name="university" value="<?php echo $player['university']; ?>" required><br><br>

        <label for="role">Role:</label><br>
        <input type="text" id="role" name="role" value="<?php echo $player['role']; ?>" required><br><br>

        <label for="runs">Runs:</label><br>
        <input type="number" id="runs" name="runs" value="<?php echo $player['runs']; ?>" required><br><br>

        <label for="wickets">Wickets:</label><br>
        <input type="number" id="wickets" name="wickets" value="<?php echo $player['wickets']; ?>" required><br><br>

        <button type="submit">Update Player</button>
    </form>
</body>
</html>
