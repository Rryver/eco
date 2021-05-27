<?php
namespace frontend\components;

class DefaultController extends \yii\web\Controller
{
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionParticipationTerms()
    {
        return $this->render('participationTerms');
    }

    public function actionReportsRequirements()
    {
        return $this->render('reportsRequirements');
    }

    public function actionApplicationForm()
    {
        return $this->render('applicationForm');
    }

    public function actionProgram()
    {
        return $this->render('program');
    }

    public function actionResults()
    {
        return $this->render('results');
    }
    
    public function actionContacts()
    {
        return $this->render('@frontend/views/site/contacts');
    }

    public function actionLinks()
    {
        return $this->render('@frontend/views/site/links');
    }

    public function actionStorage() {
        return $this->render('@frontend/views/site/storage');
    }
}
