<h1> 
    <?php echo $title." "; ?> 
    <?php if($this-> dx_auth -> is_admin()) { ?>
        <a href = "/movies/edit/<?php echo $slug; ?>"><button type="button" class="btn btn-default">
            <span class = "glyphicon glyphicon-pencil" aria-hidden = "true"></span></button></a>
    <?php } ?>
</h1>

<hr>

<div class = "embed-responsive embed-responsive-16by9">
    <iframe class = "embed-responsive-item" src = "<?php echo $player_code; ?>" frameborder = "0" allowfullscreen></iframe>
</div>

<div class = "well info-block text-center">
    Year: <span class = "badge"> <?php echo $year; ?> </span>    Year: <span class = "badge"> <?php echo $year; ?> </span>
    Rating: <span class = "badge"> <?php echo $rating; ?> </span>
    Director: <span class = "badge"> <?php echo $director; ?> </span>
</div>

<div class = "margin-8"></div>

<h2>
    Description <?php if ($category == 1) {echo 'of movie ';}?> <?php if ($category == 2) {echo 'of serial ';} ?> <?php echo $title; ?>
</h2>

<hr>

<div class = "well">
    <?php echo $descriptions_movie; ?>
</div>

<div class = "margin-8"></div>

<h2>
    Reviews <?php if ($category == 1) {echo 'for movie ';}?> <?php if ($category == 2) {echo 'for serial ';} ?> <?php echo $title; ?>
</h2>

<hr>

<?php foreach ($comments as $key => $value): ?>
    
    <div class = "panel panel-info">

        <div class = "panel-heading">
            <i class = "plyphicon glyphicon-user"></i>
            <span> <?php echo getUserNameByID($value['user_id']) -> username; ?> </span>
        </div>

        <div class = "panel-body">
            <?php echo $value['comment_text']; ?>
        </div>

    </div>

<?php endforeach ?>

<?php if ($this -> dx_auth -> if_logged_in()): ?>

    <?php $this -> session -> set_flashdata('redirect', $this -> uri -> uri_string()); ?>

    <form action = "/movies/comment/" method = "post">
        
        <input class = "hidden" type = "input" name = "user_id" value = "<?php echo $this -> dx_auth -> get_user_id(); ?>">
        <input class = "hidden" type = "input" name = "movie_id" value = "<?php echo $id; ?>">

        <div class = "form-group">
            <textarea class = "form-control" name = "comment_text" placeholder = "Your opinion"></textarea>
        </div>

        <button class = "btn btn-lg btn-warning pull-right">Send</button>
    
    </form>

<?php endif ?>

<?php if (!$this -> dx_auth -> is_logged_in()): ?>

    <br>
    <p>You must be logged in to leave opinions!</p>

<?php endif ?>