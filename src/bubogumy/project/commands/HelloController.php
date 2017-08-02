<?php

namespace bubogumy\mailer;
use yii\base\HelloController;

class HelloController extends Controller
{
	public function actionIndex($message = 'hello world')
	{
		echo $message;
	}
}
