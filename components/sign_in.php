<?php #include "header.php" ?>
<div class="container">
	<div class="row justify-content-center" style="margin-top: 70px">
		<div class="col-6">
			<div class="card">
				<div class="card-body">
					<h1 class="text-center">Sign In</h1>
					<form action="sign_in_functions.php" method="post">

						<div class="form-group">
							<label for="exampleInputEmail">Email Address</label>
							<input placeholder="Enter email" type="text" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : '' ?>"  id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo sanitize($email) ?>">
							<div class="invalid-feedback">
								<?php echo $errors['email'] ?? '' ?>
							</div>

							<small id="emailHelp" class="form-text text-muted">We will never share your email with others.</small>

						</div>

						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input placeholder="Enter password" type="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : '' ?>" id="exampleInputPassword1" name="password" value="<?php echo sanitize($password) ?>">
							<div class="invalid-feedback">
								<?php echo $errors['password'] ?? '' ?>
							</div>
						</div>

						<button type="submit" class="btn btn-primary" name="login">Sign In</button>
					</form>
				</div>

				<div class="card-footer">
					<p>Do not have an account ? <a href="sign_up_functions.php" class="link-primary">Sign Up</a></p>
				</div>
			</div>
		</div>
	</div>
</div>