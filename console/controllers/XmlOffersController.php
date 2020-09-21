<?php

namespace console\controllers;

use console\models\XmlOffers;
use yii\console\Controller;
use yii\console\NotFoundHttpException;

/**
 * Class XmlOffersController
 * @package console\controllers
 */
class XmlOffersController extends Controller
{

    /**
     *
     */
    public function actionIndex()
    {

        ( new XmlOffers ) -> fillOffers();
        echo "\nFINISHED\n";
    }

}
