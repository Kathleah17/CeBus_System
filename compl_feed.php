<?php
session_start(); // Start session for flash messages

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cebus";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle response submission
if (isset($_POST['response']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $response = $_POST['response'];

    // Determine the status based on response
    $status = !empty($response) ? 'solved' : 'progress';

    // Update the response and status in the database
    $stmt = $conn->prepare("UPDATE complaints_feedbacks SET response = ?, status = ?, updated_at = NOW() WHERE id = ?");
    $stmt->bind_param("ssi", $response, $status, $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Response added successfully!";
    } else {
        $_SESSION['message'] = "Error: " . $stmt->error;
    }

    $stmt->close();

    // Redirect to the same page to prevent resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Handle delete action
if (isset($_POST['delete-id'])) {
    $deleteId = $_POST['delete-id'];

    $stmt = $conn->prepare("DELETE FROM complaints_feedbacks WHERE id = ?");
    $stmt->bind_param("i", $deleteId);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Record deleted successfully!";
    } else {
        $_SESSION['message'] = "Error: " . $stmt->error;
    }

    $stmt->close();

    // Redirect to the same page to prevent resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Fetch all complaints and feedbacks
$result = $conn->query("SELECT * FROM complaints_feedbacks");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Complaints and Feedbacks</title>
    <link rel="stylesheet" href="css/I_style.css">
    <link rel="stylesheet" href="css/II_style.css">
</head>
<body class="incident_body">
<div class="div1">
    <h1>Complaints and Feedbacks</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Passenger Name</th>
                <th>Description</th>
                <th>Response</th>
                <th>Admin Received at</th>
                <th>Admin Responded at</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['type'] ?></td>
                    <td><?= $row['passenger'] ?></td>
                    <td><?= $row['content'] ?></td>
                    <td><?= $row['response'] ?: "No response yet" ?></td>
                    <td><?= $row['created_at'] ?></td>
                    <td><?= $row['updated_at'] ?></td>
                    <td>
                    <?php if ($row['status'] === 'solved'): ?>
                            <span class="status-label solved">SOLVED</span>
                        <?php elseif ($row['status'] === 'progress'): ?>
                            <span class="status-label progress">IN PROGRESS</span>
                        <?php elseif ($row['status'] === 'pending'): ?>
                            <span class="status-label pending">PENDING</span>
                        <?php else: ?>
                            <span class="status-label unknown">NEW</span>
                        <?php endif; ?>
                    </td>

                    <td>
                    <div id="button-container"></div>

                        <button class="response-btn" data-id="<?= $row['id'] ?>" data-category="<?= $row['type'] ?>" data-name="<?= $row['passenger'] ?>" data-description="<?= $row['content'] ?>" data-timestamp="<?= $row['updated_at'] ?>" data-status="<?= $row['status'] ?>">Respond</button>
                        <button class="delete-btn" data-id="<?= $row['id'] ?>">Delete</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Response Modal -->
    <div id="response-modal" class="modal" style="display: none;">
        <div class="modal-Description">
            <span class="close-btn" onclick="closeModal('response-modal')">&times;</span>
            <h2>Admin Response</h2>
            <form action="" method="POST">
                <input type="hidden" name="id" id="response-id">
                <p><strong>ID:</strong> <span id="response-id-detail"></span></p>
                <p><strong>Category:</strong> <span id="response-category"></span></p>
                <p><strong>Passenger Name:</strong> <span id="response-name"></span></p>
                <p><strong>Description:</strong> <span id="response-description"></span></p>
                <p><strong>Time of Submission:</strong> <span id="response-timestamp"></span></p>
                <p><strong>Status:</strong> <span id="response-status"></span></p>

                <textarea name="response" placeholder="Write your response..."></textarea><br>
                <button type="submit">Submit Response</button>
                <button type="button" onclick="cancelResponse()">Cancel</button>
            </form>
        </div>
    </div>

     
    <!-- Delete Confirmation Modal -->
    <div id="delete-modal" class="modal" style="display: none;">
        <div class="modal-description">
            <span class="close-btn" onclick="closeModal('delete-modal')">&times;</span>
            <h2>Are you sure you want to delete this record?</h2>
            <form action="" method="POST">
                <input type="hidden" name="delete-id" id="delete-id">
                <button type="submit" name="delete">Yes, Delete</button>
                <button type="button" onclick="closeModal('delete-modal')">Cancel</button>
            </form>
        </div>
    </div>

    <?php if (isset($_SESSION['message'])): ?>
    <div class="message">
        <?= $_SESSION['message']; ?>
        <?php unset($_SESSION['message']); // Clear message after displaying ?>
    </div>
    <?php endif; ?>
</div>

<script>
    document.querySelectorAll('.response-btn').forEach(button => {
    button.addEventListener('click', function () {
        // Access data-* attributes dynamically
        const { id, category, name, description, timestamp, status } = this.dataset;

        // Populate modal with the fetched data
        document.getElementById('response-id').value = id; // Hidden field
        document.getElementById('response-id-detail').innerText = id;
        document.getElementById('response-category').innerText = category;
        document.getElementById('response-name').innerText = name;
        document.getElementById('response-description').innerText = description;
        document.getElementById('response-timestamp').innerText = timestamp;
        document.getElementById('response-status').innerText = status;

        // Show the modal
        document.getElementById('response-modal').style.display = 'block';
    });
});

    // Open the delete modal with relevant data
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            document.getElementById('delete-id').value = id;

            document.getElementById('delete-modal').style.display = 'block';
        });
    });

    function cancelResponse() {
        // Reset form fields
        document.getElementById('response-id').value = '';
        document.getElementById('response-id-detail').innerText = '';
        document.getElementById('response-category').innerText = '';
        document.getElementById('response-name').innerText = '';
        document.getElementById('response-description').innerText = '';
        document.getElementById('response-timestamp').innerText = '';
        document.getElementById('response-status').innerText = '';

        // Close the modal
        closeModal('response-modal');
    }

    // Close the modal
    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }
</script>
</body>
</html>

<?php
$conn->close();
?>
