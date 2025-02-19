<?php
// Include database configuration file
include('../config/db.php'); // Ensure your database connection is correct

// Initialize variables
$complaint = null;
$error = "";
$file_dir = null;

// Check if the search form has been submitted
if (isset($_GET['ref_code'])) {
    // Sanitize input to prevent SQL injection
    $ref_code = mysqli_real_escape_string($conn, $_GET['ref_code']);

    // SQL query to search for the complaint by reference code
    $sql = "SELECT * FROM complaints WHERE ref_code = '$ref_code' LIMIT 1";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if any record is found
    if (mysqli_num_rows($result) > 0) {
        // Fetch the complaint data
        $complaint = mysqli_fetch_assoc($result);
        $file_dir = 'uploads/' . $complaint['ref_code'] . '/'; // Define the directory path based on ref_code
    } else {
        $error = "No complaint found with reference code: " . $ref_code;
    }
}
// Handle file upload if form is submitted
if (isset($_POST['submit'])) {
    $ref_code = mysqli_real_escape_string($conn, $_POST['ref_code']);

    // Handle file upload
    if (isset($_FILES['file'])) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Define allowed file types
        $allowed_ext = ['pdf', 'png'];
        if (in_array($file_ext, $allowed_ext)) {
            // Define the upload directory based on the ref_code
            $upload_dir = '/opt/bitnami/apache/htdocs/dashboard/uploads/' . $ref_code . '/';

            // Check if the directory exists, if not, create it
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 775, true);  // Create the directory with write permissions
            }

            // Define the file path
            $file_path = $upload_dir . uniqid() . '.' . $file_ext;

            // Move the file to the specific complaint folder
            if (move_uploaded_file($file_tmp, $file_path)) {
                // Update the complaint record with the file path
                $sql = "UPDATE complaints SET file_path = '$file_path' WHERE ref_code = '$ref_code'";
                if (mysqli_query($conn, $sql)) {
                } else {
                    echo "Database error: " . mysqli_error($conn);
                }
            } else {
                echo "Failed to upload file.";
            }
        } else {
            echo "Only PDF and PNG files are allowed.";
        }
    } else {
        echo "No file uploaded.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Complaint</title>
    <!-- Bootstrap CDN for modern UI -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1a2035;
        }

        .container {
            margin-top: 50px;

        }

        .search-container {
            background-color: #202940;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);

        }

        .search-form {
            margin-bottom: 20px;

        }

        .complaint-details {
            margin-top: 30px;
        }

        .no-results {
            color: red;
        }

        .file-display img {
            max-width: 300px;
            /* Increase image width */
            height: auto;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .file-display iframe {
            width: 100%;
            height: 600px;
            /* Increase iframe height for PDFs */
            margin-top: 10px;
        }

        .file-display a {
            display: block;
            margin-bottom: 10px;
        }
    </style>

    <style>
        button.print-button {
            width: 60px;
            height: 60px;
            left: 1010px;
            bottom: 80px;
        }

        span.print-icon,
        span.print-icon::before,
        span.print-icon::after,
        button.print-button:hover .print-icon::after {
            border: solid 4px #333;
        }

        span.print-icon::after {
            border-width: 2px;
        }

        button.print-button {
            position: relative;
            padding: 0;
            border: 0;

            border: none;
            background: transparent;
        }

        span.print-icon,
        span.print-icon::before,
        span.print-icon::after,
        button.print-button:hover .print-icon::after {
            box-sizing: border-box;
            background-color: #fff;
        }

        span.print-icon {
            position: relative;
            display: inline-block;
            padding: 0;
            margin-top: 20%;

            width: 60%;
            height: 35%;
            background: #fff;
            border-radius: 20% 20% 0 0;
        }

        span.print-icon::before {
            content: "";
            position: absolute;
            bottom: 100%;
            left: 12%;
            right: 12%;
            height: 110%;

            transition: height .2s .15s;
        }

        span.print-icon::after {
            content: "";
            position: absolute;
            top: 55%;
            left: 12%;
            right: 12%;
            height: 0%;
            background: #fff;
            background-repeat: no-repeat;
            background-size: 70% 90%;
            background-position: center;
            background-image: linear-gradient(to top,
                    #fff 0, #fff 14%,
                    #333 14%, #333 28%,
                    #fff 28%, #fff 42%,
                    #333 42%, #333 56%,
                    #fff 56%, #fff 70%,
                    #333 70%, #333 84%,
                    #fff 84%, #fff 100%);

            transition: height .2s, border-width 0s .2s, width 0s .2s;
        }

        button.print-button:hover {
            cursor: pointer;
        }

        button.print-button:hover .print-icon::before {
            height: 0px;
            transition: height .2s;
        }

        button.print-button:hover .print-icon::after {
            height: 120%;
            transition: height .2s .15s, border-width 0s .16s;
        }

        input #file-upoload-button {
            color: #fff;
        }


        /* Hide everything by default in print mode */
        @media print {
            body * {
                visibility: hidden;
            }

            /* Only show the selected section */
            .printable-section,
            .printable-section * {
                visibility: visible;
            }

            /* Adjust the positioning to fit the print area */
            .printable-section {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                border: 5px solid black;
                padding: 20px;
            }
        }
    </style>

    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/pol_logo.png">
    <link rel="icon" type="image/png" href="../assets/img/pol_logo.png">
</head>

<body>
    <div class="container">
        <div class="search-container">
            <h2 class="text-center mb-4" style="color: #fff;">Search Complaint by Reference Code</h2>
            <div class="prt">
                <button class="print-button" onclick="printSelectedArea()"><span class="print-icon"></span></button>
            </div>
            <!-- Search Form -->
            <form method="GET" action="search.php" class="search-form">
                <div class="form-group">
                    <label for="ref_code" style="color:#fff" ;>Enter Reference Code:</label>
                    <input type="text" class="form-control" name="ref_code" id="ref_code" placeholder="e.g., CMP-XXXX" required style="background-color: #2b3a5f;">
                </div>
                <button type="submit" class="btn btn-primary btn-block" style="background:#000078;">Search</button>
                <button type="reset" class="btn btn-primary btn-block" onclick="resetAndCleanURL()" style="background:#000078;">Reset</button>

            </form>

            <!-- Display Complaint Information -->
            <?php if ($complaint): ?>
                <div class="complaint-details " id="details">
                    <div class="printable-section">
                        <h4 style="color: #fff;">Complaint Details:</h4>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Reference Code:</strong> <?php echo $complaint['ref_code']; ?></li>
                            <li class="list-group-item"><strong>Title:</strong> <?php echo $complaint['subject']; ?></li>
                            <li class="list-group-item"><strong>Description:</strong> <?php echo $complaint['description']; ?></li>
                            <li class="list-group-item"><strong>Complaint Created:</strong> <?php echo $complaint['created_at']; ?></li>
                            <li class="list-group-item"><strong>Status:</strong> <?php echo $complaint['status']; ?></li>
                        </ul>

                        <!-- File Display Section -->
                        <?php if (is_dir($file_dir)): ?>
                            <div class="file-display">
                                <h5>Related Files:</h5>
                                <?php
                                // Scan the directory for files
                                $files = scandir($file_dir);

                                // Display each file in the directory
                                foreach ($files as $file) {
                                    if ($file !== '.' && $file !== '..') {
                                        $file_path = $file_dir . $file;
                                        $file_ext = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));

                                        // If it's a PDF, display an iframe to view it
                                        if ($file_ext === 'pdf') {
                                            echo '<iframe src="' . $file_path . '"></iframe>';
                                        }
                                        // If it's an image (PNG, JPG, JPEG), display the image
                                        elseif (in_array($file_ext, ['png', 'jpg', 'jpeg'])) {
                                            echo '<img src="' . $file_path . '" alt="Complaint Image">';
                                        }
                                        // If it's any other file type, provide a download link
                                        else {
                                            echo '<a href="' . $file_path . '" download>Download ' . $file . '</a>';
                                        }
                                    }
                                }
                                ?>
                            </div>
                        <?php else: ?>
                            <p class="text-warning" style="color:#fff;">No files related to this complaint.</p>
                        <?php endif; ?>
                    </div>
                    <h5 class="mt-4" style="color:#fff;">Upload a File for This Complaint</h5>
                    <form method="POST" action="search.php" enctype="multipart/form-data">
                        <input type="hidden" name="ref_code" value="<?php echo $complaint['ref_code']; ?>">
                        <div class="form-group" style="color:#fff;">
                            <label for="file">Choose a file (PDF/PNG):</label>
                            <input type="file" class="form-control" id="file" name="file" accept=".pdf,.png" required style="background-color: #2b3a5f; padding-bottom:35px; color:#fff">
                        </div>
                        <button type="submit" class="btn btn-success" name="submit" style="background-color:#000078; border:#fff; ">Upload File</button>

                    </form>
                </div>
            <?php elseif ($error): ?>
                <p class="no-results text-center"><?php echo $error; ?></p>
            <?php endif; ?>
            <!-- Print Button -->

        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function printSelectedArea() {
            window.print();
        }
    </script>

    <script>
        function resetAndCleanURL() {
            // Remove query parameters from the URL
            const url = window.location.origin + window.location.pathname;
            window.history.replaceState({}, document.title, url);

            // Clear the form inputs (if any)
            const form = document.getElementById("myForm");
            if (form) {
                form.reset();
            }

            // Hide the details section
            const detailsSection = document.getElementById("details");
            if (detailsSection) {
                detailsSection.style.display = "none";
            }

            // Use a slight delay to ensure the URL is cleaned before the page refreshes
            setTimeout(() => {
                location.reload(); // Refresh the page
            }, 100); // 100ms delay (can be adjusted if needed)
        }
    </script>

</body>

</html>