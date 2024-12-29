<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CeBUS E-Trail Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <!-- Left Section -->
        <div class="left-section">
            <div class="branding">
                <div class="logo-circle">
                    <img src="Bus LOGO.png" alt="Bus Logo">
                </div>
             </div>
                <p>Online Bus Ticket-Booking System</p>
        </div>

        <!-- Right Section -->
        <div class="right-section-c">
            <!-- header section starts  -->
            <?php include 'Components/cashier_Header.php'; ?>
            <!-- header section ends -->

            <div id="complaint" class="section">
                <h2>Complaint</h2>
                    <form method="POST" action="">
                        <div class="form-group-c">
                            <label for="name">Full Name:</label>
                            <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                        </div>
                        <div class="form-group-c">
                            <label for="email">Email Address:</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group-c">
                            <label for="category">Complaint Category:</label>
                            <select id="category" name="category" required>
                                <option value="">-- Select Category --</option>
                                <option value="service">Service Issue</option>
                                <option value="product">Product Issue</option>
                                <option value="billing">Billing Issue</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group-c">
                            <label for="complaint">Complaint Details:</label>
                            <textarea id="complaint" name="complaint" placeholder="Describe your issue..." required></textarea>
                            <button type="submit" class="submit-button">Submit Complaint</button>
                        </div>
                </form>
            </div>
        </div>
    </div> <!--end of container-->
      <!-- FOOTER section starts  -->
      <?php include 'Components/cashier_Footer.php'; ?>
      <!-- FOOTER section ends -->
</body>
</html>
