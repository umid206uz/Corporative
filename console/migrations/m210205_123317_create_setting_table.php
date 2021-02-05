<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%setting}}`.
 */
class m210205_123317_create_setting_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%setting}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'title_ru' => $this->string(255)->notNull(),
            'title_en' => $this->string(255)->notNull(),
            'addres' => $this->string(255)->notNull(),
            'addres_ru' => $this->string(255)->notNull(),
            'addres_en' => $this->string(255)->notNull(),
            'copyright' => $this->string(255)->notNull(),
            'copyright_ru' => $this->string(255)->notNull(),
            'mail' => $this->string(255)->notNull(),
            'facebook' => $this->string(255)->notNull(),
            'instagram' => $this->string(255)->notNull(),
            'telegram' => $this->string(255)->notNull(),
            'youtube' => $this->string(255)->notNull(),
            'description' => $this->text()->notNull(),
            'description_ru' => $this->text()->notNull(),
            'description_en' => $this->text()->notNull(),
            'logo' => $this->string(255)->notNull(),
            'logo_bottom' => $this->string(255)->notNull(),
            'favicon' => $this->string(255)->notNull(),
            'open_graph_photo' => $this->string(255)->notNull(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%setting}}');
    }
}
