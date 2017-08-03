<?php

namespace bubogumy;

use yii\base\Component;

class mailer extends Component
{
	public function input($name)
	{
		echo "<input class='form-control' name =".$name.">";
	}
    public static function send($email, $subject, $message, User $user = null, $attach = null)
    {
        \Yii::info(
            'Отправка запроса в ПИПО на отправку email ' . PHP_EOL .
            'Адрес почты: ' . $email . PHP_EOL .
            'Заголовок сообщения: ' . $subject . PHP_EOL .
            'Текст сообщения: ' . $message . PHP_EOL,
            __METHOD__
        );

        // Возможность указывать несколько адресов через запятую
        $email = array_map(
            function ($email) {
                return trim($email);
            },
            explode(',', $email)
        );


        //Замена отправка сообщений с Пипо на страндартный Yii mailer
        $sending = \Yii::$app->mailer->compose()
            ->setTo($email)
            ->setSubject($subject)
            ->setHtmlBody($message);

        if (!is_null($attach)) {
            $sending->attach($attach);
        }

        $result = $sending->send();
    if ($result == true) {
        echo "yes";
    } else {
        echo "no";
    }
        \Yii::info(($result ?  'Успешно отправлен email' : 'Email не был отправлен'), __METHOD__);

        return $result;
    }
}

