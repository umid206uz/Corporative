<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "page".
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
 * @property int|null $status
 * @property int $index
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'title_ru', 'title_en', 'url', 'url_ru', 'url_en', 'meta_title', 'meta_title_ru', 'meta_title_en', 'meta_description', 'meta_description_ru', 'meta_description_en', 'description', 'description_ru', 'description_en', 'index'], 'required'],
            [['description', 'description_ru', 'description_en'], 'string'],
            [['status', 'index'], 'integer'],
            [['title', 'title_ru', 'title_en', 'url', 'url_ru', 'url_en', 'meta_title', 'meta_title_ru', 'meta_title_en'], 'string', 'max' => 255],
            [['meta_description', 'meta_description_ru', 'meta_description_en'], 'string', 'max' => 500],
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
            'status' => 'Status',
            'index' => 'Index',
        ];
    }
}
