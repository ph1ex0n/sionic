<?php

namespace console\controllers;

use console\models\Xml;
use yii\console\Controller;
use yii\console\NotFoundHttpException;

/**
 * XmlController implements the CRUD actions for Xml model.
 */
class XmlController extends Controller
{

    /**
     * Lists all Xml models.
     * @return mixed
     */
    public function actionIndex()
    {

        ( new Xml ) -> fillImport();
        echo "\nFINISHED\n";
    }

}
