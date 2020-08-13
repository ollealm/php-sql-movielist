<!-- Formulär för att lägga till ny film
skickar en POST till skriptet add-movie.php med informationen från formuläret 
Radioknappar för genre där value motsvrar genre-id-->

<h4>Add Movie</h4>

<div class="form-container mb-3">
  <form name="add-movie" action="add-movie.php" method="POST">

    <div class="form-group">
      <input class="form-control" type="text" name="move-title" id="title-id" placeholder="Title">
    </div>

    <div class="form-group">
      <input class="form-control" type="text" name="director" id="director-id" placeholder="Director">
    </div>

    <div class="form-group">
      <input class="form-control" type="number" name="release-year" id="year-id" placeholder="Year">
    </div>

    <h5>Genre</h5>
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