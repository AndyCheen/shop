<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%goods}}`.
 */
class m230225_162029_create_goods_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%goods}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'status' => $this->integer()->notNull(),
            'is_deleted' => $this->integer()->notNull(),
            'amount' => $this->integer()->notNull(),
            'price' => $this->decimal(10, 2)->notNull(),
            'new_price' => $this->decimal(10, 2),
            'rating' => $this->decimal(1, 1),
            'description' => $this->text(),
            'created_at' => $this->timestamp()->notNull(),
            'updatet_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%goods}}');
    }
}
