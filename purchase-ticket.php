<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casheir: Purchase Ticket</title>
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
        <div class="right-section-pt">

           <!-- header section starts-->
           <?php include 'Components/cashier_Header.php'; ?>
            <!-- header section ends -->

        
        <div id="ticketPurchase" class="section">
        <h2>Purchase Ticket</h2>
                <form action="" method="POST">
                    <div class="form-group-pt-inner">
                <div class="form-group-pt">
                    <label for="from">From:</label>
                    <input type="text" id="from" name="from" value="Cebu Terminal" readonly>
                </div>
                <div class="form-group-pt">
                    <label for="to">To:</label>
                    <select id="to" name="to" required>
                        <option value="Toledo City">Toledo City</option>
                        <option value="Moalboal">Moalboal</option>
                        <option value="Oslob">Oslob</option>
                        <option value="Dalaguete">Dalaguete</option>
                        <option value="Santander">Santander</option>
                        <option value="Argao">Argao</option>
                        <option value="Barili">Barili</option>
                        <option value="Carcar City">Carcar City</option>
                        <option value="Naga City">Naga City</option>
                        <option value="Alcoy">Alcoy</option>
                        <option value="Minglanilla">Minglanilla</option>
                    </select>
                </div>
                <div class="form-group-pt">
                    <label for="bus_type">Bus Type:</label>
                    <select id="bus_type" name="bus_type" required>
                        <option value="Aircon">Aircon</option>
                        <option value="Non-Aircon">Non-Aircon</option>
                    </select>
                </div>
                <div class="form-group-pt">
                    <label for="bus_company">Bus Type:</label>
                    <select id="bus_company" name="bus_company" required>
                        <option value="Gabe">Gabe</option>
                        <option value="Ceres">Ceres</option>
                    </select>
                </div>
                    <div class="form-group-pt">
                        <label for="special">Special Passenger:</label>
                        <select id="special" name="special">
                            <option value="none">None</option>
                            <option value="pwd">PWD</option>
                            <option value="student">Student</option>
                            <option value="pregnant">Pregnant</option>
                        </select>
                    </div>
                    <div class="form-group-pt">
                        <label for="group_size">Number of Passengers:</label>
                        <input type="number" id="group_size" name="group_size" required>
                    </div>
                    <div class="form-group-pt">
                    <label for="payment_method">Payment Method:</label>
                    <select id="payment_method" name="payment_method" required>
                        <option value="cash">Cash</option>
                        <option value="gcash">GCash</option>
                        <option value="paymaya">Paymaya</option>
                        <option value="paypal">PayPal</option>
                    </select>
                </div>
                
                <div class="form-group-pt">
                    <label for="total_payment">Total Payment:</label>
                    <input type="text" id="total_payment" name="total_payment" readonly> 
                    <button type="submit" name="purchase_ticket">Purchase Ticket</button>
                    </div>
                    </div>  <!-- END OF FORM-INNER GROUP-->   
                </form>
        </div>
        </div>  <!-- right section--> 
        </div> <!--end of container-->   
       
        <!-- FOOTER section starts  -->
        <?php include 'Components/cashier_Footer.php'; ?>
        <!-- FOOTER section ends -->

        <script>

            document.getElementById('to').addEventListener('change', function() {
                const to = this.value;
                const special = document.getElementById('special').value;
                const groupSize = parseInt(document.getElementById('group_size').value) || 1;

                const fareList = {
                    "Toledo City": 60,
                    "Moalboal": 120,
                    "Oslob": 145,
                    "Dalaguete": 180,
                    "Santander": 170,
                    "Argao": 100,
                    "Barili": 80,
                    "Carcar City": 60,
                    "Naga City": 40,
                    "Alcoy": 78,
                    "Minglanilla": 50
                };

                let discount = (special === "pwd" || special === "student" || special === "pregnant") ? 0.2 : 0;
                let total = groupSize * fareList[to] * (1 - discount);

                document.getElementById('total_payment').value = total.toFixed(2);
            });

        </script>
    </body>
    </html>
