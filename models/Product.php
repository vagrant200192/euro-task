<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $title
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

	public function findInfo()
	{
		$query = new Query();
		$result = $query->select(['info.comment', 'info.rating', 'user.username'])
				->from('info')
				->join('LEFT JOIN', 'user', 'user.id = info.user_id')
				->where('product_id=:id', [':id' => $this->id])
				->all();
		return $result;
	}
}
