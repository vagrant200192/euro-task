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

	public static function getProductWithInfo()
	{
		$queryAll = new Query();
		$queryProductWithInfo = new Query();

		$arrayAllProduct = $queryAll->select(['id', 'title'])->from(self::tableName())->all();
		$arrayProductWithInfo = $queryProductWithInfo->select(['product.id', 'product.title', 'info.id AS info_id', 'info.comment', 'info.rating'])
				->from(self::tableName())
				->join('LEFT JOIN', 'info', 'product.id = info.product_id')
				->where('info.user_id=' . Yii::$app->getUser()->id)->all();

		$auxiliaryArray1 = [$arrayAllProduct, $arrayProductWithInfo];
		$auxiliaryArray2 = [];

		foreach($auxiliaryArray1 as $key => $arrayProducts){
			foreach($arrayProducts as $product){
				$auxiliaryArray2[$key][$product['id']] = $product;
			}
		}

		$result = $auxiliaryArray2[1] + $auxiliaryArray2[0];
		ksort($result);

		return $result;
	}
}
