<?php

namespace common\models;
use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $title_ru
 * @property string $title_en
 * @property string $meta_title
 * @property string $meta_title_ru
 * @property string $meta_title_en
 * @property string $meta_description
 * @property string $meta_description_ru
 * @property string $meta_description_en
 * @property string $description
 * @property string $description_ru
 * @property string $description_en
 * @property string $filename
 * @property string $created_date
 * @property int $status
 * @property int $view
 *
 * @property ArticleCategory $category
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public $picture;
    public function rules()
    {
        return [
            [['category_id', 'title', 'title_ru', 'title_en', 'meta_title', 'meta_title_ru', 'meta_title_en', 'meta_description', 'meta_description_ru', 'meta_description_en', 'description', 'description_ru', 'description_en', 'filename', 'created_date', 'status', 'view', 'url', 'url_ru', 'url_en'], 'required'],
            [['category_id', 'status', 'view'], 'integer'],
            [['description', 'description_ru', 'description_en'], 'string'],
            [['title', 'title_ru', 'title_en', 'meta_title', 'meta_title_ru', 'meta_title_en', 'filename', 'created_date', 'url', 'url_ru', 'url_en'], 'string', 'max' => 255],
            [['meta_description', 'meta_description_ru', 'meta_description_en',], 'string', 'max' => 500],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ArticleCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            ['picture', 'file', 'extensions' => ['jpg', 'jpeg', 'png', 'gif'], 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category',
            'title' => 'Title',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'meta_title' => 'Meta Title',
            'meta_title_ru' => 'Meta Title Ru',
            'meta_title_en' => 'Meta Title En',
            'meta_description' => 'Meta Description',
            'meta_description_ru' => 'Meta Description Ru',
            'meta_description_en' => 'Meta Description En',
            'description' => 'Description',
            'description_ru' => 'Description Ru',
            'description_en' => 'Description En',
            'filename' => 'Filename',
            'created_date' => 'Created Date',
            'status' => 'Status',
            'view' => 'View',
            'url' => 'Url',
            'url_ru' => 'Url Ru',
            'url_en' => 'Url En',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ArticleCategory::className(), ['id' => 'category_id']);
    }

    public function getTitle()
    {
        if(\Yii::$app->language == 'ru'){
            return $this->title_ru;
        }
        if(\Yii::$app->language == 'uz'){
            return $this->title;
        }
        if(\Yii::$app->language == 'en'){
            return $this->title_en;
        }
        
    }

    public function getCategoryTitle()
    {
        if(\Yii::$app->language == 'ru'){
            return $this->category->title_ru;
        }
        if(\Yii::$app->language == 'uz'){
            return $this->category->title;
        }
        if(\Yii::$app->language == 'en'){
            return $this->category->title_en;
        }
        
    }
}
