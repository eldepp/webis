<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../image/hlogo.png">
    <title>Upload Radiology</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>HMIS</title>
</head>

<body>

    <div class="drag-area">
        <form action="covid-img-upload.php" method="POST" enctype="multipart/form-data">
            <div class="icon"><i class="fa fa-cloud-upload-alt"></i></div>
            <header>Drag & Drop to Upload File</header>

            <span>OR</span>
            <br>
            <input type="submit" class="button" name="submit-img" value="Upload image">
            <input required type="file" class="choose"  name="img" accept=".jpg,.jpeg,.png">   

        </form>
    </div>
    <script src="script.js"></script>

</body>

</html>