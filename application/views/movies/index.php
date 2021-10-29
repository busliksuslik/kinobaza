<p> <a href = 'create'> Add Movie/Serial </a></p><br>

<h1> All Movies </h1>

<?php foreach ($movies as $key => $value): ?>
    <p> <a href = "view/<?php echo $value['slug']; ?>"> <?php echo $value['name']; ?> </a> 
    | <a href = "edit/<?php echo $value['slug']; ?> "> Edit </a>
    | <a href = "delete/<?php echo $value['slug']; ?> "> Delete </a> </p>
<?php endforeach ?>

<h1> All Serials </h1>

<?php foreach ($serials as $key => $value): ?>
    <p> <a href = "view/<?php echo $value['slug']; ?>"> <?php echo $value['name']; ?> </a> 
    | <a href = "edit/<?php echo $value['slug']; ?> "> Edit </a>
    | <a href = "delete/<?php echo $value['slug']; ?> "> Delete </a> </p>
<?php endforeach ?>