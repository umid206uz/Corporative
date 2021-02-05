<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article_category".
 *
 * @property int $id
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
 * @property string $url
 * @property string $url_ru
 * @property string $url_en
 *
 * @property Article[] $articles
 */
class ArticleCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_category';
    }

    /**
     * {@inheritdoc}
     */
    public $picture;
    public function rules()
    {
        return [
            [['title', 'title_ru', 'title_en', 'meta_title', 'meta_title_ru', 'meta_title_en', 'meta_description', 'meta_description_ru', 'meta_description_en', 'description', 'description_ru', 'description_en', 'filename', 'created_date', 'status', 'url', 'url_ru', 'url_en'], 'required'],
            [['description', 'description_ru', 'description_en'], 'string'],
            [['status'], 'integer'],
            ['url', 'checkUniq'],
            [['title', 'title_ru', 'title_en', 'meta_title', 'meta_title_ru', 'meta_title_en', 'meta_description_en', 'filename', 'created_date', 'url', 'url_ru', 'url_en'], 'string', 'max' => 255],
            [['meta_description', 'meta_description_ru'], 'string', 'max' => 500],
            ['picture', 'file', 'extensions' => ['jpg', 'jpeg', 'png', 'gif'], 'skipOnEmpty' => true],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ArticleCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function checkUniq($attribute, $params)
    {
        $user = self::find()->where(['url'=>$this->url])->one();
        if (isset($user) && $user!=null)
            $this->addError($attribute, 'User already added.');
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
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
            'url' => 'Url',
            'url_ru' => 'Url Ru',
            'url_en' => 'Url En',
        ];
    }

    
    /**
     * Gets query for [[Articles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['category_id' => 'id']);
    }
}
