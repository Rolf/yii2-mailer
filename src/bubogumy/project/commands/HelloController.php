<?php

namespace bubogumy\project;
use yii\console\Controller;

class HelloController extends Controller
{
	public function actionIndex($message = 'hello world')
	{
		echo $message;
	}
}
