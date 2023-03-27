<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%goods_options}}`.
 */
class m230315_165553_create_goods_options_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%goods_options}}', [
            'goods_id' => $this->integer(),
            'option_id' => $this->integer(),
            'value' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%goods_options}}');
    }
}
