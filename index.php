<?php include 'db.php'; // Include the database connection

// Fetch players from the database
$query = "SELECT * FROM players";
$result = mysqli_query($conn, $query);

// Fetch highest run scorer and wicket taker
$highestRunScorerQuery = "SELECT * FROM players ORDER BY runs DESC LIMIT 1";
$highestWicketTakerQuery = "SELECT * FROM players ORDER BY wickets DESC LIMIT 1";
$highestRunScorerResult = mysqli_query($conn, $highestRunScorerQuery);
$highestWicketTakerResult = mysqli_query($conn, $highestWicketTakerQuery);

$highestRunScorer = mysqli_fetch_assoc($highestRunScorerResult);
$highestWicketTaker = mysqli_fetch_assoc($highestWicketTakerResult);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Spirit11</title>
    <link rel="stylesheet" href="styles.css"> <!-- Directly link the CSS file in the same folder -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">Spiritx</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Admin Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_profile.html">Admin Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link logout" href="login.html">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <!-- Main Content -->
    <div class="content">
        <h1>Admin Dashboard</h1>
        
        <!-- Two Separate Sections (Dashboard Stats & Players Management) -->
        <div class="section-wrapper">
            <!-- Dashboard Stats -->
            <div class="dashboard-stats">
                <div class="card">
                    <h3>Total Runs</h3>
                    <p id="totalRuns">0</p>
                </div>
                <div class="card">
                    <h3>Total Wickets</h3>
                    <p id="totalWickets">0</p>
                </div>
                <div class="card">
                    <h3>Top Scorer</h3>
                    <p id="topScorer"><?php echo $highestRunScorer['name']; ?></p>
                </div>
                <div class="card">
                    <h3>Top Wicket Taker</h3>
                    <p id="topWicketTaker"><?php echo $highestWicketTaker['name']; ?></p>
                </div>
            </div>
            <h1>Players Management</h1>
            <!-- Players Table -->
            <div class="players-management">
                
                <button class="btn btn-primary" onclick="window.location.href='add_player.php'">Add Player</button>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>University</th>
                            <th>Role</th>
                            <th>Runs</th>
                            <th>Wickets</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($player = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>" . $player['name'] . "</td>
                                    <td>" . $player['university'] . "</td>
                                    <td>" . $player['role'] . "</td>
                                    <td>" . $player['runs'] . "</td>
                                    <td>" . $player['wickets'] . "</td>
                                    <td>
                                        <a href='edit_player.php?id=" . $player['id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                        <a href='delete_player.php?id=" . $player['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                                    </td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
