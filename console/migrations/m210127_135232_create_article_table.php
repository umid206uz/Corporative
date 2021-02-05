<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m210127_135232_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'title_ru' => $this->string(255)->notNull(),
            'title_en' => $this->string(255)->notNull(),
            'meta_title' => $this->string(255)->notNull(),
            'meta_title_ru' => $this->string(255)->notNull(),
            'meta_title_en' => $this->string(255)->notNull(),
            'meta_description' => $this->string(500)->notNull(),
            'meta_description_ru' => $this->string(500)->notNull(),
            'meta_description_en' => $this->string(255)->notNull(),
            'description' => $this->text()->notNull(),
            'description_ru' => $this->text()->notNull(),
            'description_en' => $this->text()->notNull(),
            'filename' => $this->string(255)->notNull(),
            'created_date' => $this->string(255)->notNull(),
            'status' => $this->integer()->notNull(),
            'view' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('article-category', 'article', 'category_id', 'article_category', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article}}');
    }
}
