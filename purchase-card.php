<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashier: Purchase Card</title>
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
    margin-top: 15%;
}
.right-section p {
    font-size: 15px;
    margin-bottom: 50px;

}
.form-group {
    display: flex;
    flex-direction: column;
    gap: 15px;
    max-width: 500px;
    padding-left: 80px;
    padding-top: 5px;
}
.form-group h2 {
    font-size: 15px;
    font-weight: 400;
    line-height: normal;
}
.form-group label {
    display: block;
    margin-bottom: 3px;
    color: #333;
    margin-top: -15px;
}
.form-group input {
    width: 75%;
    height: 20px;
    padding: 10px ;
    border: none;
    border-radius: 20px;
    background-color: #a2d2ff;
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
    padding: 20px; /**this inside the slected contnr. */
    margin-bottom: 10px;
    border: none;
    border-radius: 20px;
    background-color: #a2d2ff;
    color: #003049;
    font-size: 14px;
    appearance: none; 
    -webkit-appearance: none; 
    -moz-appearance: none; 
}
.form-group select:focus {
    outline: none;
    box-shadow: 0 0 5px #6b9bc3;
}
.form-group select {
    padding-right: 10px; /* Space for custom arrow */
    background-image: url('https://cdn0.iconfinder.com/data/icons/pinpoint-action/48/arrow-dropdown-64.png');
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 10px;
}
.form-group button {
    width: 50%;
    height: 15%;
    padding: 20px 0 20px 0;
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
    gap: 20px; 
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
    background-color: #80c1d8; 
    transform: scale(1.05);  
}
.nav-bar .button:active {
    background-color: #5fa9c3; 
    transform: scale(0.95); 
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
    top: 125px; 
    right: 0; 
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    width: 100px; 
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
.dropdown-container {
    width: 400px;
    position: relative;
    font-size: 14px;
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


            <div id="purchaseCard" class="section">
                <h2>Purchase Card</h2>
                    <form method="POST" action="">
                    <div class="form-group">
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

        </div><!--end of right-section-->
    </div> <!--end of container-->
    <footer>
        <p>© 2024. All rights reserved | Design by <span>Power Puff Girls</span></p>
    </footer>

    <script>
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