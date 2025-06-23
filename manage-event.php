<?php
session_start();
include("connect.php");

if (!isset($_SESSION['hospital_id'])) {
    header("Location: login.php");
    exit;
}

$hospital_id = $_SESSION['hospital_id'];
$event_id = $_GET['event_id'] ?? '';
$action = $_GET['action'] ?? '';
$success = "";
$error = "";

if (empty($event_id) || !in_array($action, ['edit', 'delete'])) {
    die("Invalid request.");
}

$stmt = $conn->prepare("SELECT e.* FROM event e 
    JOIN event_management em ON e.event_id = em.event_id 
    WHERE em.event_id = ? AND em.hospital_id = ?");
$stmt->bind_param("si", $event_id, $hospital_id);
$stmt->execute();
$result = $stmt->get_result();
$event = $result->fetch_assoc();

if (!$event) {
    die("Event not found or not accessible.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['action'] === 'edit') {
        $name = $_POST['event_name'];
        $details = $_POST['event_details'];
        $start = $_POST['starttime'];
        $end = $_POST['endtime'];
        $location = $_POST['location'];
        $state = $_POST['state'];
        $district = $_POST['district'];
        $date = $_POST['event_date'];
        $newImagePath = $event['image_path'];

        if (isset($_FILES['event_image']) && $_FILES['event_image']['error'] === UPLOAD_ERR_OK) {
            $tmp = $_FILES['event_image']['tmp_name'];
            $nameImage = uniqid() . "_" . basename($_FILES['event_image']['name']);
            $type = mime_content_type($tmp);
            $size = $_FILES['event_image']['size'];

            if (!in_array($type, ['image/jpeg', 'image/png', 'image/gif'])) {
                echo "<script>alert('Invalid image type.');</script>";
            } elseif ($size > 2 * 1024 * 1024) {
                echo "<script>alert('Image must be under 2MB.');</script>";
            } else {
                $newImagePath = "eventimg/" . $nameImage;
                move_uploaded_file($tmp, $newImagePath);

                if ($newImagePath !== $event['image_path'] && file_exists($event['image_path'])) {
                    unlink($event['image_path']);
                }
            }
        }

        $stmt = $conn->prepare("UPDATE event 
            SET event_name=?, event_details=?, starttime=?, endtime=?, location=?, state=?, district=?, event_date=?, image_path=? 
            WHERE event_id=?");
        $stmt->bind_param("ssssssssss", $name, $details, $start, $end, $location, $state, $district, $date, $newImagePath, $event_id);
        $stmt->execute();

        echo "<script>alert('Event updated successfully'); window.location='event.php';</script>";
        exit;
    }

    if ($_POST['action'] === 'delete') {
        if (file_exists($event['image_path'])) unlink($event['image_path']);

        $stmt1 = $conn->prepare("DELETE FROM event_management WHERE event_id=?");
        $stmt1->bind_param("s", $event_id);
        $stmt1->execute();

        $stmt2 = $conn->prepare("DELETE FROM event WHERE event_id=?");
        $stmt2->bind_param("s", $event_id);
        $stmt2->execute();

        echo "<script>alert('Event deleted successfully'); window.location='event.php';</script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Event</title>
    <link rel="stylesheet" href="manage-event.css">
</head>
<body>
<?php include("navbar.php"); ?>
<main>
    <h2><?= ucfirst($action) ?> Event</h2>

    <?php if ($action === 'edit'): ?>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="edit">

            <label>Current Image:</label><br>
            <img src="<?= $event['image_path'] ?>" width="250"><br><br>

            <label>Replace Image:</label><br>
            <input type="file" name="event_image" accept="image/*"><br><br>

            <label>Event Name:</label><br>
            <input type="text" name="event_name" value="<?= htmlspecialchars($event['event_name']) ?>" required><br><br>

            <label>Description:</label><br>
            <textarea name="event_details"><?= htmlspecialchars($event['event_details']) ?></textarea><br><br>

            <label>Date:</label><br>
            <input type="date" name="event_date" value="<?= $event['event_date'] ?>" required><br><br>

            <label>Start Time:</label>
            <input type="time" name="starttime" value="<?= $event['starttime'] ?>" required><br>

            <label>End Time:</label>
            <input type="time" name="endtime" value="<?= $event['endtime'] ?>" required><br><br>

            <label>State:</label><br>
            <input type="text" name="state" value="<?= htmlspecialchars($event['state']) ?>" required><br>

            <label>District:</label><br>
            <input type="text" name="district" value="<?= htmlspecialchars($event['district']) ?>" required><br>

            <label>Location:</label><br>
            <input type="text" name="location" value="<?= htmlspecialchars($event['location']) ?>" required><br><br>

            <button type="submit">Save Changes</button>
        </form>

    <?php elseif ($action === 'delete'): ?>
        <form method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
            <input type="hidden" name="action" value="delete">
            <p>Delete "<strong><?= htmlspecialchars($event['event_name']) ?></strong>"?</p>
            <button type="submit" style="color:red;">Yes, Delete</button>
        </form>
    <?php endif; ?>
</main>
</body>

<?php include ("footer.html") ?>

</html>