<?php
if ($arg1 == false) {
	echo "no data" . "<br>";
} else {
	foreach ($arg1['q'] as $news) {

		echo $news['id'] . "<br>";
		?>
		<a href="<?php echo URL; ?>admin/changecurrentnews/<?php echo $news['id']; ?>">
			<?php
			echo $news['news_name'] . "<br>";
			?> </a>

		<?php

		echo $news['news_text'] . "<br>";
	?>
		<a style="width: 200px; height: 200px;" href="#" data-lightbox="<?php echo $news['news_img'] ?>"><img  src="/img/uploads/<?php echo $news['news_img'] ?>" alt=""></a><br><hr>
		<?php
	}
}

for ($i = 1; $i <= $arg1['total_pages']; $i++) {
	if ($i == $arg1['current_page']) {
		?>
		<a style="color: orange; text-decoration: none;"
		   href="<?php echo URL ?>admin/sortbytext/<?php echo $i; ?>"><?php echo $i; ?></a>
		<?php
	} else {
		?>
		<a href="<?php echo URL ?>admin/sortbytext/<?php echo $i; ?>"><?php echo $i; ?></a>
		<?php
	}
}



