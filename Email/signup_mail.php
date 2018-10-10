<?php
require_once "Mail.php";

$template = file_get_contents('Email/templates/signup_template.html');
// ob_start(); //Start output buffer
// echo $template;
// $output = ob_get_contents(); //Grab output
// ob_end_clean(); //Discard output buffer




/*foreach($variables as $key => $value)
{
    $template = str_replace('{{ '.$key.' }}', $value, $template);
}*/

$from = 'dharmikjoshi98@gmail.com';
$to = $email;
$subject = 'Reset password immediately';
$body = $template;

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject,
    'Content-Type' => 'text/html'
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'parth.js@somaiya.edu',
        'password' => 'hhuwhjdpuxsbocmo'
    ));

if (PEAR::isError($smtp)) {
    echo $smtp->getMessage() . "\n" . $smtp->getUserInfo() . "\n";
    die();
}

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
    echo('<p>Message successfully sent!</p>');
}

?>
