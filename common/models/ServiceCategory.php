<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "service_category".
 *
 * @property int $id
 * @property string $title
 * @property string $title_ru
 * @property string $title_en
 * @property string $url
 * @property string $url_ru
 * @property string $url_en
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
 * @property int|null $status
 *
 * @property Service[] $services
 */
class ServiceCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_category';
    }

    /**
     * {@inheritdoc}
     */
    public $picture;
    public function rules()
    {
        return [
            [['title', 'title_ru', 'title_en', 'url', 'url_ru', 'url_en', 'meta_title', 'meta_title_ru', 'meta_title_en', 'meta_description', 'meta_description_ru', 'meta_description_en', 'description', 'description_ru', 'description_en', 'filename', 'created_date'], 'required'],
            [['description', 'description_ru', 'description_en'], 'string'],
            [['status'], 'integer'],
            [['title', 'title_ru', 'title_en', 'url', 'url_ru', 'url_en', 'meta_title', 'meta_title_ru', 'meta_title_en', 'filename', 'created_date'], 'string', 'max' => 255],
            [['meta_description', 'meta_description_ru', 'meta_description_en'], 'string', 'max' => 500],
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
            'title' => 'Title',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'url' => 'Url',
            'url_ru' => 'Url Ru',
            'url_en' => 'Url En',
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
        ];
    }

    /**
     * Gets query for [[Services]].
     *
     * @return \yii\db\ActiveQuery
     */
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
    
    public function getServices()
    {
        return $this->hasMany(Service::className(), ['category_id' => 'id']);
    }
}
