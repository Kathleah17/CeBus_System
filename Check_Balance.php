<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashier Site</title>
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
        <div class="right-section-cb">
            
            <!-- header section starts  -->
            <?php include 'Components/cashier_Header.php'; ?>
            <!-- header section ends -->

            <div id="checkBalance" class="section">
                <h2>Tap Card: Check Balance</h2>
                <form method="POST" action="">
                    <div class="form-group-cb">
                        <label for="tap_card_num">Tap Card Number:</label>
                        <input type="text" id="tap_card_num" name="tap_card_num" required>
                        <br>
                        <label for="amount">Name:</label>
                        <input type="text" id="amount" name="amount" required>
                        <br>
                        <button type="submit" name="reload_card">Check Balance</button>
                    </div>
                </form>
            </div>

        </div> <!--end of right-section-cb-->
    </div> <!--end of container-->

      <!-- FOOTER section starts  -->
      <?php include 'Components/cashier_Footer.php'; ?>
      <!-- FOOTER section ends -->

</body>
</html>
