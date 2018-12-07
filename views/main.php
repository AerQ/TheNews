<main>
    <!-- MENU -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav>
                    <ul class="menu">
                        <li class="menu__item"><a href="#">SomeText</a></li>
                        <li class="menu__item"><a href="#">SomeText</a></li>
                        <li class="menu__item"><a href="<?php echo URL ?>main/shownews">Новости</a></li>
                        <li class="menu__item"><a href="#">SomeText</a></li>
                        <li class="menu__item"><a href="#">SomeText</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- ----MENU -->
    <section class="user-post">
		<?php
		if ($arg1 == false) {
			echo "no data" . "<br>";
		} else {
			foreach ($arg1['notes'] as $news) { ?>
                <div class="container black">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="user-photo">
                                <a href="/img/uploads/<?php echo $news['news_img'] ?>" rel="lightbox"
                                   title="<?php echo $news['news_text'] ?>" >
                                    <img class="user__img" src="/img/uploads/<?php echo $news['news_img'] ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="user-name">
                                <h4>
									<?
									echo $news['news_name'] ?>
                                </h4>
                                <img src="../img/uploads/icon.png" alt="">
                            </div>
                            <div class="user-post">
                                <p><?php echo $news['news_text'] ?></p>
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
			 $i++) {

			if ($i == $arg1['current_page']) {
				?>
                <div class="pagination">
                    <a style="color: #ff0c09; text-decoration: none;"
                       href="<?php echo URL ?>main/shownews/<?php echo $i; ?>"><?php echo $i; ?></a>
                </div>
				<?php
			} else {
				?>
                <div class="pagination">
                    <a href="<?php echo URL ?>main/shownews/<?php echo $i; ?>"><?php echo $i; ?></a>
                </div>
				<?php
			}
		} ?>

    </section>
</main>
