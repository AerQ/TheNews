<section class="user-post">
	<?php
	if ($arg1 == false) {
		echo "no data" . "<br>";
	} else {
		foreach ($arg1['q'] as $news) {?>
            <div class="container black">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="user-photo">
                            <a href="/img/uploads/<?php echo $news['news_img']?>" rel="lightbox" title="<?php echo $news['news_text']?>" >
                                <img class="user__img" src="/img/uploads/<?php echo $news['news_img'] ?>" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="user-name">
                            <h4>
                                <a href="<?php echo URL; ?>admin/changecurrentnews/<?php echo $news['id']; ?>">
									<?php
									echo $news['news_name'] . "<br>";
									?> </a>
                            </h4>
                            <img src="../../img/uploads/icon.png" alt="">
                        </div>
                        <div class="user-post">
                            <p><?php    echo $news['news_text']?></p>
                        </div>
                    </div>
                </div>
            </div>
			<?php
			echo "<hr>";
		}
	}
	?>
</section>
<section class="pagin text-center">

	<?php
	for ($i = 1;
		 $i <= $arg1['total_pages'];
		 $i++){

		if ($i == $arg1['current_page']){
			?>
            <div class="pagination">
                <a style="color: #ff0c09; text-decoration: none;" href="<?php echo URL ?>admin/sortbydate/<?php echo $i; ?>"><?php echo $i; ?></a>
            </div>
			<?php
		}else{
			?>
            <div class="pagination">
                <a href="<?php echo URL ?>admin/sortbydate/<?php echo $i; ?>"><?php echo $i; ?></a>
            </div>
			<?php
		}
	}?>

</section>



