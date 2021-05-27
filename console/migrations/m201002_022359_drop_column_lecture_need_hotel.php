<?php

use yii\db\Migration;

/**
 * Class m201002_022359_drop_column_lecture_need_hotel
 */
class m201002_022359_drop_column_lecture_need_hotel extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('lecture', 'need_hotel');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201002_022359_drop_column_lecture_need_hotel cannot be reverted.\n";
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201002_022359_drop_column_lecture_need_hotel cannot be reverted.\n";

        return false;
    }
    */
}
