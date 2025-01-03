<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Incident Report</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/I_style.css">
</head>
<body class="incident_body">
    <div class="div1">
        <div>
            <div class="main-header">
                <h1>Incident Reports</h1>
                <!-- Search Bar -->
                <div class="search-container">
                    <img class="icon" src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-ios7-search-512.png" alt="Menu">
                    <input type="text" placeholder="Search..." onkeyup="searchIncident()">
                </div>
                <!-- Filter Button -->
                <button class="filter-button">
                    <img  class="img-button"src="https://cdn2.iconfinder.com/data/icons/app-user-interface-6/48/Filter-64.png" alt="Filter Button">
                </button>
                <!-- Refresh Button -->
                <button class="refresh-button" onclick="refreshPage()">⟳</button>
            </div>
            <div class="red-container">
                <!-- Add New Incident Button -->
                <button type="button" class="add-button" data-toggle="modal" data-target="#addIncidentModal">Add New Incident</button>        
            </div>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>Incident ID#</th>
                        <th>Driver ID#</th>
                        <th>Account ID#</th>
                        <th>Incident Type</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Severity</th>
                        <th>Date & Time</th>
                        <th>Response</th>
                        <th>Managed By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Database connection
                    $conn = new mysqli("localhost", "root", "", "cebus");

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetching data from the database
                    $sql = "SELECT incident_ID, driver_id, account_id, incident_type, location, severity, description, timestamp, response, managed_by  FROM incident";
                    $result = $conn->query($sql);

                    // Check for query success
                    if ($result === false) {
                        die("Query failed: " . $conn->error);
                    }

                    // Display results
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["incident_ID"] . "</td>
                                    <td>" . htmlspecialchars($row["driver_id"]) . "</td>
                                    <td>" . htmlspecialchars($row["account_id"]) . "</td>
                                    <td>" . htmlspecialchars($row["incident_type"]) . "</td>
                                    <td>" . htmlspecialchars($row["location"]) . "</td>
                                    <td>" . htmlspecialchars($row["severity"]) . "</td>
                                    <td>" . htmlspecialchars($row["description"]) . "</td>
                                    <td>" . $row["timestamp"] . "</td>
                                    <td>" . htmlspecialchars($row["response"]) . "</td>
                                    <td>" . htmlspecialchars($row["managed_by"]) . "</td>
                                    <td>
                                        <a href='edit.php?incident_ID=" . $row["incident_ID"] . "'>Edit</a> |
                                        <a href='delete.php?incident_ID=" . $row["incident_ID"] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No incidents found.</td></tr>";
                    }

                    // Close connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cebus";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $incident_id = $_POST['incident_id'];
            $driver_id = $_POST['driver_id'];
            $account_id = $_POST['account_id'];
            $incident_type = $_POST['incident_type'];
            $location = $_POST['location'];
            $severity = $_POST['severity'];
            $description = $_POST['description'];
            $timestamp = $_POST['timestamp'];
            $response = $_POST['response'];
            $managed_by = $_POST['managed_by'];
        
            $conn = new mysqli("localhost", "root", "", "cebus");
        
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            //Incident ID duplication check 
            $check_sql = "SELECT * FROM incident WHERE Incident_ID = '$incident_id'";
            $result = $conn->query($check_sql);

            if (!$result) {
                die("Error in query: " . $conn->error); 
            }

            if ($result->num_rows > 0) {
                echo "Caution: Please use a unique ID.";
            } else {
                $sql = "INSERT INTO incident (driver_id, account_id, Incident_Type, location, severity, Description, timestamp, response, managed_by) 
                        VALUES ( $driver_id, $account_id, '$incident_type', '$location', '$severity', '$description', '$timestamp', '$response', '$managed_by')";

                if ($conn->query($sql) === TRUE) {
                    echo "New incident added successfully!";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
                    $conn->close();
                }

    ?>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cebus";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT MAX(Incident_ID) AS max_id FROM incident";
        $result = $conn->query($sql);

        if (!$result) {
            die("SQL Error: " . $conn->error);
        }
        $row = $result->fetch_assoc();
        $next_id = isset($row['max_id']) ? $row['max_id'] + 1 : 1; 
    ?>
    

    <!-- Modal -->
    <div class="modal fade" id="addIncidentModal" tabindex="-1" aria-labelledby="addIncidentLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <img src="Bus LOGO.png" alt="Bus Logo">
                    <h5 class="modal-title" id="addIncidentLabel"> Add New Incident</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                    
                        <!-- Incident ID -->
                        <div class="form-group">
                            <label for="incident_id">Incident ID #:</label>
                            <input type="text" class="form-control" id="incident_id" name="incident_id" value="<?= $next_id ?>" required>
                        </div>
                        <!-- Driver ID -->
                        <div class="form-group">
                            <label for="driver_id">Driver ID #:</label>
                            <input type="text" class="form-control" id="driver_id" name="driver_id"  required>
                        </div>
                        <!-- Account ID -->
                        <div class="form-group">
                            <label for="account_id">Account ID #: </label>
                            <input type="text" class="form-control" id="account_id" name="account_id"  required>
                        </div>
                        <!-- Incident Type -->
                        <div class="form-group">
                            <label for="incident_type">Incident Type:</label>
                            <input type="text" class="form-control" id="incident_type" name="incident_type" required>
                        </div>
                        <!-- Location -->
                        <div class="form-group">
                            <label for="location">Location: </label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                        <!-- Severity -->
                        <div class="form-group">
                            <label for="severity">Severity: </label>
                            <input type="text" class="form-control" id="severity" name="severity"  required>
                        </div>
                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description: </label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <!-- timestamp-->
                        <div class="form-group">
                            <label for="Timestamp">Date and Time: </label>
                            <input type="datetime-local" class="form-control" id="timestamp" name="timestamp" value="<?= date('Y-m-d\TH:i') ?>" required>
                        </div>
                        <!--Response-->
                        <div class="form-group">
                            <label for="response">Response: </label>
                            <input type="type" class="form-control" id="response" name="response"  required>
                        </div>
                        <!-- Managed_by -->
                        <div class="form-group">
                            <label for="managed_by">Personnel ID #: </label>
                            <input type="text" class="form-control" id="managed_by" name="managed_by" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Add New Incident</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php $conn->close(); ?>



    <script>
         function refreshPage() {
            window.location.reload();
        }
        function searchIncident() {
            const input = document.getElementById("search").value.toLowerCase();
            console.log("Searching for:", input); 
        }

        function addNewIncident() {
            window.location.href = 'new_incident.php'; 
        }

    </script>
</body>
</html>
