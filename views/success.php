<?php
session_start();
if (isset($_SESSION["username"])) {
	?>
    <section class="login_success">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
					<?php echo '<h3 class="hello">Добро пожаловать, уважаемый - ' . $_SESSION["username"] . '</h3>';
					echo '<meta http-equiv="refresh" content="100;URL=http://news/main" >';

					echo '<a href="/login" class="logout-success">Logout</a>'; ?>
                </div>
            </div>
        </div>
    </section>
	<?php
} else {
	header("location:" . URL . "logout/index");
}