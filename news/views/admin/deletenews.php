<?php
if ($arg1 == false){
	echo "no data" . "<br>";
}else{
	foreach ($arg1['notes'] as $news){
		?>
		<a href="<?php echo URL?>admin/deletecurrentnews/<?php echo $news['id'];?>/<?php echo $arg1['current_page']?>">Delete news   &times;</a>
		<br>
		<?php
		echo $news['id'] . "<br>";
		echo $news['news_name'] . "<br>";
		echo $news['news_text'] . "<br><hr>";
	}
}

for ($i = 1; $i <=$arg1['total_pages']; $i++){
	if ($i == $arg1['current_page']){
		?>
		<a style="color: orange; text-decoration: none;" href="<?php echo URL?>admin/deletenews/<?php echo $i;?>"><?php echo $i;?></a>
		<?php
	}else{
		?>
		<a href="<?php echo URL?>admin/deletenews/<?php echo $i;?>"><?php echo $i;?></a>
		<?php
	}




}