document.addEventListener("DOMContentLoaded", function() {
    let totalRuns = 0;
    let totalWickets = 0;
    
    document.querySelectorAll("tbody tr").forEach(row => {
        totalRuns += parseInt(row.children[3].innerText);
        totalWickets += parseInt(row.children[4].innerText);
    });

    document.getElementById("totalRuns").innerText = totalRuns;
    document.getElementById("totalWickets").innerText = totalWickets;
});
