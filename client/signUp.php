<div class="container">
<h1 class="heading">signUp</h1>

<form method="post" action="./server/requests.php">

   <div class="col-6 offset-sm-3 margin-bottom-15">
    <label for="username" class="form-label">User name</label>
    <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
  </div>
   <div class="col-6 offset-sm-3 margin-bottom-15">
    <label for="email" class="form-label">User email</label>
    <input type="text" name="email" class="form-control" id="email" placeholder="Enter user email">
  </div>
   <div class="col-6 offset-sm-3 margin-bottom-15">
    <label for="password" class="form-label">User Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Enter user password">
  </div>
   <div class="col-6 offset-sm-3 margin-bottom-15">
    <label for="address" class="form-label">User address</label>
    <input type="text" name="address" class="form-control" id="address" placeholder="Enter user address">
  </div>

  <div class="col-6 offset-sm-3 margin-bottom-15">
  <button type="submit" name="signup" class="btn btn-primary">SignUp</button>
  </div>
</form>
</div>