<?php

namespace console\models;

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

        $importFiles = $offersFiles = scandir(__DIR__.'/../../backend/web/data/');
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

        return simplexml_load_string(file_get_contents(__DIR__.'/../../backend/web/data/'.$firstFile[0][0]));
    }

    public function fillImport()
    {

        $import = new Xml;
        $import -> deleteAll();
        $import -> save();
        $goods = Xml ::getXmlFile() -> Каталог -> Товары -> Товар;
        $count = 0;
        foreach ($goods as $good) {
            $name = $good -> Наименование;
            $code = $good -> Код;
            $weight = $good -> Вес;
            $interchange = $good -> Взаимозаменяемости -> Взаимозаменяемость;
            $interchanges = '';
            if (!empty($interchange)) {
                foreach ($interchange as $change) $interchanges .= $change -> Марка.'-'.$change -> Модель.'-'.$change -> КатегорияТС.'|';
                $interchangesTrimmed = trim($interchanges, '|');
            } else $interchangesTrimmed = '---';
            $import = new Xml;
            $import -> name = "$name";
            $import -> code = "$code";
            $import -> weight = "$weight";
            $import -> quantity_0 = '0';
            $import -> price_0 = '0';
            $import -> quantity_1 = '0';
            $import -> price_1 = '0';
            $import -> quantity_2 = '0';
            $import -> price_2 = '0';
            $import -> quantity_3 = '0';
            $import -> price_3 = '0';
            $import -> quantity_4 = '0';
            $import -> price_4 = '0';
            $import -> quantity_5 = '0';
            $import -> price_5 = '0';
            $import -> quantity_6 = '0';
            $import -> price_6 = '0';
            $import -> quantity_7 = '0';
            $import -> price_7 = '0';
            $import -> usages = "$interchangesTrimmed";
            $import -> save();
            $count++;
            if ($count % 1000 == 0) echo $count." обработано\n";
        }
        echo "\nВсего ".$count." товаров\n";
    }
}
