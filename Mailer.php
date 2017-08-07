<?php

namespace bubogumy;

use yii\base\Component;

class Mailer extends Component
{
    /**
     * Отправка Email сообщений
     * @param $email string
     * @param $subject string
     * @param $message string
     * @param $attach string путь до файла, который надо прикрепить
     * @return bool
     */
    public function send($email, $subject, $message, $attach = null)
    {
        \Yii::info(
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


        // Замена отправка сообщений с Пипо на страндартный Yii mailer
        $sending = \Yii::$app->mailer->compose()
            ->setTo($email)
            ->setSubject($subject)
            ->setHtmlBody($message);

        if (!is_null($attach)) {
            $sending->attach($attach);
        }

        $result = $sending->send();

        \Yii::info(($result ? 'Успешно отправлен email' : 'Email не был отправлен'), __METHOD__);

        return $result;
    }
}
