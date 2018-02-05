<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rtipo_post".
 *
 * @property int $ridtipo_post
 * @property string $rnombreTipoPost
 *
 * @property Ractividad[] $ractividads
 */
class RtipoPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rtipo_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rnombreTipoPost'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ridtipo_post' => 'Ridtipo Post',
            'rnombreTipoPost' => 'Rnombre Tipo Post',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRactividads()
    {
        return $this->hasMany(Ractividad::className(), ['ridtipo_post' => 'ridtipo_post']);
    }
}
