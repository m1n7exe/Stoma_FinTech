<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* General Reset */
        * { 
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f7fa; /* Light background */
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }

        /* Dashboard Container */
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header */
        header {
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            color: #32CD32; /* Lime green */
            margin-bottom: 30px;
        }

        /* Card Container for Money and Points */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }

        /* Individual Card Styling */


.card {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 48%; /* Cards take up 48% of the available width */
    padding: 20px;
    text-align: center;
    font-size: 1.5rem;
    color: #333;
}

.card h3 {
    margin-bottom: 10px;
    color: #32CD32;
}

/* Adjust the spacing and size for the transaction buttons */
.transaction-buttons {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 15px;  /* Reduce the gap between the buttons */
    margin-top: 20px;
}

.transaction-button {
    text-decoration: none;
    background-color: #32CD32; /* Use a green color */
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 48%; /* Buttons take up 48% of the available width, same as cards */
    padding: 12px 20px; /* Adjust padding for optimal button size */
    text-align: center;
    font-size: 1.2rem;  /* Reduce font size */
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease; /* Smooth transition for hover */
}

/* Hover effect for buttons */
.transaction-button:hover {
    background-color: #28a745; /* Darker green when hovered */
}

/* Chart card - placed below the other two */
#usage-card {
    width: 48%; /* Full width on the next row */
    padding: 20px;
    margin-top: 20px; /* Space from the cards above */
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Canvas size for the usage chart */
#usage-chart {
    width: 10px;
    height: 20px; /* Set the height of the chart */
}


        /* Task List Container */
        .task-list {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .task-list h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #32CD32;
        }

        .task {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .task p {
            font-size: 1.2rem;
            color: #555;
        }

        .verify-button {
            padding: 8px 16px;
            background-color: #32CD32;
            color: white;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .verify-button:hover {
            background-color: #28a428;
        }



        

        /* Responsive Design */
        @media (max-width: 768px) {
            .card-container {
                flex-direction: column;
                align-items: center;
            }

            .card {
                width: 100%;
                margin-bottom: 20px;
            }

            .task {
                flex-direction: column;
                align-items: flex-start;
            }

            .verify-button {
                margin-top: 10px;
                width: 100%;
            }

            .transaction-buttons {
                flex-direction: column;
            }

            .transaction-button {
                width: 100%;
                margin-bottom: 10px;
            }
        }






        /* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Black with opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fff;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 40%; /* Adjust width as needed */
}

/* Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* Button Styling */
.transaction-button, .transfer-btn {
    background-color: #4CAF50; /* Green */
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    text-align: center;
}

.transaction-button:hover, .transfer-btn:hover {
    background-color: #45a049;
}

/* Form inputs */
input[type="number"], input[type="radio"] {
    margin-bottom: 10px;
}

    </style>
</head>
<body>

    <div class="dashboard-container">
        <header>
            Dashboard
        </header>

        <!-- Card Container: Total Money and Points -->
        <div class="card-container">
            <div class="card" id="total-money-card">
                <h3>Total Money</h3>
                <p id="total-money">$0.00</p>
        </div>
        
        <div class="card" id="total-points-card">
            <h3>Total Points</h3>
            <p>0 Points</p>
        </div>
    </div>


        </div>
        <!-- Transaction Buttons: Withdraw and Deposit -->
        <div class="transaction-buttons">
            <a href="#" class="transaction-button" id = "deposit-btn"> Deposit</a>
            <a href="#" class="transaction-button">Withdraw</a>
        </div>

        <div class="card" id="usage-card">
            <h3>Usage vs Carbon Footprint</h3>
            <canvas id="usage-chart"></canvas> <!-- Graph will be rendered here -->
        </div>


        <!-- Task List Section -->

        <div class="task-list">
            <h2>Tasks to Gain Points</h2>
            <div class="task">
                <p>Complete survey about new product</p>
                <a href="verify.php" class="verify-button">Verify</a>
            </div>
            <div class="task">
                <p>Watch tutorial video on features</p>
                <a href="verify.php" class="verify-button">Verify</a>
            </div>
            <div class="task">
                <p>Refer a friend to the platform</p>
                <a href="verify.php" class="verify-button">Verify</a>
            </div>
            <div class="task">
                <p>Complete a quiz on platform usage</p>
                <a href="verify.php" class="verify-button">Verify</a>
            </div>
        </div>
    </div>

    <!-- Modal for Deposit -->
    <div id="deposit-modal" class="modal">
        <div class="modal-content">
            <span id="close-modal" class="close">&times;</span>
            <h2>Deposit Amount</h2>
            <form id="deposit-form">
                <label for="deposit-amount">Enter Amount to Deposit:</label>
                <input type="number" id="deposit-amount" name="deposit-amount" required>

                <h3>Choose Deposit Method:</h3>
                <label for="deposit-method-1">
                    <input type="radio" id="deposit-method-1" name="deposit-method" value="Credit Card" required> Credit Card
                </label><br>
                <label for="deposit-method-2">
                    <input type="radio" id="deposit-method-2" name="deposit-method" value="Bank Transfer"> Bank Transfer
                </label><br>
                <label for="deposit-method-3">
                    <input type="radio" id="deposit-method-3" name="deposit-method" value="PayPal"> PayPal
                </label><br>

                <button type="submit" class="transfer-btn">Transfer</button>
            </form>
        </div>
    </div>

    <script src="dashboard-modal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="dashboard.js"></script>


</body>
</html>
