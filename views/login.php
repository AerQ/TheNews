<?php
session_start();
$message = "";
try {
	$db = new PDO("mysql:host=localhost;dbname=adminpanel", 'root', '');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if (isset($_POST['submit'])) {
		if (empty($_POST['user_name']) && empty($_POST['user_password'])) {
			$message = '<label>Все поля обязательны!</label>';
		} else {
			$query = "SELECT * FROM users WHERE  user_name = :user_name AND user_password =:user_password";
			$statement = $db->prepare($query);
			$statement->execute(array(
				'user_name' => $_POST['user_name'],
				'user_password' => $_POST['user_password']
			));
			$count = $statement->rowCount();
			if ($_SESSION['arg2'] == $_POST['user_name']) {
				echo '<meta http-equiv="refresh" content="0.1;admin">';
			}
			if ($count > 0) {
				$_SESSION['username'] = $_POST['user_name'];
				if ($_SESSION['username'] == 'admin') {
					echo '<meta http-equiv="refresh" content="0.01;http://news/admin">';
				} else {
					echo '<meta http-equiv="refresh" content="0.01;success">';
				}

			} else {
				$message = '<label>Не правильные данные</label>';
			}
		}
	}

} catch (PDOException $error) {
	$message = $error->getMessage();
} ?>

<section class="user-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
				<?php
				if (isset($message)) {
					echo '<label class="text-danger">' . $message . '</label>';
				}
				?>
                <h2 class="createnews">Авторизация</h2>
                <form method="post" name="form-login" class="form-login">


                    <label for="user_name">Логин:</label>
                    <input type="text" name="user_name" placeholder="Введите логин..." class="form-control"
                           id="user_name">

                    <label for="user_password">Пароль:</label>
                    <input type="password" placeholder="Введите пароль..." class="form-control" name="user_password"
                           id="user_password">

                    <button type="submit" class="btn btn-control" name="submit">Вход</button>


                </form>
                <a href="<?php echo URL ?>registration" class="logout-reg">Регистрация</a>
            </div>
        </div>
    </div>
</section>