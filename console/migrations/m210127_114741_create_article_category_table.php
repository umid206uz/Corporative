<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article_category}}`.
 */
class m210127_114741_create_article_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article_category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'title_ru' => $this->string(255)->notNull(),
            'title_en' => $this->string(255)->notNull(),
            'meta_title' => $this->string(255)->notNull(),
            'meta_title_ru' => $this->string(255)->notNull(),
            'meta_title_en' => $this->string(255)->notNull(),
            'meta_description' => $this->string(500)->notNull(),
            'meta_description_ru' => $this->string(500)->notNull(),
            'meta_description_en' => $this->string(255)->notNull(),
            'filename' => $this->string(255)->notNull(),
            'created_date' => $this->string(255)->notNull(),
            'status' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article_category}}');
    }
}
