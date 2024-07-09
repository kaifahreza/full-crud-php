use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';
$mail = new PHPMailer(true);
//Server settings
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'pplgbmtibmti@gmail.com';                     //SMTP username
$mail->Password   = 'vnusdmgkmjminpxz';                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = 465;

if (isset($_POST['kirim'])) {

    $mail->setFrom('pplgbmtibmti@gmail.com', 'pplg bmti');
    $mail->addAddress($_POST['email_penerima']); // penerima
    $mail->addReplyTo('pplgbmtibmti@gmail.com', 'pplg bmti');

    $mail->Subject = $_POST['subject'];
    $mail->Body    = $_POST['pesan'];


    if ($mail->send()) {

        if (create_barang($_POST) > 0) {
            echo "<script>
                    alert('Email Berhasil Dikirimkan');
                    document.location.href = 'email.php';
                </script>";
        } else {
            echo "<script>
                    alert('Email Gagal Dikirimkan');
                    document.location.href = 'email.php';
                </script>";
        }
        exit();
    }
}