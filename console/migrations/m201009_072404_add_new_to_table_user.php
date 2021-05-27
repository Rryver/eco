<?php

use yii\db\Migration;

/**
 * Class m201009_072404_add_new_to_table_user
 */
class m201009_072404_add_new_to_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user', [
            'id' => '2',
            'username' => 'redactor',
            'auth_key' => '_paLrHBCvu_0qXrnYBgWj4elzRwfcrld',
            'password_hash' => '$2y$13$V7msUEQXX8uiKdu.l7SH6.D02OdiXQ7n3PDmgISUq/fkNI2BBfSua',
            'password_reset_token' => null,
            'email' => 'admin2@example.com',
            'status' => '10',
            'created_at' => '1602228126',
            'updated_at' => '1602228126',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user', ['username' => 'redactor']);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201009_072404_add_new_to_table_user cannot be reverted.\n";

        return false;
    }
    */
}
