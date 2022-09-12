<?php

require_once('machine-learning.php');

if (isset($_POST['submit-img'])) {
    $extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
    $dst_fname =  getcwd() . '/covid-images/' . time() . uniqid(rand()) . '.' . $extension;
    $dst_fname = str_replace('\\', '/', $dst_fname);
    move_uploaded_file($_FILES["img"]["tmp_name"],  $dst_fname);
    $result = classify_image($dst_fname);
} else {
    header("Location: index.php");
    exit();
}

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../image/hlogo.png">
    <title>Radiology Result</title>
    <link rel="stylesheet" href="table.css">
    <style>
        table,
        td,
        th {
            border: 1px solid #fff;
            text-align: center;
            color: #eeeeeed6;
            font-size: 20px;
        }

        table {
            border-collapse: collapse;
            width: 70%;

        }

        th {

            background-color: #207dff;
        }

        th,
        td {
            padding: 15px;
        }
    </style>
</head>

<body>
    <br>
    <center>
        <h1>Covid Diagnosis Result</h1>
    </center>
    <hr>
    <div class="result_table">
        <table>
            <tr>
                <th>Result</th>
                <td><?php echo $result['class_name'] ?></td>
            </tr>

            <tr>
                <th>Probability of covid</th>
                <td><?php echo $result['prob_covid'] ?></td>
            </tr>

            <tr>
                <th>Probability of non-covid</th>
                <td><?php echo $result['prob_noncovid'] ?></td>
            </tr>
        </table>
    </div>
    <a href="index.php" class="btn btn-danger sbutton">Back to the previous page</a>


</body>

</html>