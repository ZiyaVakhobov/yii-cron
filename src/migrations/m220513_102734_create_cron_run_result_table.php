<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cron_run_result}}`.
 */
class m220513_102734_create_cron_run_result_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cron_run_result}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string(),
            'start_time' => $this->dateTime(),
            'end_time' => $this->dateTime(),
            'result' => $this->boolean(),
            'log' => $this->json()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cron_run_result}}');
    }
}
