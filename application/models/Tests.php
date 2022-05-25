<?php
namespace application\models;
use application\core\Model;
use RedBeanPHP\R as R;

class Tests extends Model{

    public function loadQuestion($next, $idTest){
        $str = '<div class="question_content">';

        if(isset($_POST['points'])){
            $currentPoints = $_POST['points'];
        }else{
            $currentPoints = 0;
        }

        $questions = R::find('questions', 'test_id = ?', array($idTest));
        $question = $questions[array_keys($questions)[$next-1]];

        if($next > count($questions)){
            return $this->getStrEndTest($idTest, $currentPoints);
        }

        $str .= '<div class="question_text"><p>'.$question->question.'</p></div>';

        $str .= '<form id="question_form" action="/tests/solve/'.$idTest.'/'.($next+1).'" method="post">';

        $str .= $this->getStrAnswers($question);

        $str .= '<input type="hidden" id="points" name="points" value="'.$currentPoints.'">';

        $str .= '</form></div>';

        return $str;
    }

    public function loadTest($idTest){
        return R::load('tests', $idTest);
    }

    public function getStrEndTest($idTest, $points){
        $str = '';
        $test = R::load('tests', $idTest);
        $maxPoints = R::count('questions', 'test_id = ?', array($idTest));

        $str .= '<div class="result_test_content">';
        $str .= '<h2>'.$test->title.'</h2>';
        $str .= '<h2>Вы набрали '.$points.' из '.$maxPoints.' баллов!</h2>';
        $str .= '<p><a href="/tests/list">Список тестов</a></p>';


        $str .= '</div>';
        return $str;
    }

    public function getStrAnswers($question){
        $str = '';
        $answers = json_decode($question->answers);
        $n = 1;
        foreach ($answers as $answer) {
            $answerText = $answer[0];
            $trueAnswer = $answer[1] == 1 ? 1 : 0;

            $str .= '<button id="ans_button_'.$n.'" class="ans_button" type="button" onclick="checkAnswer('.$trueAnswer.', '.$n.')">'.$answerText.'</button>';
            $n++;
        }

        return $str;
    }

    public function getTestListStr(){
        $str = '';
        $tests = R::findAll('tests', 'id > ?', array(0));

        foreach ($tests as $test) {
            $questionsCount = R::count('questions', 'test_id = ?', array($test->id));
            $str .= '<div class="test_div">';
            $str .= '<div class="test_image"><img src="https://img.championat.com/news/big/d/v/patch-7-29-dlya-dota-2-dobavil-novogo-geroya-izmenil-kartu-i-balans_1618040102852038523.jpg"></div>';
            $str .= '<div class="test_info"><div><p class="test_name"><a href="/tests/solve/'.$test->id.'/1">'.$test->title.'</a></p></div>';
            $str .= '<div><p>Уровень сложности: <b>средний</b></p></div>';
            $str .= '<div><p>Кол-во вопросов: '.$questionsCount.'</p></div></div>';
            $str .= '</div>';
        }

        return $str;
    }


}