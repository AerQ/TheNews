

<section class="news-list">
    <?php
	if ($arg1 == false) {
		echo "no data" . "<br>";
	} else {
		foreach ($arg1['notes'] as $news) {?>
            <div class="news-list__item">
                <a href="<?php echo URL ?>admin/updatenews/<?php echo $news['id'] ?>"></a>
				<?php
				echo $news['id'] . "<br>";
				echo $news['news_name'] . "<br>";
				echo $news['news_text'] . "<br>";
				?>
                <a style="width: 100px; height: 100px;" href="#" data-lightbox="<?php echo $news['news_img'] ?>"><img  src="/img/uploads/<?php echo $news['news_img'] ?>" alt=""></a>
            </div>
			<?php
 	 	echo "<hr>";
		}
	}
	?>
</section>
<section class="pagination">
<?php


	for ($i = 1;
	$i <= $arg1['total_pages'];
	$i++){
	if ($i == $arg1['current_page']){
		?>
        <a style="color: #ff0c09; text-decoration: none;" href="<?php echo URL ?>admin/shownews/<?php echo $i; ?>"><?php echo $i; ?></a>
		<?php
	}else{
	?>
    <a href="<?php echo URL ?>admin/shownews/<?php echo $i; ?>"><?php echo $i; ?></a>
<?php
}

}?>

</section>
