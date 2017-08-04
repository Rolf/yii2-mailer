# Установка
В composer.json подключаем  
````
"require": {
    "bubogumy/yii2-mailer": "dev-master"
}
````
После установка через консоль:  
``
composer require bubogumy/yii2-mailer
``

Подключаем Веб-приложение в файле ``config/web.php`` в ``components``  
````
'm' => [
            'class' => 'bubogumy\Mailer',
        ]
````
Для отправки сообщений используем  
````
use bubogumy\mailer;  
Yii::$app->m->send($email = 'you@mail.com',$subject= 'title', $message='text');
````
Переменные, которые используются:  
$email = почта, куда отправляем (обязательно);  
$subject = тема сообщения (обязательно);  
$message = сообщение (обязательно);  
$attach = путь до файла, который отправляем.

#### Ошибки, которые могут возникнуть и как их решать

**Ошибка**
````[InvalidArgumentException]                                                   
  Could not find package bubogumy/yii2-mailer at any version for your minimum  
  -stability (stable). Check the package spelling or your minimum-stability 
````
**Решение**  

Добавляем в composer.json алиас ``"minimum-stability": "dev"``

Проект на [packagist.org](https://packagist.org/packages/bubogumy/yii2-mailer)