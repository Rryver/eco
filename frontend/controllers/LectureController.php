<?php

namespace frontend\controllers;

use common\models\Conference;
use common\models\Lecture;
use common\models\LectureSearch;
use common\models\User;
use common\models\UserFiles;
use frontend\modules\conf1\Conf1;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * LectureController implements the CRUD actions for Lecture model.
 */
class LectureController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'update', 'view', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'update', 'view', 'delete'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Lecture models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LectureSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Lecture model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Lecture model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        /* @var $conference Conference */
        $conference = Conference::getConferenceById(Conf1::$confId);
        
        if ($conference->registrationIsClosed()) {
            throw new \yii\web\ForbiddenHttpException('Регистрация закрыта');
        }
        
        $model = new Lecture([
            'conference_id' => $conference->id,
        ]);

        if ($model->load(Yii::$app->request->post())) {
            $model->uploadFile = UploadedFile::getInstance($model, 'uploadFile');
            if (isset($model->uploadFile)) {
                $modelUserFile = new UserFiles();
                $modelUserFile->name = $model->uploadFile->baseName;
                $uploadedFilePath = 'uploads/Доклад. ' . $model->getFio() . " (" . $model->uploadFile->baseName . ').' . $model->uploadFile->extension;
                $model->uploadFile->saveAs($uploadedFilePath);
                $modelUserFile->save();
                $model->file_id = $modelUserFile->id;
            }


            if ($model->save()) {
                $lectureForm = new \frontend\docs\LectureForm($model);
                $lectureForm->saveFile();

                if (isset($model->uploadFile)) {}
//                    $this->sendRegistrationEmailWithUploadedFile($lectureForm->getFilePath(), $model->getFio(), $model->title, $model->getParticipationFormat(), $uploadedFilePath);
//                else
//                    $this->sendRegistrationEmailWithoutUploadedFile($lectureForm->getFilePath(), $model->getFio(), $model->title, $model->getParticipationFormat());
//                $this->sendConfirmationEmail($model->email);

                $lectureForm->deleteFile();

                $this->setFlash();
            }
            if (Yii::$app->user->isGuest) {
                return $this->goHome();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    
    protected function sendRegistrationEmailWithUploadedFile($filepath, $fio, $reportTitle, $participationFormat, $uploadedFilePath = null)
    {
            return Yii::$app->mailer->compose()
                ->setFrom([Yii::$app->params['supportEmail'] => 'Сайт Российского научного форума'])
                ->setTo(Yii::$app->params['adminEmail'])
                ->setSubject('Регистрация. Форум. ' . $fio)
                ->setHtmlBody($fio . ", " . $participationFormat . ", Тема доклада: " . $reportTitle . ". Регистрация прошла успешно")
                ->attach($filepath)
                ->attach($uploadedFilePath)
                ->send();
    }

    protected function sendRegistrationEmailWithoutUploadedFile($filepath, $fio, $reportTitle, $participationFormat)
    {
            return Yii::$app->mailer->compose()
                ->setFrom([Yii::$app->params['supportEmail'] => 'Сайт Российского научного форума'])
                ->setTo(Yii::$app->params['adminEmail'])
                ->setSubject('Регистрация на сайте. Форум. ' . $fio)
                ->setHtmlBody($fio . ", " . $participationFormat . ", Тема доклада: " . $reportTitle . ". Регистрация прошла успешно")
                ->attach($filepath)
                ->send();
    }


    
    protected function sendConfirmationEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setFrom([Yii::$app->params['supportEmail'] => 'Сайт Российского научного форума'])
            ->setTo($email)
            ->setSubject(' Регистрация доклада')
            ->setHtmlBody('Регистрация прошла успешно. Письмо о вашей регистрации так же отправлено на почту орг. комитета eco2020@volnc.ru')
            ->send();
    }
    
    protected function setFlash()
    {
        Yii::$app->session->setFlash('success', 'Регистрация прошла успешно');
    }

    /**
     * Updates an existing Lecture model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Lecture model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Lecture model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Lecture the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lecture::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
