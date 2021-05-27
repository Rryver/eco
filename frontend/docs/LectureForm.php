<?php

namespace frontend\docs;

use common\models\Lecture;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\TblWidth;
use PhpOffice\PhpWord\Style\Table;

class LectureForm
{
    protected $lecture;
    protected $phpWord;
    protected $table;
    
    public function __construct(Lecture $lecture)
    {
        $this->lecture = $lecture;
        
        $this->init();
    }
    
    public function init()
    {
        $this->phpWord = new PhpWord();
        $section = $this->phpWord->addSection();
        $this->table = $section->addTable($this->getStyle());
        
        $lecture = $this->lecture;
        $this->addRow('Ф.И.О', $lecture->getFio());
        $this->addRow('Страна', $lecture->country);
        $this->addRow('Город', $lecture->city);
        $this->addRow('Возраст, лет', $lecture->age);
        $this->addRow('Место работы', $lecture->place_work);
        $this->addRow('Должность', $lecture->position);
        $this->addRow('Ученая степень', $lecture->getDegree());
        $this->addRow('Ученое звание', $lecture->getRank());
        $this->addRow('Контактные данные: номер телефона, адрес электронной почты ', "$lecture->phone, $lecture->email");
        $this->addRow('Тема доклада', $lecture->title);
        $this->addRow('Секция', isset($lecture->section) ? $lecture->section->title : '');
        $this->addRow('Формат участия', $lecture->getParticipationFormat());
        //$this->addRow('Номер проекта РФФИ, в рамках которого выполняется исследование', $lecture->project_number);
    }
    
    public function getStyle()
    {
        $tableStyle = new Table;
        $tableStyle->setBorderColor('000000');
        $tableStyle->setBorderSize(1);
        $tableStyle->setUnit(TblWidth::PERCENT);
        return $tableStyle;
    }
    
    public function getFilePath()
    {
        //return \Yii::getAlias(sys_get_temp_dir() . "/{$this->lecture->id}.docx");
        return \Yii::getAlias(sys_get_temp_dir() . "/{$this->lecture->getFio()}_заявка.docx");
    }
    
    public function addRow($col1Text, $col2Text)
    {
        $row = $this->table->addRow();
        $row->addCell()->addText($col1Text);
        $row->addCell()->addText($col2Text);
    }
    
    public function saveFile()
    {
        $objWriter = IOFactory::createWriter($this->phpWord, 'Word2007');
        
        $objWriter->save($this->getFilePath());
    }
    
    public function deleteFile()
    {
        $filePath = $this->getFilePath();
        
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}
