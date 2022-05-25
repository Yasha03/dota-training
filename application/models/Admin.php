<?php

namespace application\models;

use application\core\Model;
use RedBeanPHP\R as R;


class Admin extends Model
{
    public function createTest($title){
        $title = trim($title);
        if(strlen($title) > 3 && strlen($title) < 256){
            $test = R::dispense('tests');
            $test->title = $title;
            R::store($test);
        }
    }

    public function addQuestion($data, $idTest){
        $arr_answers = [];

        for ($i = 1; $i < 11; $i++){
            if(!empty($data['answer_'.$i])){
                if(!empty($data['true_answer_'.$i])){
                    $arr_answers[] = [$data['answer_'.$i], '1'];
                }else{
                    $arr_answers[] = [$data['answer_'.$i], '0'];
                }
            }
        }

        $question = R::dispense('questions');
        $question->question = trim($data['question_text']);
        $question->answers = json_encode($arr_answers);
        $question->test_id = $idTest;
        R::store($question);

    }

    public function getTestListString(){
        $str = '';
        $tests = R::findAll('tests', 'id > ?', array(0));

        foreach ($tests as $test) {
            $questionsCount = R::count('questions', 'test_id = ?', array($test->id));
            $str .= '<div class="test_div">';
            $str .= '<div class="test_image"><img src="https://img.championat.com/news/big/d/v/patch-7-29-dlya-dota-2-dobavil-novogo-geroya-izmenil-kartu-i-balans_1618040102852038523.jpg"></div>';
            $str .= '<div class="test_info"><div><p class="test_name"><a href="/tests/solve/'.$test->id.'/1">'.$test->title.'</a></p></div>';
            $str .= '<div><p><a href="/admin/question/create/'.$test->id.'">Добавить вопрос</a></p></div>';
            $str .= '<div><p>Кол-во вопросов: '.$questionsCount.'</p></div></div>';
            $str .= '</div>';
        }

        return $str;
    }
}