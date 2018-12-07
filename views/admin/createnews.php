<?php
if ($_SESSION['arg'] === true) {
	echo "the news was inserted";
} else {
	echo "the news was NOT inserted";
}
?>
<section class="createnews">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2 class="createnews">Создать новость</h2>
                <form action="<?php echo URL ?>admin/createnews" method="post" enctype="multipart/form-data"
                      class="form-create">
                    <label for="news_name_create">Название статьи:</label>
                    <input type="text" name="news_name" id="news_name_create" class="form-control">
                    <label for="comments_create">Текст статьи:</label>
                    <textarea class="form-control" name="news_text" id="comments_create"></textarea>
                    <input name="news_img" type="file" accept="image/*" value="Обзор">
                    <input type="submit"class="btn btn-control" name="addnews"value="Отправить">
                </form>
            </div>
        </div>
    </div>
    </div>
</section>


<?php
//if ($_SESSION['arg'] === true){
//	echo "the news was inserted";
//} else{
//    echo "the news was NOT inserted";
//}
//?>
<!--<section class="createnews">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-12 col-md-12">-->
<!--                <h2 class="createnews">Создать новость</h2>-->
<!--                <form action="--><?php //echo URL?><!--admin/createnews" method="post" enctype="multipart/form-data" class="form-create">-->
<!--                        <label for="news_name_create">Название статьи:</label>-->
<!--                        <input type="text" name="news_name" id="news_name_create" class="form-control">-->
<!--                        <br>-->
<!--                        <label for="comments_create">Текст статьи:</label>-->
<!--                        <textarea class="form-control" name="news_text" id="comments_create"></textarea>-->
<!---->
<!--                        <input type="file"  name="news_img"  accept="image/*"  value="Обзор">-->
<!--                        <button class="btn btn-control" type="submit" name="addnews">Отправить</button>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
