<section class="registration">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="reg-form">
					<h2 class="createnews">Регистрация</h2>
					<form action="<?php echo URL ?>registration/registr" method="post" name="registration-name" class="form-registration">
						<label for="user-name">Введите ваш логин:</label>
						<input type="text" name="user_name" placeholder="Логин..." id="user-name" class="form-control">

						<label for="user-password">Введите ваш пароль:</label>
						<input type="password" name="user_password" id="user-password" class="form-control" placeholder="Ваш пароль...">

						<label for="re-password">Повторите ваш пароль еще раз:</label>
						<input type="password" name="re_password" id="re-password" class="form-control" placeholder="Пароль еще раз...">

						<button type="submit" name="submit" class="btn btn-control">Вход</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>


