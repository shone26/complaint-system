<?php
header('Content-type: application/json');
session_start();

$response = array();
$error_log = array();

// Check if the page is visited after clicking the form button or not
if ($_POST) {
    require_once('../../includes/functions.inc.php');

    $subject     = $_POST['complaintSubject'];
    $description = $_POST['complaintBody'];
    $department  = $_POST['complaintDepartment'];
    $phoneNumber = $_POST['phoneNumber'];  // Phone number field
    $stationName = $_POST['stationName'];  // Station name field
    $address     = $_POST['address'];      // Address field
    $gender      = $_POST['gender'];       // Gender field

    // Generate a unique complaint reference code
    //$complaintRefCode = 'CMP-' . strtoupper(uniqid());
    $complaintRefCode = 'CMP-' . substr(strtoupper(bin2hex(random_bytes(3))), 0, 5);

    // Initial Validation and Error Handling
    if (strlen($subject) < 8 || strlen($subject) > 100) {
        $error_log['complaintSubject'] = 'Invalid Subject!';
    }
    if (strlen($description) < 10 || strlen($description) > 255) {
        $error_log['complaintBody'] = 'Must be 10 to 255 characters!';
    }
    if (!preg_match('/^\d{10}$/', $phoneNumber)) { // Phone number validation (example: 10-digit number)
        $error_log['phoneNumber'] = 'Invalid phone number! Must be 10 digits.';
    }
    if (empty($stationName) || strlen($stationName) > 100) { // Validate station name
        $error_log['stationName'] = 'Station name is required and must be less than 100 characters!';
    }
    if (empty($address) || strlen($address) > 255) { // Validate address
        $error_log['address'] = 'Address is required and must be less than 255 characters!';
    }
    if (empty($gender)) { // Validate gender
        $error_log['gender'] = 'Gender is required!';
    }

    // Initial Validation End

    // Check if there's any error, otherwise continue
    if (count($error_log) == 0) {
        require_once('../../config/db.php');

        // Modify SQL query to include the complaint reference code
        $sql = "INSERT INTO complaints (ref_code, subject, description, dept_id, user_id, phone_number, station_name, address, gender, created_at) VALUES (?,?,?,?,?,?,?,?,?,NOW())";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $error_log['sql'] = "Connection Failed! Please try again";
            $response['status'] = 'error';
        } else {
            // Bind the reference code along with other parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $complaintRefCode, $subject, $description, $department, $_SESSION['userId'], $phoneNumber, $stationName, $address, $gender);
            mysqli_stmt_execute($stmt);

            $response['status'] = 'success';
            $response['ref_code'] = $complaintRefCode; // Return the reference code to the user if needed
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        // If errors are there, return them
        $response['status'] = 'error';
    }
    $response['errors'] = $error_log;
    echo json_encode($response);
} else {
    header('Location: ../');
    exit();
}
