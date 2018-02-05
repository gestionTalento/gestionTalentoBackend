<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "restadisticas".
 *
 * @property int $idestadisticas
 * @property int $rlikes
 * @property int $rcomentarios
 * @property int $rlikesr
 * @property int $rcomentariosr
 * @property int $rcontadorP
 *
 * @property Colaborador[] $colaboradors
 */
class Restadisticas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'restadisticas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rlikes', 'rcomentarios', 'rlikesr', 'rcomentariosr', 'rcontadorP'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idestadisticas' => 'Id Estadisticas',
            'rlikes' => 'Contador Likes Realizados',
            'rcomentarios' => 'Contador Likes Realizados',
            'rlikesr' => 'Contador Likes Recibidos',
            'rcomentariosr' => 'Contador Comentarios Recibidos',
            'rcontadorP' => 'Rotador P',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColaboradors()
    {
        return $this->hasMany(Colaborador::className(), ['idestadisticas' => 'idestadisticas']);
    }
}
