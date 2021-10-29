<form action = "" method = "post">

    <input class = "form-control input-lg" type = "input" name = "slug" value = "<?php echo $slug_news; ?>" placeholder = "Slug"><br>
    <input class = "form-control input-lg" type = "input" name = "title" value = "<?php echo $title_news; ?>"placeholder = "Title"><br>
    <textarea class = "form-control input-lg" type = "input" name = "text" value = "<?php echo $content_news; ?>" placeholder = "Desribe what you want"></textarea><br>
    <input class = "btn btn-success" type = "submit" name = "submit" placeholder = "Edit"><br>

</form>