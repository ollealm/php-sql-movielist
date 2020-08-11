<?php 
  require "header.php"
?>

<h1 class="pb-3">Movie Database</h1>

<div class="pt-5 col-md-8 float-left">


  <h4>Movie List</h4>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Title</th>
        <th>Director</th>
        <th>Year</th>
        <th>genre</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Movie Titel</td>
        <td>Movie Director</td>
        <td>2011</td>
        <td>Drama</td>
        <td><a class="btn btn-warning" href="moviestorage.php?edit=id">Edit</a></td>
        <td><a class="btn btn-danger" href="moviestorage.php?delete=id">Delete</a></td>
      </tr>
      <tr>
        <td>Movie Titel 2</td>
        <td>Movie Director 2</td>
        <td>2012</td>
        <td>Action</td>
        <td>Edit</td>
        <td>Delete</td>
      </tr>
      <tr>
        <td>Movie Titel 3</td>
        <td>Movie Director 3</td>
        <td>2013</td>
        <td>Horror</td>
        <td>Edit</td>
        <td>Delete</td>
      </tr>
      <tr>
        <td>Movie Titel 4</td>
        <td>Movie Director 4</td>
        <td>2014</td>
        <td>Comedy</td>
        <td>Edit</td>
        <td>Delete</td>
      </tr>
    </tbody>

  </table>

</div>







<div class=" pt-5 col-md-4 float-left">

  <h4>Add Movie</h4>

  <div class="form-container">
    <form name="contact" action="add-movie.php" method="POST">

      <div class="form-group">
        <input class="form-control" type="text" name="move-title" id="title-id" placeholder="Title">
      </div>

      <div class="form-group">
        <input class="form-control" type="text" name="director" id="director-id" placeholder="Director">
      </div>

      <div class="form-group">
        <input class="form-control" type="number" name="release-year" id="year-id" placeholder="Year">
      </div>

      <h5>genre</h5>
      <div class="form-group">

        <div class="form-check">
          <input class="form-check-input" type="radio" name="genre" id="action" value="1">
          <label class="form-check-label" for="action">
            Action
          </label>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="genre" id="animated" value="2">
          <label class="form-check-label" for="animated">
            Animated
          </label>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="genre" id="comedy" value="3">
          <label class="form-check-label" for="comedy">
            Comedy
          </label>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="genre" id="drama" value="4">
          <label class="form-check-label" for="drama">
            Drama
          </label>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="genre" id="horror" value="5">
          <label class="form-check-label" for="horror">
            Horror
          </label>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="genre" id="thriller" value="6">
          <label class="form-check-label" for="thriller">
            Thriller
          </label>
        </div>

      </div>

      <button class="btn btn-dark" type="submit" name="save-movie">Save</button>

    </form>
  </div>

</div>






<?php 
/*
// kollar efter felmeddelanden
// och skriver ut dessa till användaren
if (isset($_GET['error'])) {
  if ($_GET['error'] == "empty") echo '<p class="text-danger">You need to fill in all fields</p>';
  else if ($_GET['error'] == "wrong") echo '<p class="text-danger">Wrong username or password</p>';
  else echo '<p class="text-danger">Login failed</p>';
}

// kollar om användaren loggat ut och skriver ut detta
if (isset($_GET['logout'])) {
  if ($_GET['logout'] == "true") {
    echo '<p class="text-success">You logged out</p>';
  }
}

// kollar om användaren redan är inloggad genom id i sessionen
// visar annars inloggnings-formulär
if (isset($_SESSION['id'])) {
  echo 
  '<p>You are already logged in</p>
  <p><a href="user.php">Go to user page</a></p>';
} else {
  // använder POST istället för GET för att inte visa känslig data
  echo 
  '<form action="login.php" method="post"> 
    <div class="form-group">
      <input type="text" name="username" placeholder="username" class="form-control">
    </div>

    <div class="form-group">
      <input type="password" name="password" placeholder="password" class="form-control">
    </div>
    <p><small>[Test user: olle / olle]</small></p>
    <button class="btn btn-dark" type="submit" name="login-submit">Login</button>
  </form>';
}
*/
?>








<?php 
  require "footer.php"
?>