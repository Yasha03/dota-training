<link rel="stylesheet" type="text/css" href="/public/css/article_new.css">
<script src="https://cdn.tiny.cloud/1/up5lls74mx7w6js23dii0ul03s531jq24umg79ru559e4q2k/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>



<div class="article-form-content">
    <form action="/article/new" method="post">
    <div class="article-name-div">
        <div id="titlediv">
            <label id="title-prompt-text" for="title">Добавить заголовок</label>
            <input oninput="input_title()" class="article-name-input" type="text" name="title" size="30" id="title" spellcheck="true" autocomplete="off">
        </div>
    </div>
    <div class="article-url-rename">
        <p class="url-article-p"><b>Постоянная ссылка:</b> <span class="url"><? echo $_SERVER['HTTP_HOST']; ?>/article/view/<input type="text" name="url"></p></span>
    </div>
    <div class="content-article">
        <textarea name="content">

        </textarea>
    </div>
    <div class="url-image-div">
        <p><b>URL изображения обложки: </b><input type="text" name="url_image"></p>
    </div>
    <div class="submit-button-article">
        <input class="btn btn-submit" type="submit" value="Добавить статью" style="margin-top: 20px;">
    </div>
    </form>
</div>


<script type="text/javascript">
    function input_title(){
        let input = document.getElementById('title');
        let label = document.getElementById('title-prompt-text');
        if(input.value.length != 0){
            label.innerHTML = '';
        }else{
            label.innerHTML = 'Добавить заголовок';
        }
    }
</script>









<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });
</script>