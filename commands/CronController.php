<?php

namespace app\commands;

use Yii;
use yii\console\Controller;

class CronController extends Controller
{
    public function actionRunTask()
    {
        $mail = Yii::$app->mailer->compose()
                        ->setFrom('no-reply@yourdomain.com')
                        ->setTo('hodawa2813@bawsny.com')
                        ->setSubject('Test Email')
                        ->setTextBody('testeo de cron');

                        echo print_r($mail,true);

                        echo "Cron task is running...\n";
    }
}
