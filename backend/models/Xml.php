<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "xml".
 *
 * @property int    $id
 * @property string $name
 * @property int    $code
 * @property int    $weight
 * @property int    $quantity_0
 * @property float  $price_0
 * @property int    $quantity_1
 * @property float  $price_1
 * @property int    $quantity_2
 * @property float  $price_2
 * @property int    $quantity_3
 * @property float  $price_3
 * @property int    $quantity_4
 * @property float  $price_4
 * @property int    $quantity_5
 * @property float  $price_5
 * @property int    $quantity_6
 * @property float  $price_6
 * @property int    $quantity_7
 * @property float  $price_7
 * @property string $usages
 */
class Xml extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {

        return 'xml';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {

        return [
                [
                        [
                                'name',
                                'code',
                                'weight',
                                'quantity_0',
                                'price_0',
                                'quantity_1',
                                'price_1',
                                'quantity_2',
                                'price_2',
                                'quantity_3',
                                'price_3',
                                'quantity_4',
                                'price_4',
                                'quantity_5',
                                'price_5',
                                'quantity_6',
                                'price_6',
                                'quantity_7',
                                'price_7',
                                'usages'],
                        'required'],
                [
                        [
                                'code',
                                'quantity_0',
                                'quantity_1',
                                'quantity_2',
                                'quantity_3',
                                'quantity_4',
                                'quantity_5',
                                'quantity_6',
                                'quantity_7'],
                        'integer'],
                [
                        [
                                'weight',
                                'price_0',
                                'price_1',
                                'price_2',
                                'price_3',
                                'price_4',
                                'price_5',
                                'price_6',
                                'price_7'],
                        'number'],
                [
                        ['name'],
                        'string',
                        'max' => 255],
                [
                        ['usages'],
                        'string',
                        'max' => 1024],];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {

        return [
                'id'         => 'ID',
                'name'       => 'Name',
                'code'       => 'Code',
                'weight'     => 'Weight',
                'quantity_0' => 'Quantity 0',
                'price_0'    => 'Price 0',
                'quantity_1' => 'Quantity 1',
                'price_1'    => 'Price 1',
                'quantity_2' => 'Quantity 2',
                'price_2'    => 'Price 2',
                'quantity_3' => 'Quantity 3',
                'price_3'    => 'Price 3',
                'quantity_4' => 'Quantity 4',
                'price_4'    => 'Price 4',
                'quantity_5' => 'Quantity 5',
                'price_5'    => 'Price 5',
                'quantity_6' => 'Quantity 6',
                'price_6'    => 'Price 6',
                'quantity_7' => 'Quantity 7',
                'price_7'    => 'Price 7',
                'usages'     => 'Usages',];
    }

    /**
     * @return array
     */
    public function getFilesNames()
    {

        $importFiles = $offersFiles = scandir(__DIR__.'/../web/data');
        foreach ($importFiles as $i => $importFile) if (strpos($importFile, 'import') === false) unset($importFiles[$i]);
        foreach ($offersFiles as $i => $offersFile) if (strpos($offersFile, 'offers') === false) unset($offersFiles[$i]);
        sort($importFiles);
        sort($offersFiles);

        return [
                $importFiles,
                $offersFiles];
    }

    public function getXmlFile()
    {

        $firstFile = Xml :: getFilesNames();

        return simplexml_load_string(file_get_contents(__DIR__.'/../web/data/'.$firstFile[0][0]));
    }

}
