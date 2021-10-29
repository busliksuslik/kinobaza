
<h1> All Posts </h1><br>

<?php if ($this -> dx_auth -> is_admin()) { ?>
    <p> <a href = 'create'> Add Post </a></p><br>
<?php } ?>

<?php foreach ($news as $key => $value): ?>
    <p> <a href = "view/<?php echo $value['slug']; ?>"> <?php echo $value['title']; ?> </a> 
    <?php if ($this -> dx_auth -> is_admin()) { ?>
    | <a href = "edit/<?php echo $value['slug']; ?> "> Edit </a>
    | <a href = "delete/<?php echo $value['slug']; ?> "> Delete </a> </p>
    <?php } ?>
<?php endforeach ?>