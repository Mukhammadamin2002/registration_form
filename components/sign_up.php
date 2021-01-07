<?php include "header.php" ?>
<div class="container">
 	<div class="row justify-content-center" style="margin-top: 80px">
		<div class="col-6">
			<div class="card">
				<div class="card-body">
					<h1 class="text-center">Sign up</h1>

					<form action="<?php echo sanitize($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">

						<div class="row justify-content-center">
							<div class="col-6">
								<div class="form-group">
									<label for="firstname">Firstname</label>
									<input type="text" name="firstname"
									class="form-control <?php echo isset($errors['firstname']) ? 'is-invalid' : '' ?>" value="<?php echo sanitize($firstname) ?>">
									<div class="invalid-feedback">
										<?php echo $errors['firstname'] ?? '' ?>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="lastname">Lastname</label>
									<input type="text"  name="lastname" class="form-control <?php echo isset($errors['lastname']) ? 'is-invalid' : '' ?>" value="<?php echo sanitize($lastname) ?>">
									<div class="invalid-feedback">
										<?php echo $errors['lastname'] ?? '' ?>
									</div>
								</div>
							</div>
						</div>

						<div class="custom-file">
							<label class="custom-file-label" for="picture">Picture</label>
							<input type="file"  name="picture" class="custom-file-input" id="picture">
							<small class="text-danger text-small">
								<?php echo $errors['picture'] ?? '' ?>
							</small>
						</div>
												
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input type="text"
							class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : '' ?>"
							id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo sanitize($email) ?>">
							<div class="invalid-feedback">
								<?php echo $errors['email'] ?? '' ?>
							</div>
							<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password"
							class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : '' ?>"
							id="exampleInputPassword1" name="password" value="<?php echo sanitize($password) ?>">
							<div class="invalid-feedback">
								<?php echo $errors['password'] ?? '' ?>
							</div>
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1">Confirm Password</label>
							<input type="password"
							class="form-control <?php echo isset($errors['confirmPassword']) ? 'is-invalid' : '' ?>"
							id="exampleInputPassword1" name="confirmPassword" value="<?php echo sanitize($confirmPassword) ?>">
							<div class="invalid-feedback">
								<?php echo $errors['confirmPassword'] ?? '' ?>
							</div>
						</div>

						<button type="submit" class="btn btn-primary" name="sign_up">Sign up</button>

					</form>
				</div>
				<div class="card-footer">
					<p>Have an account? <a href="sign_in_functions.php" class="link-primary">Sing in</a></p>
				</div>
			</div>
		</div>
	</div>
</div>