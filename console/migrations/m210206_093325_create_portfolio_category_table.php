<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%portfolio_category}}`.
 */
class m210206_093325_create_portfolio_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%portfolio_category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'title_ru' => $this->string(255)->notNull(),
            'title_en' => $this->string(255)->notNull(),
            'url' => $this->string(255)->notNull(),
            'url_ru' => $this->string(255)->notNull(),
            'url_en' => $this->string(255)->notNull(),
            'meta_title' => $this->string(255)->notNull(),
            'meta_title_ru' => $this->string(255)->notNull(),
            'meta_title_en' => $this->string(255)->notNull(),
            'meta_description' => $this->string(500)->notNull(),
            'meta_description_ru' => $this->string(500)->notNull(),
            'meta_description_en' => $this->string(255)->notNull(),
            'filename' => $this->string(255)->notNull(),
            'created_date' => $this->string(255)->notNull(),
            'status' => $this->integer()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%portfolio_category}}');
    }
}
