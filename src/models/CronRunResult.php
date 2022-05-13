<?php

namespace Ziya\YiiCron\models;

/**
 * This is the model class for table "cron_run_result".
 *
 * @property int $id
 * @property string|null $key
 * @property string|null $start_time
 * @property string|null $end_time
 * @property int|null $result
 * @property string|null $log
 */
class CronRunResult extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cron_run_result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['start_time', 'end_time', 'log'], 'safe'],
            [['result'], 'integer'],
            [['key'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'result' => 'Result',
            'log' => 'Log',
        ];
    }
}
