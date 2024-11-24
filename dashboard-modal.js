// Get the modal, button, and close elements
var modal = document.getElementById("deposit-modal");
var depositBtn = document.getElementById("deposit-btn");
var closeModal = document.getElementById("close-modal");
var totalMoneyDisplay = document.getElementById("total-money");

// Show the modal when the deposit button is clicked
depositBtn.onclick = function() {
    modal.style.display = "block";
}

// Close the modal when the 'x' is clicked
closeModal.onclick = function() {
    modal.style.display = "none";
}

// Close the modal if the user clicks anywhere outside of the modal
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Handle the form submission and update the total money
document.getElementById("deposit-form").onsubmit = function(event) {
    event.preventDefault(); // Prevent form submission

    // Get the deposit amount and selected method
    var depositAmount = parseFloat(document.getElementById("deposit-amount").value);
    var depositMethod = document.querySelector('input[name="deposit-method"]:checked')?.value;

    if (!depositAmount || depositAmount <= 0) {
        alert("Please enter a valid deposit amount.");
        return;
    }

    if (!depositMethod) {
        alert("Please select a deposit method.");
        return;
    }

    // Get the current total money (from the dashboard)
    var currentTotal = parseFloat(totalMoneyDisplay.textContent.replace('$', '').trim());
    if (isNaN(currentTotal)) {
        currentTotal = 0;
    }

    // Add the deposit amount to the total money
    var newTotal = currentTotal + depositAmount;
    
    // Update the total money display on the dashboard
    totalMoneyDisplay.textContent = "$" + newTotal.toFixed(2);

    // Close the modal
    modal.style.display = "none";

    // Optionally, alert user about successful deposit
    alert(`Deposited $${depositAmount.toFixed(2)} via ${depositMethod}.`);
}
