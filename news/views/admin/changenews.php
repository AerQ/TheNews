<section class="sorting">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="sorting">Сортировка и фильтрация: <span class="sorting">по умолчанию</span></h2>
				

				<ul class="sorting-menu">

				    <li>
				    	<a href="<?php echo URL; ?>admin/sortbytext">По тексту</a>
				    </li>

				    <li>
				    	<a href="<?php echo URL; ?>admin/sortbyname">По алфавиту</a>
				    </li>

				     <li>
				     	<a href="<?php echo URL; ?>admin/sortbydate">От последней добавленой</a>
				     </li>

				</ul>
			</div>
		</div>
	</div>
</section>


<?php
if ($arg1 == false) {
	echo "no data" . "<br>";
} else {
	foreach ($arg1['notes'] as $news) {

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
           href="<?php echo URL ?>admin/changenews/<?php echo $i; ?>"><?php echo $i; ?></a>
		<?php
	} else {
		?>
        <a href="<?php echo URL ?>admin/changenews/<?php echo $i; ?>"><?php echo $i; ?></a>
		<?php
	}
}



