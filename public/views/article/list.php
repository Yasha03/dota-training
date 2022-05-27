<link rel="stylesheet" type="text/css" href="/public/css/article_list.css">


<div class="articles-list-wrapper">
    <div class="articles-list">
        <?
        foreach ($articles as $article) {
            echo '<div onclick="location.href=\'/article/view/'.$article->url.'\';" class="article-div" style="background: linear-gradient( rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.9) ), url('.$article->url_image.') no-repeat; background-size: 100%;">';

            echo '<div class="div-title-article"><p>'.$article->title.'</p></div>';

            echo '<div class="div-author-article"><p><b>Автор: '.$article->author.'</b></p></div>';

            echo '<div class="div-date-article"><p>'.date("d.m.Y H:i", strtotime($article->date)).'</p></div>';

            echo '</div>';
        }
        ?>
    </div>
</div>