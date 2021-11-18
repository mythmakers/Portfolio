<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phNo = $_POST['phNo'];
    $text = $_POST['texthere'];

    $conn = mysqli_connect('localhost', 'root', '', 'personal');
    if($conn->connect_error) {
        die('Connection Failed: '.$conn->connect_error);
    } else {
        date_default_timezone_set("Asia/Kolkata");
        $date = date("Y-m-d h:i:sa");
        $stmt = $conn->prepare("INSERT INTO `opinion_tb` (`name`, `email`, `phNo`, `text`, `submit_at`) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $phNo, $text, $date);
        $stmt->execute();
        echo '
            <script type="text/javascript">
                alert("Submitted Successfully");
                window.location.href = "http://localhost/test/Personal.html";
            </script>';
        $stmt->close();
        $conn->close();
    }
?>