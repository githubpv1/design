<?php
// подключаем файлы из папки phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые вводит пользователь 
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
	$msg = "ok";
	$mail->CharSet = 'UTF-8';
	$mail->SMTPDebug = 0;	//Подключение отладки SMTP.
	$mail->isSMTP();	//Задаем для PHPMailer использовать SMTP.

	// Настройки почты с которой будут отправляться письма
	$mail->Host       = 'smtp.gmail.com'; 
	//$mail->Port       = 465; // ssl
	$mail->Port = 587; // tls
	//$mail->SMTPSecure = 'ssl'; // ssl (устарело)
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;	//если хост SMTP требует аутентификации для отправки
	$mail->Username = "nastjanastja309@gmail.com";	 
	$mail->Password   = 'ltvjycnhfwbz2019'; 
	$mail->setFrom('nastynja2014@outlook.com', $name); // от кого будет отправлено сообщение(не работает у gmail)
	$mail->AddReplyTo($email, $name); // адрес для ответа

	// Получатель письма
	//$mail->addAddress('nastynja2014@outlook.com');  
	$mail->addAddress('ip968m@gmail.com'); 

	//Attach multiple files one by one
	for ($ct = 0; $ct < count($_FILES['userfile']['tmp_name']); $ct++) {
			$uploadfile = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['userfile']['name'][$ct]));
			$filename = $_FILES['userfile']['name'][$ct];
			if (move_uploaded_file($_FILES['userfile']['tmp_name'][$ct], $uploadfile)) {
					$mail->addAttachment($uploadfile, $filename);
			} else {
					$msg .= 'Неудалось прикрепить файл  ' . $uploadfile;
			}
	}
	// Само письмо
	$mail->isHTML(true);
	$mail->Subject = "Заявка с нашего сайта";
	$mail->Body = $message;
	$mail->AltBody = "Текстовая версия письма";

	// Проверяем отравленность сообщения
	if ($mail->send()) {
			echo "$msg";
	} else {
	echo "Сообщение не было отправлено.";
	}
} catch (Exception $e) {
    echo "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}
?>