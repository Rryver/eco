<?php

use yii\db\Migration;

/**
 * Class m200929_040528_init
 */
class m200929_040528_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(file_get_contents(__DIR__ . "/m200929_040528.sql"));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200929_040528_init cannot be reverted.\n";

        return false;
    }
    */
}
