<!-- Formulär för att ändra uppgifter på en film
skickar även denna en POST till skriptet add-movie.php med informationen från formuläret 
men med ett specifikt film id som tillägg, från en hidden input
Formuläret är även förifyllt med de befintliga uppgifterna från servern, sparade i variablen $movie
Ett 'condtional statement' kollar om 'radio button' som ska vara 'checked'
Innehåller även en cancel-knapp som laddar om sidan
-->

<h4>Edit Movie
  <small>
    <? echo $movie["title"] ?>
  </small>
</h4>

<div class="form-container mb-3">
  <form name="edit-movie" action="add-movie.php" method="POST">

    <div class="form-group">
      <input class="form-control" type="text" name="move-title" id="title-id" placeholder="Title"
        value="<?php echo $movie["title"]; ?>">
    </div>

    <div class="form-group">
      <input class="form-control" type="text" name="director" id="director-id" placeholder="Director"
        value="<?php echo $movie["director"]; ?>">
    </div>

    <div class="form-group">
      <input class="form-control" type="number" name="release-year" id="year-id" placeholder="Year"
        value="<?php echo $movie["year"]; ?>">
    </div>

    <h5>Genre</h5>
    <div class="form-group">

      <div class="form-check">
        <input class="form-check-input" type="radio" name="genre" id="action" value="1"
          <?php if($movie["genre_id"] == 1) echo "checked";?>>
        <label class="form-check-label" for="action">
          Action
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="genre" id="animated" value="2"
          <?php if($movie["genre_id"] == 2) echo "checked";?>>
        <label class="form-check-label" for="animated">
          Animated
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="genre" id="comedy" value="3"
          <?php if($movie["genre_id"] == 3) echo "checked";?>>
        <label class="form-check-label" for="comedy">
          Comedy
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="genre" id="drama" value="4"
          <?php if($movie["genre_id"] == 4) echo "checked";?>>
        <label class="form-check-label" for="drama">
          Drama
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="genre" id="horror" value="5"
          <?php if($movie["genre_id"] == 5) echo "checked";?>>
        <label class="form-check-label" for="horror">
          Horror
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="genre" id="thriller" value="6"
          <?php if($movie["genre_id"] == 6) echo "checked";?>>
        <label class="form-check-label" for="thriller">
          Thriller
        </label>
      </div>

    </div>

    <input type="hidden" name="id" id="thriller" value="<?php echo $movie["id"]; ?>">

    <button class="btn btn-dark" type="submit" name="save-movie">Save</button>
    <a class="btn btn-danger" href="index.php">Cancel</a>

  </form>
</div>