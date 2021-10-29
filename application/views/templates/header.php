<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> <?php echo $title; ?> </title>

        <link href = "/assets/css/bootstrap.min.css" rel = "stylesheet">
        <link href = "/assets/css/style.css" rel = "stylesheet">

    </head>

    <body>
    
        <div class = "container-fluid">

            <div class = "row">

                <nav role = "navigation" class = "navbar navbar-inverse">
                    <div class = "container">

                        <div class = "navbar-header header">
                            <div class = "container">
                                <div class = "row">

                                    <div class = "col-lg-12">
                                        <h1><a href = "/kinobaza">Kinobaza</a></h1>
                                        <p>Cinema is our passion!</p>
                                    </div>

                                </div>
                            </div>

                            <button type = "button" data-target = "#navbarCollapse" data-toggle = "collapse" class = "navbar-toggle">

                                <span class = "sr-only"> Toggle navigation </span>
                                <span class = "icon-bar"></span>
                                <span class = "icon-bar"></span>
                                <span class = "icon-bar"></span>

                            </button>
                            
                        </div>

                        <div id = "navbarCollapse" class = "collapse navbar-collapse navbar-right">

                            <ul class = "nav nav-pills">
                                <li <?php echo show_active_menu(0, 0); ?>> <a href = "/">Main</a> </li>
                                <li <?php echo show_active_menu('films', $category); ?>> <a href = "/movies/type/films">Movies</a> </li>
                                <li <?php echo show_active_menu('serials', $category); ?>> <a href = "/movies/type/serials">Serials</a> </li>
                                <li <?php echo show_active_menu('rating', 0); ?>> <a href = "/rating">Rating</a> </li>
                                <li <?php echo show_active_menu('contact', 0); ?>> <a href = "/contact">Contact</a> </li>
                            </ul>

                        </div>

                    </div>
                </nav>

            </div>
        
        </div>

        <div class = "wrapper">
            
            <div class = "container">
                
                <div class = "row">

                    <div class = "col-lg-9 col-lg-push-3">

                        <form role = "search" action = "/search/" method = "get" class = "visible-xs">
                            <div class = "form-group">
                                <div class = "input-group">
                                    <input type = "search" name = "q_search" class = "form-control input-lg" placeholder = "Your query">
                                    <div class = "input-group-btn">
                                        <button class = "btn btn-default btn-lg" type = "submit"><i class = "glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>