<?php
session_start();

// Generate a CSRF token if not already set
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sustainability Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #fff3e0; /* Light orange background */
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }

        header {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            color: #ff7043; /* Orange */
            width: 100%;
            margin: 20px 0;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            width: 90%;
            max-width: 600px;
        }

        .card {
            perspective: 1000px;
            position: relative;
            width: 100%;
            aspect-ratio: 4 / 3; /* Maintain consistent size */
            cursor: pointer;
        }

        .card-inner {
            position: absolute;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transform: rotateY(0deg);
            transition: transform 0.6s ease-in-out;
        }

        .card.flipped .card-inner {
            transform: rotateY(180deg);
        }

        .card-front,
        .card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-front {
            background-color: #ff7043; /* Orange */
            color: white;
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
        }

        .card-back {
            background-color: #fff; /* White */
            transform: rotateY(180deg);
            padding: 1rem;
            border: 1px solid #ff7043; /* Orange border */
        }

        .card-back form {
            width: 100%;
        }

        .card-back input,
        .card-back select,
        .card-back button {
            display: block;
            width: 100%;
            margin: 0.5rem 0;
            padding: 0.5rem;
            font-size: 0.9rem;
        }

        .card-back button {
            background-color: #ff7043; /* Orange */
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .card-back button:hover {
            background-color: #e64a19; /* Darker orange */
        }
    </style>
</head>
<body>
    <header>
        <h1>Sustainability Tracker</h1>
    </header>

    <div class="grid">
        <!-- Utility Bill -->
        <div class="card" onclick="toggleFlip(event)">
            <div class="card-inner">
                <div class="card-front">Upload Utility Bill</div>
                <div class="card-back">
                    <form action="upload_bill.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="utility_bill" accept=".jpg,.jpeg,.png,.pdf" required>
                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
                        <button type="submit">Upload Bill</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Purchase Receipt -->
        <div class="card" onclick="toggleFlip(event)">
            <div class="card-inner">
                <div class="card-front">Upload Purchase Receipt</div>
                <div class="card-back">
                    <form action="upload_receipt.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="receipt" accept=".jpg,.jpeg,.png,.pdf" required>
                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
                        <button type="submit">Upload Receipt</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Track Commute -->
        <div class="card" onclick="toggleFlip(event)">
            <div class="card-inner">
                <div class="card-front">Track Commute</div>
                <div class="card-back">
                    <form action="track_commute.php" method="POST">
                        <label for="distance">Distance (km):</label>
                        <input type="number" step="0.01" name="distance" min="0" required>
                        <select name="transport_type">
                            <option value="bus">Bus</option>
                            <option value="train">Train</option>
                            <option value="car">Car</option>
                        </select>
                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
                        <button type="submit">Track Commute</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Food Emissions -->
        <div class="card" onclick="toggleFlip(event)">
            <div class="card-inner">
                <div class="card-front">Track Food Emissions</div>
                <div class="card-back">
                    <form action="upload_food.php" method="POST" enctype="multipart/form-data">
                        <label for="food_picture">Take a Picture of Your Meal:</label>
                        <input type="file" name="food_picture" accept="image/*" capture="environment" required>
                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
                        <button type="submit">Upload Meal Photo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleFlip(event) {
            const card = event.currentTarget;
            card.classList.toggle('flipped');
        }
    </script>
</body>
</html>
