<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "seminar_ta".
 *
 * @property integer $id
 * @property string $tanggal
 * @property string $judul
 * @property string $pembimbing
 * @property string $tempat
 * @property string $mahasiswa_nim
 *
 * @property PesertaSeminar[] $pesertaSeminars
 * @property Mahasiswa $mahasiswaNim
 */
class SeminarTA extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seminar_ta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'mahasiswa_nim'], 'required'],
            [['id'], 'integer'],
            [['tanggal'], 'safe'],
            [['judul', 'pembimbing', 'tempat'], 'string', 'max' => 45],
            [['mahasiswa_nim'], 'string', 'max' => 15],
            [['mahasiswa_nim'], 'exist', 'skipOnError' => true, 'targetClass' => Mahasiswa::className(), 'targetAttribute' => ['mahasiswa_nim' => 'nim']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tanggal' => 'Tanggal',
            'judul' => 'Judul',
            'pembimbing' => 'Pembimbing',
            'tempat' => 'Tempat',
            'mahasiswa_nim' => 'Mahasiswa Nim',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesertaSeminars()
    {
        return $this->hasMany(PesertaSeminar::className(), ['seminar_ta_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMahasiswaNim()
    {
        return $this->hasOne(Mahasiswa::className(), ['nim' => 'mahasiswa_nim']);
    }
}
