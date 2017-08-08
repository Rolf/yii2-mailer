<?php
class SmsTest extends \Codeception\Test\Unit
{
    public function testSend()
    {
        $email = Yii::createObject(\bubogumy\mailer::class);
        $email->send($email = 'mail@mail.ru', $subject="Subject" ,$message = 'message');
    }
}
