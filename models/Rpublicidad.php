<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rpublicidad".
 *
 * @property int $ridPublicidad
 * @property string $rdescripcion
 * @property string $rfoto
 * @property int $rutEmpresa
 *
 * @property Empresas $rutEmpresa0
 */
class Rpublicidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'rpublicidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rdescripcion', 'rfoto', 'rutEmpresa'], 'required'],
            [['rutEmpresa'], 'integer'],
            [['rfoto'], 'file'],
            [['file'], 'file', 'maxSize' => 8120000, 'tooBig' => 'excede el limite, 8 MB Aprox', 'extensions' => 'png, jpg'],
            [['rdescripcion'], 'string', 'max' => 200],
            [['rlink'], 'string', 'max' => 200],
            [['rutEmpresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresas::className(), 'targetAttribute' => ['rutEmpresa' => 'rutEmpresa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ridPublicidad' => 'Rid Publicidad',
            'rdescripcion' => 'Descripción',
            'rfoto' => 'Foto',
            'rutEmpresa' => 'Empresa',
            'rlink' => 'Link externo'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutEmpresa0()
    {
        return $this->hasOne(Empresas::className(), ['rutEmpresa' => 'rutEmpresa']);
    }
}
