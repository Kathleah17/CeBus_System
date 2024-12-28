<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casheir: Purchase Ticket</title>
    <style>
    
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}
.container {
    display: flex;
    width: 1920px auto;
    height: 950px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
} 
.branding .logo-circle {
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, #ffa500, #ff6b00);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
}
.branding .logo-circle img {
    width: 6500px;
    height: auto;
}
.left-section {
    width: 40%;
    background-color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 20px;
    margin-left: 10px;
}
.left-section .icon {
    font-size: 50px;
    margin-bottom: 10px;
}
.left-section h1 {
    font-size: 35px;
    font-weight: bold;
    margin-bottom: 10px;
    line-height: 1.2;
}
.left-section p {
    font-size: 20px;
    color: black;
    left: -40px;
    margin-top: 150px;
    font-weight:bold;
}
.right-section {
    background-color: #d4e7f7;
    flex: 1;
    padding: 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.right-section h2 {
    font-size: 30px;
    margin-bottom: 20px;
    margin-top: 25%;
}
.right-section p {
    font-size: 13px;

}
.form-group {
    display: flex;
    flex-direction: column;
    gap: 15px;
    max-width: 500px;
    padding-left: 80px;
    padding-top: 5px;
}
.form-group-inner {
    display: flex;
    flex-direction: column;
    gap: 15px;
    width: 1920px auto;
    height: 650px;
    padding-left: 80px;
    padding-top: 35px;
    overflow-y:scroll;
    padding-bottom: 8%;
}
.form-group h2 {
    font-size: 12px;
    font-weight: 400;
    line-height: normal;
}
.form-group label {
    display: block;
    margin-bottom: 3px;
    color: #333;
    font-size: 13px;
}
.form-group input {
    width: 75%;
    height: 20px;
    padding: 10px ;
    margin-bottom: 5px;
    border: none;
    border-radius: 20px;
    background-color: #a2c1e1;
    color: #003049;
    font-size: 14px;
}
.form-group input::placeholder {
    color: #003049;
    padding: 15px;
}
.form-group select {
    width: 80%;
    height: 40px;
    padding: 10px; /**this inside the slected contnr. */
    margin-bottom: 10px;
    border: none;
    border-radius: 20px;
    background-color: #a2c1e1;
    color: #003049;
    font-size: 14px;
    appearance: none; /* For hiding default dropdown arrow */
    -webkit-appearance: none; /* For Safari */
    -moz-appearance: none; /* For Firefox */
}
.form-group select:focus {
    outline: none;
    box-shadow: 0 0 5px #6b9bc3;
}
.form-group select {
    padding-right: 30px; /* Space for custom arrow */
    background-image: url('https://cdn0.iconfinder.com/data/icons/pinpoint-action/48/arrow-dropdown-64.png');
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 10px;
}
.form-group button  {
    width: 50%;
    height: 15%;
    padding: 20px 0 40px 0;
    background-color: #005b9a;
    color: white;
    font-size: 18px;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin: 5% 0 5% 0;
    
}
.form-group button:hover {
    background-color: #004175;
}
.real-time {
    font-size: 24px;
    margin-top: 30px;
    margin-bottom: 30px;
    font-weight: bold;
}
.nav-bar {
    display: flex;
    justify-content: center;
    gap: 20px; /* Space between buttons */
    margin: 5px 0;
}
.nav-bar .button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #aad8ea;
    color: #000;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
    border-radius: 25px;
    border: 2px solid #80c1d8;
    text-align: center;
    transition: background-color 0.3s, transform 0.2s;
}
.nav-bar .button:hover {
    background-color: #80c1d8; /* Hover effect */
    transform: scale(1.05);   /* Slight scaling effect */
}
.nav-bar .button:active {
    background-color: #5fa9c3; /* Active (pressed) effect */
    transform: scale(0.95);   /* Slight shrinking effect */
}
.menu-button {
    background-color: transparent;
    border: none;
    cursor: pointer;
    padding: 5px;
    border-radius: 20%;
    transition: background-color 0.3s ease;
}
.menu-button:hover {
    background-color: #bde0fe; 
}
.menu-icon {
    width: 25px;
    height: 25px;
}
.dropdown-menu {
    display: none;
    position: absolute; 
    top: 120px; 
    right: 0; 
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    width: 100px; 
}
.dropdown-menu.show {
    display: block; 
}
.dropdown-menu li {
    list-style: none;
    padding: 7px;
    cursor: pointer;
    text-align: left;
    border-bottom: 1px solid #e0e0e0;
}
.dropdown-menu li:hover {
    background-color: #f0f4f8;
}
.red-container { /**top/ header conaitns menu and time */
    background-color:#d4e7f7;
    position: fixed; 
    top: 0; 
    right: 0; 
    height: 152px; 
    padding: 10px; /**if you adjust this one it will change the whole container */
    width: 1109px; 
    z-index: 1;
}
/* Modal Styling */
.modal-content {
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    background-color: #8ecae6;
    color: #333;
    display: none;
}

.modal-header {
    background-color: #0077b6; /* Success green */
    color: #fff;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    padding: 15px 20px;
}

.modal-title {
    font-size: 18px;
    font-weight: bold;
}

.btn-close {
    background-color: transparent;
    border: none;
    font-size: 1.2rem;
    color: #fff;
    opacity: 0.7;
    cursor: pointer;
}

.btn-close:hover {
    opacity: 1;
}

.modal-body {
    padding: 20px;
    font-size: 16px;
    line-height: 1.5;
    color: #333;
    text-align: center;
}

.modal-footer {
    background-color: #f9f9f9;
    border-top: 1px solid #ddd;
    padding: 10px 20px;
    text-align: center;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}

.modal-footer .btn-secondary {
    background-color: #6c757d;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.modal-footer .btn-secondary:hover {
    background-color: #5a6268;
    color: #fff;
}
.modal.fade .modal-dialog {
    transition: transform 0.3s ease-out, opacity 0.3s ease-out;
}
.modal.fade.show .modal-dialog {
    transform: translate(0, 0);
    opacity: 1;
}

footer {
    text-align: center;
    font-size: 12px;
    margin-top: 20px;
}
footer span {
    font-weight: bold;
    text-transform: uppercase;
}
</style>
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
        <div class="right-section">
            <div class="red-container">

            <!-- Real-time Clock -->
            <div class="real-time" id="realTimeClock"></div>

            <!-- Navigation Buttons -->
            <div class="nav-bar">
                <a href="purchase-ticket.php" class="button">Purchase Ticket</a>
                <a href="reload_card.php" class="button">Reload Tap Card</a>
                <a href="purchase-card.php" class="button">Purchase Tap Card</a>
                <a href="Check_Balance.php" class="button">Check Balance</a>
                <a href="complaint.php" class="button">Complaint</a>
                <button class="menu-button" onclick="toggleDropdown()">
                <img 
                    class="menu-icon" 
                    src="https://cdn1.iconfinder.com/data/icons/jumpicon-basic-ui-glyph-1/32/-_Hamburger-Menu-More-Navigation--256.png" 
                    alt="Menu"
                >
                </button>
                <!-- Dropdown menu -->
                <ul class="dropdown-menu" id="dropdownMenu">
                    <li onclick="accountInfo()">Account Info</li>
                    <li onclick="settings()">Settings</li>
                    <li onclick="logOut()">Log Out</li>
                </ul>
            </div>
            </div>

        
        <div id="ticketPurchase" class="section">
        <h2>Purchase Ticket</h2>
                <form action="" method="POST">
                    <div class="form-group-inner">
                <div class="form-group">
                    <label for="from">From:</label>
                    <input type="text" id="from" name="from" value="Cebu Terminal" readonly>
                </div>
                <div class="form-group">
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
                <div class="form-group">
                    <label for="bus_type">Bus Type:</label>
                    <select id="bus_type" name="bus_type" required>
                        <option value="Aircon">Aircon</option>
                        <option value="Non-Aircon">Non-Aircon</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bus_company">Bus Type:</label>
                    <select id="bus_company" name="bus_company" required>
                        <option value="Gabe">Gabe</option>
                        <option value="Ceres">Ceres</option>
                    </select>
                </div>
                    <div class="form-group">
                        <label for="special">Special Passenger:</label>
                        <select id="special" name="special">
                            <option value="none">None</option>
                            <option value="pwd">PWD</option>
                            <option value="student">Student</option>
                            <option value="pregnant">Pregnant</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="group_size">Number of Passengers:</label>
                        <input type="number" id="group_size" name="group_size" required>
                    </div>
                    <div class="form-group">
                    <label for="payment_method">Payment Method:</label>
                    <select id="payment_method" name="payment_method" required>
                        <option value="cash">Cash</option>
                        <option value="gcash">GCash</option>
                        <option value="paymaya">Paymaya</option>
                        <option value="paypal">PayPal</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="total_payment">Total Payment:</label>
                    <input type="text" id="total_payment" name="total_payment" readonly> 
                    <button type="submit" name="purchase_ticket">Purchase Ticket</button>
                    </div>
                    </div>  <!-- END OF FORM-INNER GROUP-->   
                </form>
        </div>
        </div>  <!-- right section--> 
        </div> <!--end of container-->   
        <footer>
            <p>© 2024. All rights reserved | Design by <span>Power Puff Girls</span></p>
        </footer>

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
          
            // Function to update real-time clock
            function updateClock() {
                const clockElement = document.getElementById('realTimeClock');
                const now = new Date();
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
                clockElement.textContent = now.toLocaleDateString('en-US', options);
            }
            // Update clock every second
            setInterval(updateClock, 1000);
            updateClock();

            // Placeholder function for navigation buttons
            function showSection(section) {
                alert(`Navigate to: ${section}`);
            }
            // Function to toggle the dropdown menu visibility
            function toggleDropdown() {
                const dropdown = document.getElementById("dropdownMenu");
                dropdown.classList.toggle("show");
            }
            // Functions for menu options
            function accountInfo() {
                alert("Account Info selected");
            }
            function settings() {
                alert("Settings selected");
            }
            function logOut() {
                alert("Log Out selected");
            }
            // Close dropdown if user clicks outside the menu
            window.onclick = function(event) {
                const dropdown = document.getElementById("dropdownMenu");
                if (!event.target.closest(".menu-button")) {
                    dropdown.classList.remove("show");
                }
            };

           
        </script>
    </body>
    </html>
