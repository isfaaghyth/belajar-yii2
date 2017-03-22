<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "mahasiswa".
 *
 * @property string $nim
 * @property string $nama
 * @property string $tmp_lahir
 * @property string $tgl_lahir
 * @property double $ipk
 * @property integer $prodi_id
 * @property integer $rombel_id
 *
 * @property Prodi $prodi
 * @property RombonganBelajar $rombel
 * @property PesertaSeminar[] $pesertaSeminars
 * @property Seminar[] $seminars
 * @property SeminarTa[] $seminarTas
 */
class Mahasiswa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mahasiswa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nim', 'prodi_id', 'rombel_id'], 'required'],
            [['tgl_lahir'], 'safe'],
            [['ipk'], 'number'],
            [['prodi_id', 'rombel_id'], 'integer'],
            [['nim'], 'string', 'max' => 15],
            [['nama'], 'string', 'max' => 45],
            [['tmp_lahir'], 'string', 'max' => 30],
            [['prodi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Prodi::className(), 'targetAttribute' => ['prodi_id' => 'id']],
            [['rombel_id'], 'exist', 'skipOnError' => true, 'targetClass' => RombonganBelajar::className(), 'targetAttribute' => ['rombel_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nim' => 'Nim',
            'nama' => 'Nama',
            'tmp_lahir' => 'Tmp Lahir',
            'tgl_lahir' => 'Tgl Lahir',
            'ipk' => 'Ipk',
            'prodi_id' => 'Prodi ID',
            'rombel_id' => 'Rombel ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdi()
    {
        return $this->hasOne(Prodi::className(), ['id' => 'prodi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRombel()
    {
        return $this->hasOne(RombonganBelajar::className(), ['id' => 'rombel_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesertaSeminars()
    {
        return $this->hasMany(PesertaSeminar::className(), ['mahasiswa_nim' => 'nim']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeminars()
    {
        return $this->hasMany(Seminar::className(), ['mahasiswa_nim' => 'nim']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeminarTas()
    {
        return $this->hasMany(SeminarTa::className(), ['mahasiswa_nim' => 'nim']);
    }
}
