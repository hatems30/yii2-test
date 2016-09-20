<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "channel_wind_deductible".
 *
 * @property integer $id
 * @property double $wind_deductible_buy_back_limit
 * @property double $deductible
 * @property double $base_rate
 * @property double $credit_modification
 * @property double $debit_modification
 * @property double $premium_price
 */
class ChannelWindDeductible extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'channel_wind_deductible';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wind_deductible_buy_back_limit', 'deductible', 'base_rate', 'credit_modification', 'debit_modification', 'premium_price'], 'number'],
      
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'wind_deductible_buy_back_limit' => 'Wind Deductible Buy Back Limit',
            'deductible' => 'Deductible',
            'base_rate' => 'Base Rate',
            'credit_modification' => 'Credit Modification',
            'debit_modification' => 'Debit Modification',
            'premium_price' => 'Premium Price',

        ];
    }
}
