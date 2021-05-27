<?php

use yii\db\Migration;

/**
 * Class m201002_022848_add_new_row_to_table_section
 */
class m201002_022848_add_new_row_to_table_section extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('section', [
            'id' => '7',
            'title' => 'Пленарные заседания',
            'conference_id' => '1',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('section', 'id = 7');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201002_022848_add_new_row_to_table_section cannot be reverted.\n";

        return false;
    }
    */
}
