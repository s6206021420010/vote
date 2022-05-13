<?php

    use PHPMailer\PHPMailer\PHPMailer;
    echo $rand =  rand(10000,99999);
    if(isset($_POST['email'])) {
        $name = "VoteOnline";
        $email = $_POST['email'];
        $header = "Identity Verification";
        $detail = "Authentication Code : $rand";

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        // SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "phophaya@gmail.com"; // enter your email address
        $mail->Password = "t123123123555"; // enter your password
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress($email); // Send to mail
        $mail->Subject = $header;
        $mail->Body = $detail;

        if($mail->send()) {
            $status = "success";
            $response = "Email is sent";
        } else {
            $status = "failed";
            $response = "Something is wrong" . $mail->ErrorInfo;
        }

      // exit(json_encode(array("status" => $status, "response" => $response)));
    }
?>
