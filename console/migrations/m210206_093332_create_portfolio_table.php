<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%portfolio}}`.
 */
class m210206_093332_create_portfolio_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%portfolio}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
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
            'description' => $this->text()->notNull(),
            'description_ru' => $this->text()->notNull(),
            'description_en' => $this->text()->notNull(),
            'filename' => $this->string(255)->notNull(),
            'created_date' => $this->string(255)->notNull(),
            'status' => $this->integer()->defaultValue(1),
            'view' => $this->integer()->defaultValue(0),
        ]);
        $this->addForeignKey('portfolio-category', 'portfolio', 'category_id', 'portfolio_category', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%portfolio}}');
    }
}
