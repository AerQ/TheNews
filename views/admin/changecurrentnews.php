<?php
if ($_SESSION['arg'] == true){
	echo '<div>Вы изменили новость</div>';
}else{
	echo '<div>Новость не изменена</div>';

}
?>
<section class="change_currentnews">
	<div class="container">
		<div class="row">
            <div class="col-lg-12">
				<h2 class="createnews">Изменить текущую новость</h2>

				<form action="<?php echo URL?>admin/changecurrentnews/<?echo $arg1[0]['id'];?>" method="post" name="change_current_news" class="change_current_news">
				<input type="hidden" name="id" value="<?php echo $arg1[0]['id'];?>">
				<label for="news_name">News name</label>
				<input type="text" name="news_name" id="news_name" class="form-control" value="<?php $arg1[0]['news_name']?>">
				<label for="news_text">News text</label>
				<textarea name="news_text" id="news_text" class="form-control"><?php $arg1[0]['news_text']?></textarea>
				<button type="submit" class="btn btn-control" name="changeNews">Изменить</button>
    
			</form>
			<a href="<?php echo URL;?>admin/changenews" class="logout-reg">Список</a>
			</div>
		</div>
	</div>
</section>