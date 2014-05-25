<?php

/**
 * This is the model class for table "Gasto".
 *
 * The followings are the available columns in table 'Gasto':
 * @property integer $Gid
 * @property string $Fecha
 * @property string $Descripcion
 * @property string $Monto
 * @property integer $IdCategoria
 * @property integer $IdUsuario
 *
 * The followings are the available model relations:
 * @property Categoria $idCategoria
 * @property Usuario $idUsuario
 */
class Gasto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gasto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Descripcion, IdCategoria', 'required'),
			array('IdCategoria', 'numerical', 'integerOnly'=>true),
			array('Descripcion', 'length', 'max'=>300),
			array('Monto', 'length', 'max'=>8),
			array('Fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Gid, Fecha, Descripcion, Monto, IdCategoria, IdUsuario', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idCategoria' => array(self::BELONGS_TO, 'Categoria', 'IdCategoria'),
                        'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'IdUsuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Gid' => 'Id',
			'Fecha' => 'Fecha',
			'Descripcion' => 'Descripcion',
			'Monto' => 'Monto',
			'IdCategoria' => 'Categoría',
                        'IdUsuario' => 'Usuario',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Gid',$this->Gid);
		$criteria->compare('Fecha',$this->Fecha,true);
		$criteria->compare('Descripcion',$this->Descripcion,true);
		$criteria->compare('Monto',$this->Monto,true);
		$criteria->compare('IdCategoria',$this->IdCategoria);
                $criteria->compare('IdUsuario', $this->IdUsuario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Gasto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function beforeSave() {
            if ($this->isNewRecord) {
                $this->IdUsuario = Yii::app()->user->id;
            }
            return parent::beforeSave();
        }
        
        public function getFechaFormateada() {
            return Yii::app()->dateFormatter->format('dd-MM-yyyy', $this->Fecha);
        }
        
        public function getDescripcionCategoria() {
            return $this->idCategoria->Descripcion;
        }
}
