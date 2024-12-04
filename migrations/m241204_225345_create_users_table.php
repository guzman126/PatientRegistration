<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m241204_225345_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'email_address' => $this->string()->notNull()->unique(),
            'phone' => $this->string(15)->null(),
            'photo_document' => $this->string()->null(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'deleted' => $this->tinyInteger(1)->notNull(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
