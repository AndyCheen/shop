<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%goods_attachments}}`.
 */
class m230302_152437_create_goods_attachments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%goods_attachments}}', [
            'id' => $this->primaryKey(),
            'goods_id' => $this->integer(),
            'url' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%goods_attachments}}');
    }
}
