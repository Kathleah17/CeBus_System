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
            <div class="right-section-r">

                <!-- header section starts  -->
                <?php include 'Components/cashier_Header.php'; ?>
                <!-- header section ends -->

                <div id="reloadTapCard" class="section">
                    <h2>Reload Tap Card</h2>
                    <form method="POST" action="">
                        <div class="form-group-r">
                            <label for="tap_card_num">Tap Card Number:</label>
                            <input type="text" id="tap_card_num" name="tap_card_num" required>
                            <br>
                            <label for="payment_method">Payment Method:</label>
                            <select id="payment_method" name="payment_method" required>
                                <option value="cash">Cash</option>
                                <option value="gcash">GCash</option>
                                <option value="paymaya">Paymaya</option>
                                <option value="paypal">PayPal</option>
                            </select>
                            <br>
                            <label for="amount">Amount:</label>
                            <input type="text" id="amount" name="amount" required>
                            <br>
                            <button type="submit" name="reload_card">Reload</button>
                        </div>
                    </form>
                </div>

                <!-- Modal for Reload Successmodal -->
                <div id="reloadSuccessModal" style="display: none;">
                    <div class="modal-content">
                        <h3>Reload Successful</h3>
                        <p>Your tap card has been reloaded successfully.</p>
                        <button onclick="closeModal()">Close</button>
                    </div>
                </div>
            </div> <!--end of right-section-r-->
    </div> <!--end of container-->
    
                <!-- FOOTER section starts  -->
                <?php include 'Components/cashier_Footer.php'; ?>
                <!-- FOOTER section ends -->
    <script>
        function showModal() {
        document.getElementById('reloadSuccessModal').style.display = 'block';
        }
        // Function to close the modal
        function closeModal() {
            document.getElementById('reloadSuccessModal').style.display = 'none';
        }
    </script>
</body>
</html>
