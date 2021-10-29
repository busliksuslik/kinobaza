<form action = '/movies/create/' method = 'post'>

    <input class = 'form-control input-lg' type = 'input' name = 'slug' placeholder = 'Slug'> <br>
    <input class = 'form-control input-lg' type = 'input' name = 'name' placeholder = 'Movie Name'> <br>
    <textarea class = 'form-control input-lg' name = 'descriptions' placeholder = 'Description'> </textarea> <br>
    <input class = 'form-control input-lg' type = 'input' name = 'year' placeholder = 'Year'> <br>
    <input class = 'form-control input-lg' type = 'input' name = 'rating' placeholder = 'Rating'> <br>
    <input class = 'form-control input-lg' type = 'input' name = 'poster' placeholder = 'Poster URL'> <br>
    <input class = 'form-control input-lg' type = 'input' name = 'player_code' placeholder = 'Player URL'> <br>
    <input class = 'form-control input-lg' type = 'input' name = 'director' placeholder = 'Director'> <br>
    <input class = 'form-control input-lg' type = 'input' name = 'add_date' value = "<?php echo date("Y-m-d")." ".date("h:i:s"); ?>"> <br>
    <input class = 'form-control input-lg' type = 'input' name = 'category_id' placeholder = 'Category (1 for Move / 2 for Serial)'> <br>
    <input class = 'btn btn-success' type = 'input' name = 'submit' placeholder = 'Add'> <br>

</form>