<?php
require('include/header.php');
?>
<style>
body {
    background-image: url("./back.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-blend-mode: soft-light;
}
</style>
<div class="container text-center">
<h1>Quizerr....</h1>
<p>A Fun quiz to share with your friends to torcher them and ultimately feel lonely coz nobody knows you enough.. (Yeah!! Including your boyfriend)</p>
</div> <!-- /container -->


<!-- Login Form -->
<div class="container">
<!-- HTML Form -->
      <form action="submit.php" method="post" name="login_form" id="login_form" autocomplete="off">
        <h2 class="form-signin-heading">Login</h2>

        <label for="Email" class="sr-only">Email address</label>
        <input type="email" name="Email" id="Email" class="form-control" placeholder="Email address" required autofocus>

        <label for="Password" class="sr-only">Password</label>
        <input type="password" name="Password" id="Password" class="form-control" placeholder="Password" required pattern=".{6,12}" title="6 to 12 characters.">

        <div id="display_error" class="alert alert-danger fade in"></div><!-- Display Error Container -->

        <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
        <button type="button" class="btn btn-lg btn-info btn-block" data-toggle="modal" data-target="#registration_modal">Create an account</button>
      </form>
<!-- /HTML Form -->


<!-- Registration Form -->
  <div class="modal fade" role="dialog" id="registration_modal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- HTML Form -->
        <form action="submit.php" method="post" name="registration_form" id="registration_form" autocomplete="off">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registration form</h4>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
            <div class="form-group">
                <label for="Name">Full name</label>
                <input type="text" name="Name" id="Name" class="form-control" required pattern=".{2,100}" title="min 2 characters." autofocus>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="Email" id="Email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Password">New password</label>
                <input type="password" name="Password" id="Password" class="form-control" required pattern=".{6,12}" title="6 to 12 characters.">
            </div>
                <div id="display_error" class="alert alert-danger fade in"></div><!-- Display Error Container -->
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
        <input type="submit" class="btn btn-lg btn-success" value="Submit" id="submit">
          <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancel</button>
        </div>
        </form>

      </div>
    </div>
  </div>


<p>You must be intelligent enough to understand what it means so... Create the damn quiz already...</p>

<h3>Features</h3>
<ul>
<li>Helps you realize how unpopular you are. Thus, self awareness and all..</li>
<li>You can add questions and then people can answer and what not...</li>
<li>You can use a fake email ID no harm done. I ain't here to steal or verify you shitty Email username.</li>
<li>Login by using the same username and password you wrote to sign up.</li>
<li>In-case you forgot any of it then thanks for being a retard. I cant help you recover shit.</li>
<li>Foreign key relation has been used to link user_id and shit. Hear that DBMS faculty??</li>
<li>PHP session is used to keep user login status in-case you are into those kinda stuff.</li>
<li>Secured code to prevent SQL injection attacks. So don't even try!</li>
<li>Data transmission by using JSON. Sounds cool doesn't it.</li>
<li>Bootstrap has been used to improve the user interface. But it will suck eventually.</li>
<li>jQuery Ajax is used to submit forms without refreshing the page. Now thats impressive!</li>
</ul>

</div>
<!-- /container -->

<?php require('include/footer.php');?>