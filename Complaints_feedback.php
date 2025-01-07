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
    $status = empty($response) ? 'progress' : 'solved';

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
    <meta name="viewport" Description="width=device-width, initial-scale=1.0">
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
                <th>Passenger</th>
                <th>Description</th>
                <th>Response</th>
                <th>timestamp of submission</th>
                <th>timestamp of update</th>
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
                            <span class="status-label solved">Solved</span>
                        <?php elseif ($row['status'] === 'progress'): ?>
                            <span class="status-label progress">In Progress</span>
                        <?php elseif ($row['status'] === 'pending'): ?>
                            <span class="status-label pending">Pending</span>
                        <?php else: ?>
                            <span class="status-label unknown">Unknown</span>
                        <?php endif; ?>
                    </td>

                    <td>
                        <button class="response-btn" data-id="<?= $row['id'] ?>" data-Category="<?= $row['type'] ?>" data-name="<?= $row['passenger'] ?>" data-Description="<?= $row['content'] ?>"  data-status="<?= $row['status'] ?>">Respond</button>
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
            <h2>AOT Response</h2>
            <form action="" method="POST">
                <input Category="hidden" name="id" id="response-id">
                <p><strong>ID:</strong> <span id="response-id-detail"></span></p>
                <p><strong>Category:</strong> <span id="response-Category"></span></p>
                <p><strong>Passenger Name:</strong> <span id="response-name"></span></p>
                <p><strong>Description:</strong> <span id="response-Description"></span></p>
                <p><strong>Time of Submission:</strong> <span id="response-timestamp of submission"></span></p>
                <p><strong>Status:</strong> <span id="response-status"></span></p>
                <textarea name="response" placeholder="Write your response..."></textarea><br>
                <button Category="submit">Submit Response</button>
                <button type="button" onclick="cancelResponse()">Cancel</button>
                </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="delete-modal" class="modal" style="display: none;">
        <div class="modal-Description">
            <span class="close-btn" onclick="closeModal('delete-modal')">&times;</span>
            <h2>Are you sure you want to delete this record?</h2>
            <form action="" method="POST">
                <input Category="hidden" name="delete-id" id="delete-id">
                <button Category="submit" name="delete">Yes, Delete</button>
                <button Category="button" onclick="closeModal('delete-modal')">Cancel</button>
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
// Open the response modal with relevant data
document.querySelectorAll('.response-btn').forEach(button => {
    button.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        const Category = this.getAttribute('data-Category');
        const name = this.getAttribute('data-name');
        const Description = this.getAttribute('data-Description');
        const status = this.getAttribute('data-status');

        document.getElementById('response-id').value = id;
        document.getElementById('response-id-detail').textDescription = id;
        document.getElementById('response-Category').textDescription = Category;
        document.getElementById('response-name').textDescription = name;
        document.getElementById('response-Description').textDescription = Description;
        document.getElementById('response-status').textDescription = status;

        

        document.getElementById('response-modal').style.display = 'block';
    });
});

function openResponseModal(details) {
    // Populate the modal fields with data from the clicked tuple
    document.getElementById('response-id-detail').innerText = details.id;
    document.getElementById('response-id').value = details.id;
    document.getElementById('response-Category').innerText = details.category;
    document.getElementById('response-name').innerText = details.name;
    document.getElementById('response-Description').innerText = details.description;
    document.getElementById('response-timestamp of submission').innerText = details.dateTime;
    document.getElementById('response-status').innerText = details.status;

    // Display the modal
    document.getElementById('response-modal').style.display = 'block';
}

// Open the delete modal with relevant data
document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        document.getElementById('delete-id').value = id;

        document.getElementById('delete-modal').style.display = 'block';
    });
});
function cancelResponse() {
    // Reset form fields
    document.getElementById('response-id').value = '';
    document.getElementById('response-id-detail').innerText = '';
    document.getElementById('response-Category').innerText = '';
    document.getElementById('response-name').innerText = '';
    document.getElementById('response-Description').innerText = '';
    document.getElementById('response-timestamp of submission').innerText = '';
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
