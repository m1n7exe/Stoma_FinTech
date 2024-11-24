<?php
// Add any PHP code here to handle session, authentication, etc.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .verify-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: auto;
        }
        .verify-container h1 {
            color: #32CD32; /* Lime green */
            margin-bottom: 20px;
        }
        .upload-input {
            margin-bottom: 20px;
        }
        .upload-input label {
            font-size: 1.1rem;
            color: #555;
        }
        .upload-input input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .submit-button {
            background-color: #32CD32;
            color: white;
            padding: 12px 24px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .submit-button:hover {
            background-color: #28a428;
        }
    </style>
</head>
<body>

    <div class="verify-container">
        <h1>Submit Your Photos for Verification</h1>
        <p>Please upload the necessary photos so we can verify your task submission.</p>
        
        <!-- Photo Upload Form -->
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="upload-input">
                <label for="photo">Upload Your Photo</label>
                <input type="file" name="photo" id="photo" accept="image/*" required>
            </div>
            
            <div class="upload-input">
                <label for="additional-info">Additional Information (Optional)</label>
                <textarea name="additional-info" id="additional-info" rows="4" placeholder="Any extra details?" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;"></textarea>
            </div>

            <button type="submit" class="submit-button">Submit for Verification</button>
        </form>
    </div>

</body>
</html>
