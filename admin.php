<?php
require 'inc/utils.php';
require 'db/utils.php';

$tab_title = "Admin panel";
$logged = $_COOKIE['logged'] ?? false;

if (!$logged) {
 redirect('sign_in_functions.php');
}

$db_data = get_db();
$users_data = $db_data['users'];
?>

<?php include 'components/header.php';?>

<ul class="nav nav-tabs mt-2" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Admin Panel</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="sign_up_functions.php" role="tab" aria-controls="contact" aria-selected="false">Back To Sign Up</a>
  </li>
</ul>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8" style="margin-top: 100px">
            <div class="card p-4">
                <div class="card-header">Admin panel</div>
                    <?php if (count($users_data) > 0): ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Firstname</th>
                                    <th scope="col">Lastname</th>
                                    <th scope="col">email</th>
                                    <th scope="col">picture</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users_data as $key => $user):?>
                                    <tr>
                                        <th scope="row"><?php echo ++$key ?></th>
                                        <td><?php echo $user['firstname'] ?></td>
                                        <td><?php echo $user['lastname'] ?></td>
                                        <td><?php echo $user['email'] ?></td>
                                        <td><a href="<?php echo sanitize($user['picture']) ?>">Image</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <h5 class="p-3 text-center">Hey, there are no users</h5>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'components/footer.php';?>