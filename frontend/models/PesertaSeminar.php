<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "peserta_seminar".
 *
 * @property integer $id
 * @property integer $seminar_ta_id
 * @property string $mahasiswa_nim
 * @property string $status
 *
 * @property Mahasiswa $mahasiswaNim
 * @property SeminarTa $seminarTa
 */
class PesertaSeminar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'peserta_seminar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'seminar_ta_id', 'mahasiswa_nim'], 'required'],
            [['id', 'seminar_ta_id'], 'integer'],
            [['mahasiswa_nim'], 'string', 'max' => 15],
            [['status'], 'string', 'max' => 10],
            [['mahasiswa_nim'], 'exist', 'skipOnError' => true, 'targetClass' => Mahasiswa::className(), 'targetAttribute' => ['mahasiswa_nim' => 'nim']],
            [['seminar_ta_id'], 'exist', 'skipOnError' => true, 'targetClass' => SeminarTa::className(), 'targetAttribute' => ['seminar_ta_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'seminar_ta_id' => 'Seminar Ta ID',
            'mahasiswa_nim' => 'Mahasiswa Nim',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMahasiswaNim()
    {
        return $this->hasOne(Mahasiswa::className(), ['nim' => 'mahasiswa_nim']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeminarTa()
    {
        return $this->hasOne(SeminarTa::className(), ['id' => 'seminar_ta_id']);
    }
}
