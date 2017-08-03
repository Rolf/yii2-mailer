<?php

namespace bubogumy\mailer;
use yii\base\HelloController;
use yii\base\Component; 

class HelloController extends Controller
{
	public function actionIndex($message = 'hello world')
	{
		echo $message;
	}
}
