<?php

/* SETTINGS */
$recipient = "paravinaza@yandex.com";
$subject = "Новая заявка с сайта paravina.ru от";

if($_POST){

  /* DATA FROM HTML FORM */
  $tel = $_POST['tel'];
//$phone = $_POST['phone'];


  /* SUBJECT */
  $emailSubject = "$subject $tel";

  /* HEADERS */
  $headers = "From: Сайт <paravina@paravina.ru>\r\n" .
             "Reply-To: paravina@paravina.ru <paravina@paravina.ru>\r\n" . 
             "Content-type: text/plain; charset=UTF-8\r\n" .
             "MIME-Version: 1.0\r\n" . 
             "X-Mailer: PHP/" . phpversion() . "\r\n";
 
  /* PREVENT EMAIL INJECTION */
  if ( preg_match("/[\r\n]/", $name) || preg_match("/[\r\n]/", $email) ) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    die("500 Internal Server Error");
  }

  /* MESSAGE TEMPLATE */
  $mailBody = "Телефон: $tel \n\r";

  /* SEND EMAIL */
  mail($recipient, $emailSubject, $mailBody, $headers);
}
?>