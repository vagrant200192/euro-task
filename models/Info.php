<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "info".
 *
 * @property integer $id
 * @property string $comment
 * @property integer $rating
 * @property integer $product_id
 * @property integer $user_id
 */
class Info extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment'], 'string'],
            [['rating', 'product_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comment' => 'Comment',
            'rating' => 'Rating',
            'product_id' => 'Product ID',
            'user_id' => 'User ID',
        ];
    }

	public function addedAttribute($rating, $comment, $product_id, $user_id)
	{
		$this->rating = $rating;
		$this->comment = $comment;
		$this->product_id = $product_id;
		$this->user_id = $user_id;
	}
}
