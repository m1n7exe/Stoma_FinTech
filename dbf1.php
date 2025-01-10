<?php
session_start();

include("header.php");
// Initialize session variables if not set
$score = isset($_SESSION['score']) ? $_SESSION['score'] : 0;
if (!isset($_SESSION['total_money'])) {
    $_SESSION['total_money'] = 0;
}
if (!isset($_SESSION['total_points'])) {
    $_SESSION['total_points'] = 0;

}
/*
// Initialize session variables if not set
if (!isset($_SESSION['total_money'])) {
    $_SESSION['total_money'] = 0;
}
if (!isset($_SESSION['total_points'])) {
    $_SESSION['total_points'] = 0;
}
*/
// Handle Deposit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deposit'])) {
    $depositAmount = floatval($_POST['deposit_amount']);
    if ($depositAmount > 0) {
        $_SESSION['total_money'] += $depositAmount;
    }
}

// Handle Withdraw
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['withdraw'])) {
    $withdrawAmount = floatval($_POST['withdraw_amount']);
    if ($withdrawAmount > 0 && $withdrawAmount <= $_SESSION['total_money']) {
        $_SESSION['total_money'] -= $withdrawAmount;
    }
}

// Handle Claim Points
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['claim'])) {
    $pointsToClaim = floor($_SESSION['total_money'] / 10);
    if ($pointsToClaim > 0) {
        $_SESSION['total_points'] += $pointsToClaim;
        $_SESSION['total_money'] -= $pointsToClaim * 10;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sustainability & Lifestyle Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #fff5e6;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 20px;
        }

        header {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            color: #ff7043;
            margin-bottom: 20px;
            margin-top: 30px;
        }

        .card-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .summary {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .card {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            width: 100%;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }

        .card h3 {
            color: #ff7043;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .action-button {
            background-color: #ff7043;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .action-button:hover {
            background-color: #e6643b;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: auto;
            padding: 20px;
            width: 40%;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            cursor: pointer;
        }

        .close:hover {
            color: #000;
        }

        .chart-container {
            margin: 20px 0;
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<header>Dashboard</header>

<div class="dashboard-container">

    <!-- Card Section -->
    <div class="card-section">
        <h2>Your Card</h2>
        <p>Card Holder: John Doe</p>
        <p>Card Number: **** **** **** 1234</p>
    </div>

    <!-- Summary Section -->
    <div>
        <div class="summary">
            <div class="card">
                <h3>Total Money</h3>
                <p id="total-money">$<?php echo number_format($_SESSION['total_money'], 2); ?></p>
            </div>
            <div class="card">
                <h3>Total Points</h3>
                <p id="total-points">20 Points</p>
            </div>
        </div>

        <div class="actions">
            <button class="action-button" onclick="openModal('depositModal')">Deposit</button>
            <button class="action-button" onclick="openModal('withdrawModal')">Withdraw</button>
            <form method="POST" action="" style="display: inline;">
                <button type="submit" name="claim" class="action-button">Claim Points</button>
            </form>
        </div>

        <!-- Deposit Modal -->
        <div id="depositModal" class="modal">
            <div class="modal-content">
                <h2>Deposit Money</h2>
                <form method="POST" action="">
                    <input type="number" name="deposit_amount" placeholder="Enter Amount" required>
                    <br><br>
                    <button type="submit" name="deposit" class="action-button">Confirm Deposit</button>
                    <button type="button" class="action-button" onclick="closeModal('depositModal')">Cancel</button>
                </form>
            </div>
        </div>

        <!-- Withdraw Modal -->
        <div id="withdrawModal" class="modal">
            <div class="modal-content">
                <h2>Withdraw Money</h2>
                <form method="POST" action="">
                    <input type="number" name="withdraw_amount" placeholder="Enter Amount" required>
                    <br><br>
                    <button type="submit" name="withdraw" class="action-button">Confirm Withdraw</button>
                    <button type="button" class="action-button" onclick="closeModal('withdrawModal')">Cancel</button>
                </form>
            </div>
        </div>


<!-- Chart Containers -->
<div class="chart-container">
    <canvas id="moneyChart"></canvas>
</div>

<!-- Points Earned Chart -->
<div class="chart-container">
    <canvas id="pointsChart"></canvas>
</div>

<!-- Money vs Points Chart -->
<div class="chart-container">
    <canvas id="moneyVsPointsChart"></canvas>
</div>


<script>
function openModal(modalId) {
    document.getElementById(modalId).style.display = 'block';
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

// Close modal when clicking outside the modal content
window.onclick = function(event) {
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
};

// Chart
var ctx = document.getElementById('moneyChart').getContext('2d');
var moneyChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['January', 'February', 'March', 'April'],
        datasets: [{
            label: 'Sustainability Spending',
            data: [200, 150, 300, 250],
            backgroundColor: '#2a9d8f'
        }]
    }
});

// Chart for Points Earned
var ctx2 = document.getElementById('pointsChart').getContext('2d');
var pointsChart = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: ['January', 'February', 'March', 'April'],
        datasets: [{
            label: 'Points Earned',
            data: [50, 75, 100, 120],
            borderColor: '#FF6347',
            fill: false,
            tension: 0.1
        }]
    }
});

// Chart for Money vs Points
var ctx3 = document.getElementById('moneyVsPointsChart').getContext('2d');
var moneyVsPointsChart = new Chart(ctx3, {
    type: 'line',
    data: {
        labels: ['January', 'February', 'March', 'April'],
        datasets: [{
            label: 'Money ($)',
            data: [200, 150, 300, 250],
            borderColor: '#2a9d8f',
            fill: false,
            tension: 0.1
        },
        {
            label: 'Points',
            data: [50, 75, 100, 120],
            borderColor: '#FF6347',
            fill: false,
            tension: 0.1
        }]
    }
});
</script>
</body>
</html>
