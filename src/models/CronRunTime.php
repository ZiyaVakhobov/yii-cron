<?php

namespace Ziya\YiiCron\models;

/**
 * This is the model class for table "cron_run_time".
 *
 * @property int $id
 * @property string|null $key
 * @property string|null $year
 * @property string|null $month
 * @property string|null $day
 * @property string|null $hour
 * @property string|null $minutes
 * @property int|null $is_regular
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
            [['year', 'month', 'day', 'hour', 'minutes'], 'safe'],
            [['is_regular'], 'integer'],
            [['key'], 'string', 'max' => 255],
        ];
    }

}
