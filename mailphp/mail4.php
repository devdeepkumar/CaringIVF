<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $phone = htmlspecialchars(trim($_POST['phone']));

   

    // Recipient email address
    $to = "devdeepkr734@gmail.com"; // Replace with your email address

    // Email subject
    $subject = "New Schedule Request from $name";

    // Email body content
    $message = "
    <html>
    <head>
        <title>New Schedule Request</title>
    </head>
    <body>
        <h2>New Schedule Request</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Phone Number:</strong> $phone</p>
    </body>
    </html>
    ";

    // Email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: info@caringhandsivf.com" . "\r\n"; // Replace with your domain email address

   // Send email
    if (mail($to, $subject, $message, $headers)) {
        // Email sent successfully, show Thank You message
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Thank You</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f9;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                }

                .thank-you-container {
                    text-align: center;
                    background-color: white;
                    border-radius: 10px;
                    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
                    padding: 30px;
                    width: 300px;
                }

                h2 {
                    color:  #705494;
                    margin-bottom: 20px;
                }

                p {
                    font-size: 16px;
                    margin-bottom: 20px;
                    color: #555;
                }

                .btn {
                    padding: 10px 20px;
                    margin: 10px;
                    font-size: 16px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    transition: all 0.3s ease;
                }

                .go-back {
                    background-color:rgb(170, 158, 185);
                    color: white;
                }

                .go-back:hover {
                    background-color: #705494;
                }

    
            </style>
        </head>
        <body>

            <div class='thank-you-container'>
                <h2>Thank You!</h2>
                <p>Your appointment request has been sent successfully.</p>
                <button class='btn go-back' onclick='window.history.back();'>Back to home</button>
                
            </div>

            <script>
                // Redirect to your website after 5 seconds if no button is clicked
                setTimeout(function() {
                    window.location.href = 'https://caringhandsivf.com';  
                }, 5000);
            </script>

        </body>
        </html>
        ";
        exit;
    } else {
        echo "There was a problem sending your appointment request. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
