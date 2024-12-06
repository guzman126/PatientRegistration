<?php

namespace app\jobs;

use yii\base\BaseObject;
use yii\queue\JobInterface;
use Yii;

class SendEmailJob extends BaseObject implements JobInterface
{
    public $to;
    public $subject;
    public $body;

    public function execute($queue)
    {

        Yii::$app->mailer->compose()
                        ->setFrom('no-reply@yourdomain.com')
                        ->setTo($this->to)
                        ->setSubject($this->subject)
                        ->setTextBody($this->body)->send();
    }
}
