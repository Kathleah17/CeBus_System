<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashier: Purchase Card</title>
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
        <div class="right-section-pc">
            <!-- header section-pc starts  -->
            <?php include 'Components/cashier_Header.php'; ?>
            <!-- header section-pc ends -->


            <div id="purchaseCard" class="section-pc">
                <h2>Purchase Card</h2>
                    <form method="POST" action="">
                    <div class="form-group-pc">
                        <label for="card_name">Name:</label>
                        <input type="text" id="name" name="name" required>
                        <br>
                        <label for="Contact">Phone Number:</label>
                        <input type="text" id="contact" name="contact" required>
                        <br>
                        <label for="Address">Address:</label>
                        <input type="text" id="Street" name="Street" placeholder="Street"   >
                        <input type="text" id="City" name="City" placeholder="City" required>
                        <input type="text" id="Barangay" name="Barangay" placeholder="Barangay" required>
                        <br>
                        <label for="amount">Amount:</label>
                        <input type="number" id="amount" name="amount" required>
                        <br>
                        <button type="submit" name="purchase_card">Purchase</button>
                    </div>
                    </form>
            </div>

        </div><!--end of right-section-pc-->
    </div> <!--end of container-->

      <!-- FOOTER section-pc starts  -->
      <?php include 'Components/cashier_Footer.php'; ?>
      <!-- FOOTER section-pc ends -->
</body>
</html>
