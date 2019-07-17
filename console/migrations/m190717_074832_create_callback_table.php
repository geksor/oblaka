<?php

use yii\db\Migration;

/**
 * Handles the creation of table `callback`.
 */
class m190717_074832_create_callback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('callback', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
            'phone' => $this->char(124)->notNull(),
            'date' => $this->integer(11)->notNull(),
            'status' => $this->tinyInteger(4)->notNull()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('callback');
    }
}
