<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "seminar".
 *
 * @property integer $id
 * @property string $tanggal
 * @property string $nama
 * @property string $tempat
 * @property string $keterangan
 * @property string $mahasiswa_nim
 *
 * @property Mahasiswa $mahasiswaNim
 */
class Seminar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seminar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal'], 'safe'],
            [['mahasiswa_nim'], 'required'],
            [['nama'], 'string', 'max' => 45],
            [['tempat', 'keterangan'], 'string', 'max' => 100],
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
            'nama' => 'Nama',
            'tempat' => 'Tempat',
            'keterangan' => 'Keterangan',
            'mahasiswa_nim' => 'Mahasiswa Nim',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMahasiswaNim()
    {
        return $this->hasOne(Mahasiswa::className(), ['nim' => 'mahasiswa_nim']);
    }
}
