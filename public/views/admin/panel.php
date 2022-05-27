<link rel="stylesheet" type="text/css" href="/public/css/admin_panel.css">

<div class="tests_admin">
    <a onclick="openSectionTestsList();" id="a_tests_list" style="cursor: pointer">Развернуть список тестов</a>
    <div class="tests_list" id="tests_list" style="display: none;">
        <? echo $testListString ?>
    </div>


    <div class="new_test_div">
        <p><a href="/admin/test/create">Создать новый тест</a></p>
    </div>
    <div class="new_article_div">
        <p><a href="/article/new">Создать новую статью</a></p>
    </div>
</div>

<script type="text/javascript">

    function openSectionTestsList()
    {
        elem = document.getElementById('tests_list');
        href = document.getElementById('a_tests_list');

        if(elem.style.display == 'none') {
            elem.style.display = 'flex';
            href.innerHTML = 'Свернуть список тестов'
        }else {
            elem.style.display = 'none';
            href.innerHTML = 'Развернуть список тестов'
        }
    }
</script>