<?php
    // Include the header file to add the common navbar
    include('header.php');
?>
<!DOCTYPE html>
<html lang="en">

<style>
    /* General Styling */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
}

h1 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #2c3e50;
}

/* Account Container */
.account-container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

/* Account Details Section */
.account-details {
    margin-bottom: 30px;
}

.account-details p {
    font-size: 1rem;
    margin: 10px 0;
}

.account-details strong {
    color: #16a085;
}

/* Action Buttons */
.account-actions {
    display: flex;
    gap: 15px;
    justify-content: space-between;
}

.account-actions button {
    padding: 10px 20px;
    font-size: 1rem;
    cursor: pointer;
    border: none;
    border-radius: 4px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.account-actions button:hover {
    transform: scale(1.05);
}

.btn-edit {
    background-color: #27ae60;
    color: #fff;
}

.btn-edit:hover {
    background-color: #2ecc71;
}

.btn-change-password {
    background-color: #f39c12;
    color: #fff;
}

.btn-change-password:hover {
    background-color: #f1c40f;
}

.btn-logout {
    background-color: #e74c3c;
    color: #fff;
}

.btn-logout:hover {
    background-color: #c0392b;
}

/* Box Shadow and Card Styling */
.account-container {
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

/* Responsive Design for Mobile */
@media screen and (max-width: 768px) {
    .account-container {
        padding: 15px;
        width: 90%;
    }

    .account-actions {
        flex-direction: column;
        gap: 10px;
    }
}

</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Page</title>
    
   
<body>
    <!-- Account Section -->
    <div class="account-container">
        <h1>Account Settings</h1>
        <div class="account-details">
            <p><strong>Username:</strong> JohnDoe</p>
            <p><strong>Email:</strong> johndoe@example.com</p>
            <p><strong>Points Balance:</strong> 1200 Points</p>
        </div>

        <div class="account-actions">
            <button class="btn-edit">Edit Profile</button>
            <button class="btn-change-password">Change Password</button>
            <button class="btn-logout">Logout</button>
        </div>
    </div>

</body>
</html>
