<?php
include dirname(__FILE__) . '/../vendor/phpmailer/phpmailer/src/PHPMailer.php';
include dirname(__FILE__) . '/../vendor/phpmailer/phpmailer/src/Exception.php';
include dirname(__FILE__) . '/../vendor/phpmailer/phpmailer/src/SMTP.php';;


class SendMail
{
    private $body;
    private $subject;
    private $fname;
    private $lname;
    private $email;


    public function __construct($fname, $lname, $email, $body, $subject)
    {
        $this->setBody($body);
        $this->setFname($fname);
        $this->setLname($lname);
        $this->setEmail($email);
        $this->setSubject($subject);
    }

    public function sendMail()
    {
        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

        $mail->isSMTP();
        $mail->CharSet = 'utf-8';
        $mail->SMTPAuth = true;
        $mail->SMTPAutoTLS = false;
        $mail->Host = '192.168.1.185';
        $mail->Port = 25;

        $mail->Username = 'vfhub_teszt@telemax.local';
        $mail->Password = 'vfhubteszt';

        // Recipients
        $mail->setFrom('stephany85@gmail.com', 'MakeMeElvis.com');
        for ($i = 0; $i < Count($this->email); $i++) {
            $name = $this->fname[$i] . ' ' . $this->lname[$i];
            $cim = $this->email[$i];
            $mail->addBCC($cim, $name);
        }
            // Content
            $mail->isHTML(true);
            $mail->Subject = $this->subject;
            $mail->msgHTML($this->body);
            $mail->send();
        }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}

?>