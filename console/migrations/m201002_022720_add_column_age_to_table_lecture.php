<?php

use yii\db\Migration;

/**
 * Class m201002_022720_add_column_age_to_table_lecture
 */
class m201002_022720_add_column_age_to_table_lecture extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('lecture', 'age', 'INT(11)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201002_022720_add_column_age_to_table_lecture cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201002_022720_add_column_age_to_table_lecture cannot be reverted.\n";

        return false;
    }
    */
}
