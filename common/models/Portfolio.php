<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "portfolio".
 *
 * @property int $id
 * @property int $category_id
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
 * @property int|null $view
 *
 * @property PortfolioCategory $category
 */
class Portfolio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $picture;
    public static function tableName()
    {
        return 'portfolio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'title_ru', 'title_en', 'url', 'url_ru', 'url_en', 'meta_title', 'meta_title_ru', 'meta_title_en', 'meta_description', 'meta_description_ru', 'meta_description_en', 'description', 'description_ru', 'description_en', 'filename', 'created_date'], 'required'],
            [['category_id', 'status', 'view'], 'integer'],
            [['description', 'description_ru', 'description_en'], 'string'],
            [['title', 'title_ru', 'title_en', 'url', 'url_ru', 'url_en', 'meta_title', 'meta_title_ru', 'meta_title_en', 'meta_description_en', 'filename', 'created_date'], 'string', 'max' => 255],
            [['meta_description', 'meta_description_ru'], 'string', 'max' => 500],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => PortfolioCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            ['picture', 'file', 'extensions' => ['jpg', 'jpeg', 'png', 'gif'], 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'title' => Yii::t('app', 'Title'),
            'title_ru' => Yii::t('app', 'Title Ru'),
            'title_en' => Yii::t('app', 'Title En'),
            'url' => Yii::t('app', 'Url'),
            'url_ru' => Yii::t('app', 'Url Ru'),
            'url_en' => Yii::t('app', 'Url En'),
            'meta_title' => Yii::t('app', 'Meta Title'),
            'meta_title_ru' => Yii::t('app', 'Meta Title Ru'),
            'meta_title_en' => Yii::t('app', 'Meta Title En'),
            'meta_description' => Yii::t('app', 'Meta Description'),
            'meta_description_ru' => Yii::t('app', 'Meta Description Ru'),
            'meta_description_en' => Yii::t('app', 'Meta Description En'),
            'description' => Yii::t('app', 'Description'),
            'description_ru' => Yii::t('app', 'Description Ru'),
            'description_en' => Yii::t('app', 'Description En'),
            'filename' => Yii::t('app', 'Filename'),
            'created_date' => Yii::t('app', 'Created Date'),
            'status' => Yii::t('app', 'Status'),
            'view' => Yii::t('app', 'View'),
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(PortfolioCategory::className(), ['id' => 'category_id']);
    }
}
