<?php
session_start();

include("header.php");
// Initialize session variables if not set
if (!isset($_SESSION['total_money'])) {
    $_SESSION['total_money'] = 0;
}
if (!isset($_SESSION['total_points'])) {
    $_SESSION['total_points'] = 0;
}

// Handle Claim Points for Vouchers
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['claim_voucher'])) {
    $voucherPointsRequired = $_POST['voucher_points'];
    if ($_SESSION['total_points'] >= $voucherPointsRequired) {
        $_SESSION['total_points'] -= $voucherPointsRequired;
        $voucherClaimed = $_POST['voucher_name'];
        $message = "You have successfully claimed the $voucherClaimed voucher!";
    } else {
        $message = "You do not have enough points to claim this voucher.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Claim Rewards</title>
    <style>
        body {
            background-color: #f9f5f0;
            font-family: Arial, sans-serif;
            padding: 20px;
            margin: 0;
        }

        header {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            color: #ff7f11;
            margin-bottom: 10px;
            margin-top: 40px;
        }
        .summary {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .card {
            background-color: white;
            border-radius: 12px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            padding: 20px;
            text-align: center;
            width: 100%;
        }

        .card h3 {
            color: #ff7f11;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .points-card {
            background-color: white;
            border-radius: 12px;
            padding: 15px 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 4px solid #ff7f11;
            border-radius: 12px 12px 0 0;
        }

        .voucher-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .voucher-card {
            background-color: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
            border-radius: 8px;
        }

        .voucher-card h3 {
            color: #ff7f11;
            font-size: 1.1rem;
            margin: 0;
        }

        .voucher-card button {
            background-color: #ff7f11;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background-color 0.3s;
        }

        .voucher-card button:hover {
            background-color: #e36a08;
        }

        .message {
            margin-top: 20px;
            font-size: 1rem;
            color: #e63946;
            text-align: center;
        }

        .voucher-card p {
            margin: 0;
            color: #666;
        }

        .message, .points-card {
            font-size: 1rem;
        }
    </style>
</head>
<body>
<header>Claim Your Rewards</header>

<div>
        <div class="summary">
            <div class="card">
                <h3>Total Money</h3>
                <p id="total-money">$<?php echo number_format($_SESSION['total_money'], 2); ?></p>
            </div>
            <div class="card">
                <h3>Total Points</h3>
                <p id="total-points"><?php echo $_SESSION['total_points']; ?> Points</p>
            </div>
        </div>
</div>
<!-- Vouchers -->
<div class="voucher-list">
    <?php
    // Define the rewards and their respective points
    $rewards = [
        ['name' => 'McDonald\'s $5 Voucher', 'points' => 100],
        ['name' => 'Starbucks $10 Voucher', 'points' => 200],
        ['name' => 'Utilities Bill Discount', 'points' => 500],
        ['name' => 'Amazon $20 Voucher', 'points' => 400],
        ['name' => 'Netflix Subscription', 'points' => 300],
        ['name' => 'Spotify Subscription', 'points' => 250],
        ['name' => 'Nike $50 Voucher', 'points' => 1000],
        ['name' => 'Apple Store $100 Voucher', 'points' => 2000],
        ['name' => 'Gift Cards from Target', 'points' => 800],
        ['name' => 'Best Buy $50 Voucher', 'points' => 900],
        ['name' => 'Airtime Top-Up', 'points' => 150],
        ['name' => 'Movie Tickets', 'points' => 250],
        ['name' => 'Shopping Mall Gift Card', 'points' => 700],
        ['name' => 'Travel Discount Voucher', 'points' => 1500],
        ['name' => 'Uber $10 Voucher', 'points' => 150],
        ['name' => 'Restaurant Discount Voucher', 'points' => 350],
        ['name' => 'Hotel Discount Voucher', 'points' => 1200],
        ['name' => 'Fitness Class Voucher', 'points' => 500],
        ['name' => 'Game Console Discount', 'points' => 2500],
        ['name' => 'Grocery Voucher', 'points' => 600],
    ];

    // Loop through each reward and create a card
    foreach ($rewards as $reward) {
        echo '
        <div class="voucher-card">
            <div>
                <h3>' . $reward['name'] . '</h3>
                <p>' . $reward['points'] . ' Points</p>
            </div>
            <form method="POST" action="">
                <input type="hidden" name="voucher_name" value="' . $reward['name'] . '">
                <input type="hidden" name="voucher_points" value="' . $reward['points'] . '">
                <button type="submit" name="claim_voucher">Claim ' . $reward['points'] . ' Points</button>
            </form>
        </div>';
    }
    ?>
</div>

<!-- Message -->
<div class="message">
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
</div>

</body>
</html>
