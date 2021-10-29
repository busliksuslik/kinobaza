<form action = '' method = 'post'>

    <input class = 'form-control input-lg' type = 'input' name = 'slug' value = "<?php echo $slug_movies; ?>" placeholder = 'Slug'> <br>
    <input class = 'form-control input-lg' type = 'input' name = 'name' value = "<?php echo $name_movies; ?>" placeholder = 'Movie Name'> <br>
    <textarea class = 'form-control input-lg' name = 'descriptions' value = "<?php echo $descriptions_movies; ?>" placeholder = 'Description'> </textarea> <br>
    <input class = 'form-control input-lg' type = 'input' name = 'year' value = "<?php echo $year_movies; ?>" placeholder = 'Year'> <br>
    <input class = 'form-control input-lg' type = 'input' name = 'rating' value = "<?php echo $rating_movies; ?>" placeholder = 'Rating'> <br>
    <input class = 'form-control input-lg' type = 'input' name = 'poster' value = "<?php echo $poster_movies; ?>" placeholder = 'Poster URL'> <br>
    <input class = 'form-control input-lg' type = 'input' name = 'player_code' value = "<?php echo $player_code_movies; ?>" placeholder = 'Player URL'> <br>
    <input class = 'form-control input-lg' type = 'input' name = 'director' value = "<?php echo $director_movies; ?>" placeholder = 'Director'> <br>
    <input class = 'form-control input-lg' type = 'input' name = 'add_date' value = "<?php echo $add_date_movies; ?>"> <br>
    <input class = 'form-control input-lg' type = 'input' name = 'category_id' value = "<?php echo $category_id_movies; ?>" placeholder = 'Category (1 for Move / 2 for Serial)'> <br>
    <input class = 'btn btn-success' type = 'input' name = 'submit' placeholder = 'Edit'> <br>

</form>