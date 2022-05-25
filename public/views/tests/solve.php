<link rel="stylesheet" type="text/css" href="/public/css/test_solve.css">


<?php

echo $str_question;

?>

<div id="goSendFormPage"></div>



<script type="text/javascript">
    function checkAnswer(trueAns, n) {
        for(let i = 1; i < 11; i++){
            if(document.getElementById('ans_button_' + i)) {
                document.getElementById('ans_button_' + i).classList.add('passive_but');
                document.getElementById('ans_button_' + i).onclick = null;
            }
        }
        let but = document.getElementById('ans_button_' + n);
        but.classList.remove("passive_but");
        if(trueAns == 1){
            but.classList.add("green_but");
            document.getElementById('points').value = parseInt(document.getElementById('points').value) + 1;
        }else{
            but.classList.add("red_but");
        }

        setTimeout(() => {  document.getElementById('question_form').submit() }, 1000);

        console.log('вывод');

    }
</script>