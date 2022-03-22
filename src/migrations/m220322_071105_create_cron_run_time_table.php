<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cron_run_time}}`.
 */
class m220322_071105_create_cron_run_time_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cron_run_time}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string(),
            'days' => $this->json(),
            'times' => $this->json()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cron_run_time}}');
    }
}
