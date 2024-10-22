<?php
// root path
// $root = getcwd();
// echo $root;


// File: application/libraries/PHPMailer_lib.php

defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once APPPATH . 'third_party/PHPMailer/src/Exception.php';
require_once APPPATH . 'third_party/PHPMailer/src/PHPMailer.php';
require_once APPPATH . 'third_party/PHPMailer/src/SMTP.php';

class PHPMailer_lib
{
    public function __construct()
    {
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load()
    {
        $mail = new PHPMailer(TRUE); // Passing TRUE enables exceptions

        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = ''; // email
        $mail->Password = ''; //password gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Email content
        $sender = '';
        $receiver = '';
        $mail->setFrom($sender, 'Wedding Organizer JeWePe');
        $mail->addAddress($receiver);
        $mail->Subject = 'Konfirmasi Pesanan Paket Pernikahan';
        $mail->Body = 'Terima Kasih sudah melakukan pemesanan paket pernikahan di Wedding Organizer JeWePe. Pesanan anda sudah diterima dan dikonfirmasi. Silahkan tunggu telepon dari tim kami untuk proses selanjutnya';

        // Send email
        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }
}
