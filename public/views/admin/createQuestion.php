<style>
    .text_answer{
        margin: 20px 0px;
    }
</style>

<form action="/admin/question/create/<? echo $idTest; ?>" method="post" style="width: 500px;">
    <h4>Вопрос:</h4>
    <textarea name="question_text"></textarea><br>

    Кол-во ответов:
    <select onchange="select_count_ans();" id="select_count_answer">
        <? for ($i = 2; $i < 11; $i++){
            echo '<option value="'.$i.'">'.$i.'</option>';
        } ?>
    </select>



    <div class="texts_answers_div" style="margin-top: 50px">
        Ответы:
        <? for ($i = 1; $i < 11; $i++){
            if($i > 2) {
                echo '<div class="text_answer" style="display: none;" id="answer_' . $i . '">';
            }else{
                echo '<div class="text_answer" style="display: block;" id="answer_' . $i . '">';
            }
            echo '<h4>Ответ №'.$i.'</h4>';
            echo '<textarea name="answer_'.$i.'"></textarea>';
            echo '<input type="checkbox" name="true_answer_'.$i.'">
            <label for="horns">Ответ верный</label>';
            echo '</div>';
        }?>
    </div>


    <input class="btn btn-submit" type="submit" value="Добавить вопрос" style="margin-top: 20px;">
</form>


<script>
    console.log('w');
    function select_count_ans() {
        let val = parseInt(document.getElementById('select_count_answer').value);
        for(let i = 1; i < 11; i++){
            document.getElementById('answer_'+i).style.display = 'none';
        }
        for (let i = 1; i < val+1; i++){
            document.getElementById('answer_'+i).style.display = 'block';
        }
    }
</script>
