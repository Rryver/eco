<?php

use yii\db\Migration;

/**
 * Class m201002_091054_update_table_section
 */
class m201002_091054_update_table_section extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->update('section', ['title' => 'Секция 1. Эколого-экономические проблемы устойчивого развития территорий'], ['id' => '1']);
        $this->update('section', ['title' => 'Секция 2. Экологизация производства'], ['id' => '2']);
        $this->update('section', ['title' => 'Секция 3. Экологизация агропромышленного комплекса'], ['id' => '3']);
        $this->update('section', ['title' => 'Секция 4. Социальная экология'], ['id' => '4']);
        $this->update('section', ['title' => 'Круглый стол 1. Проблемы рационального природопользования и охраны окружающей среды'], ['id' => '5']);
        $this->update('section', ['title' => 'Круглый стол 2. Экологическое образование и просвещение'], ['id' => '6']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201002_091054_update_table_section cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201002_091054_update_table_section cannot be reverted.\n";

        return false;
    }
    */
}
