document.addEventListener("DOMContentLoaded", function() {
    loadPlayers();
    updateDashboard();
});

// Sample Player Data
let players = [
    { name: "Chamika Chandimal", university: "University of the Visual & Performing Arts", role: "Batsman", runs: 530, wickets: 0 },
    { name: "Dimuth Dhananjaya", university: "University of the Visual & Performing Arts", role: "All-Rounder", runs: 250, wickets: 8 },
    { name: "Avishka Mendis", university: "Eastern University", role: "All-Rounder", runs: 210, wickets: 7 }
];

// Load Players into Table
function loadPlayers() {
    let tableBody = document.getElementById("playersTable");
    tableBody.innerHTML = "";

    players.forEach((player, index) => {
        let row = `<tr>
            <td>${player.name}</td>
            <td>${player.university}</td>
            <td>${player.role}</td>
            <td>${player.runs}</td>
            <td>${player.wickets}</td>
            <td>
                <button class="btn btn-warning btn-sm" onclick="editPlayer(${index})">Edit</button>
                <button class="btn btn-danger btn-sm" onclick="deletePlayer(${index})">Delete</button>
            </td>
        </tr>`;
        tableBody.innerHTML += row;
    });
}

// Update Dashboard Stats
function updateDashboard() {
    let totalRuns = players.reduce((sum, player) => sum + player.runs, 0);
    let totalWickets = players.reduce((sum, player) => sum + player.wickets, 0);
    let topScorer = players.reduce((max, player) => (player.runs > max.runs ? player : max), players[0]);
    let topWicketTaker = players.reduce((max, player) => (player.wickets > max.wickets ? player : max), players[0]);

    document.getElementById("totalRuns").innerText = totalRuns;
    document.getElementById("totalWickets").innerText = totalWickets;
    document.getElementById("topScorer").innerText = topScorer.name;
    document.getElementById("topWicketTaker").innerText = topWicketTaker.name;
}

// Delete Player
function deletePlayer(index) {
    if (confirm("Are you sure you want to delete this player?")) {
        players.splice(index, 1);
        loadPlayers();
        updateDashboard();
    }
}

// Edit Player (Placeholder Function)
function editPlayer(index) {
    alert("Edit player functionality coming soon!");
}

// Add Player (Placeholder Function)
function showAddPlayerForm() {
    alert("Add player functionality coming soon!");
}
