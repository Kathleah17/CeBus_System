
<body>
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