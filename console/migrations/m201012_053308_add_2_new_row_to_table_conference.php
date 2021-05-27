<?php

use yii\db\Migration;

/**
 * Class m201012_053308_add_2_new_row_to_table_conference
 */
class m201012_053308_add_2_new_row_to_table_conference extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->insert('conference', [
            'id' => '2',
            'name' => 'Биологический турнир школьников',
            'registration_deadline' => '0',
            'created_at' => '1601009998',
        ]);
        $this->insert('conference', [
            'id' => '3',
            'name' => 'Межвузовская биологическая универсиада',
            'registration_deadline' => '0',
            'created_at' => '1601009998',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->delete('conference', [
            'id' => '2',
        ]);
        $this->delete('conference', [
            'id' => '3',
        ]);
    }

    /*
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m201012_053308_add_2_new_row_to_table_conference cannot be reverted.\n";

        return false;
    }
    */
}
