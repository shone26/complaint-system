<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // File upload configuration
    $targetDirectory = "uploads/";
    $fileName = basename($_FILES["uploadedFile"]["name"]);
    $targetFilePath = $targetDirectory . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // Create uploads directory if it doesn't exist
    if (!is_dir($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }

    // Allow only PNG and PDF files
    $allowedTypes = array('png', 'pdf');
    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $targetFilePath)) {
            echo "<p style='color:green;'>The file " . htmlspecialchars($fileName) . " has been uploaded successfully.</p>";
        } else {
            echo "<p style='color:red;'>Sorry, there was an error uploading your file.</p>";
        }
    } else {
        echo "<p style='color:red;'>Only PNG and PDF files are allowed.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Complaint Evidence</title>
    <script>
        function triggerFileUpload() {
            document.getElementById('fileUpload').click();
        }

        function uploadFileOnSelect() {
            document.getElementById('uploadForm').submit();
        }
    </script>
</head>
<body>
    <h2>Upload Complaint Evidence</h2>

    <form id="uploadForm" action="complaints.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="uploadedFile" 
               id="fileUpload" accept=".png, .pdf" 
               onchange="uploadFileOnSelect()" 
               style="display: none;">
        
        <button type="button" 
                onclick="triggerFileUpload()" 
                style="background-color: #04AA6D; color: white; padding: 10px 20px; 
                       border: none; border-radius: 5px; cursor: pointer; font-size: 16px;"
                onmouseover="this.style.backgroundColor='#0a4313';" 
                onmouseout="this.style.backgroundColor='#04AA6D';">
            Add File
        </button>
    </form>
</body>
</html>
