<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "rombongan_belajar".
 *
 * @property integer $id
 * @property string $kode
 * @property integer $thn_masuk
 * @property string $dosen_pa
 *
 * @property Mahasiswa[] $mahasiswas
 * @property Dosen $dosenPa
 */
class RombonganBelajar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rombongan_belajar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['thn_masuk'], 'integer'],
            [['dosen_pa'], 'required'],
            [['kode', 'dosen_pa'], 'string', 'max' => 10],
            [['kode'], 'unique'],
            [['dosen_pa'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['dosen_pa' => 'nidn']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode' => 'Kode',
            'thn_masuk' => 'Thn Masuk',
            'dosen_pa' => 'Dosen Pa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMahasiswas()
    {
        return $this->hasMany(Mahasiswa::className(), ['rombel_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDosenPa()
    {
        return $this->hasOne(Dosen::className(), ['nidn' => 'dosen_pa']);
    }
}
