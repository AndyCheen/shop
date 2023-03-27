<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%options}}`.
 */
class m230315_165448_create_options_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%options}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'category_id' => $this->integer(),
            'type' => $this->string(),
            'is_deleted' => $this->boolean(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%options}}');
    }
}
