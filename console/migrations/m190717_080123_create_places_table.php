<?php

use yii\db\Migration;

/**
 * Handles the creation of table `places`.
 */
class m190717_080123_create_places_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('places', [
            'id' => $this->primaryKey(),
            'type' => $this->text()->notNull(),
            'description' => $this->text()->notNull(),
            'price' => $this->integer(11)->notNull(),
            'image' => $this->text(),
            'count' => $this->integer(11)->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('places');
    }
}
