<?php

class QuestionAdminForm extends CFormModel
{
    public $id;
    public $question;
    public $answer;
    public $visible = 0;
    public $sort = 0;
    public $answered = 0;
    public $respondent = '';
    public $a_date;// = time();


    public function rules()
    {
        return array(
            array('question, answer, visible, sort', 'required'), //, 'message'=>'Поле не может быть пустым!'),
            //array('question', 'minLength'),
            //array('email', 'email', 'message'=>'Некорректный адрес электронной почты!'),
            //array('captcha', 'CaptchaExtendedValidator', 'allowEmpty'=>!Yii::app()->user->isGuest, 'message'=>'Неверно введён код с картинки!' ),
        );
    }

/*---------------------------------------------------------------------*/
    // public function minLength($attribute, $params) {
    // 		if (strlen($this->question)<30) {
    // 			$this->addError('question', 'Слишком короткий вопрос!');
    // 		}
    // }
/*---------------------------------------------------------------------*/
    public function attributeLabels()
    {
        return array(
            'id' => 'id',
            'question' => 'Вопрос',
            'answer' => 'Ответ',
            'visible' => 'Показывать вопрос на странице',
            'sort' => 'Сортировка',
            'answered' => 'На вопрос дан полный ответ',
            'respondent' => 'На вопрос отвечал',
        );
    }
}