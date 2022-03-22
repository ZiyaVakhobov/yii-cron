<?php

namespace Ziya\YiiCron\models;

/**
 * This is the model class for table "cron_run_time".
 *
 * @property int $id
 * @property string|null $key
 * @property array|null $days
 * @property string|null $times
 */
class CronRunTime extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cron_run_time';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['days', 'times'], 'safe'],
            [['key'], 'string', 'max' => 255],
        ];
    }

    public function validDate(\DateTime $dateTime)
    {
        if (in_array($dateTime->format('w'),$this->days)) {

            foreach ($this->times as $time) {
                list ($startTime,$endTime) = $time;

                $startTime = new \DateTime($startTime);
                $startTime->setDate(
                    $dateTime->format('Y'),
                    $dateTime->format('m'),
                    $dateTime->format('d')
                );

                $endTime = new \DateTime($endTime);
                $endTime->setDate(
                    $dateTime->format('Y'),
                    $dateTime->format('m'),
                    $dateTime->format('d')
                );

                if ($startTime <= $dateTime && $dateTime <= $endTime) {
                    return true;
                }
            }
        }

        return false;
    }
}
