<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Movies extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Films_model');
    } 

    public function index() {
        if (!$this->dx_auth->is_admin()){
            show_404();
        }

        $this->data['title'] = 'All films/serials';
        $this->data['movies'] = $this->Films_model->getMovies();
        $this->data['serials'] = $this->Films_model->getSerials();

        $this->load->view('templates/header', $this->data);
        $this->load->view('movies/index',$this->data);
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL){
        $movie_slug = $this->Films_model->getFilms($slug, false,false);

        if (empty($movie_slug)){
            show_404();
        }

        $this->load->model('Comments_model');
        $this->data['comments'] = $this->Comments_model->getComments($movie_slug['id'],100);

        $this->data['id'] $movie_slug['id'];
        $this->data['slug'] $movie_slug['slug'];
        $this->data['title'] $movie_slug['name'];
        $this->data['player_code'] $movie_slug['player_code'];
        $this->data['year'] $movie_slug['year'];
        $this->data['rating'] $movie_slug['rating'];
        $this->data['descriptions_movie'] $movie_slug['descriptions'];
        $this->data['director'] $movie_slug['director'];
        $this->data['category'] $movie_slug['category_id'];

        $this->load->view('templates/header', $this->data);
        $this->load->view('movies/index',$this->data);
        $this->load->view('templates/footer');
    }

    public function type($slug = NULL){
        $this->data['movie_data'] = NULL;
        $this->load->library('pagination');
        $offset = (int) $this->uri->segment(4);
        $row_count = 3;
        $count = 0;

        if ($slug == 'films'{
            $count = count($this->Films_model->getMoviesOnPage(0,0,1));
            $p_config['base_url'] = '/movies/type/films/';
            $this->data['title'] = 'Films';
            $this->data['movie_data'] = $this->Films_model->getMoviesOnPage($row_count, $offset,1);
        }
        if ($slug == 'serials'{
            $count = count($this->Films_model->getMoviesOnPage(0,0,2));
            $p_config['base_url'] = '/movies/type/seials/';
            $this->data['title'] = 'Serial';
            $this->data['movie_data'] = $this->Films_model->getMoviesOnPage($row_count, $offset,2);
        }

        $p_config['total_rows'] = $count;
        $p_config['per_page'] = $row_count;

        $p_config['full_tag_open'] = "<ul class='pagination'>";
        $p_config['full_tag_close'] = "</ul>";
        $p_config['num_tag_open'] = "<li>";
        $p_config['num_tag_close'] = "</li>";
        $p_config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'";
        $p_config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $p_config['next_tag_open'] = "<li>";
        $p_config['next_tag_close'] = "</li>";
        $p_config['prev_tag_open'] = "<li>";
        $p_config['prev_tag_close'] = "</li>";
        $p_config['first_tag_open'] = "<li>";
        $p_config['first_tag_close'] = "</li>";
        $p_config['last_tag_open'] = "<li>";
        $p_config['last_tag_close'] = "</li>";

        $this->pagination->initialize($p_config);
        $this->data['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/header', $this->data);
        $this->load->view('main/rating', $this->data);
        $this->load->view('templates/footer');
    }

    public function create(){
        if (!$this->dx_auth->is_admin()){
            show_404();
        }
        $this->data['title'] ='Add movie/ serial'

        if(
            $this->input->post('slug') && 
            $this->input->post('name') && 
            $this->input->post('descriptions') && 
            $this->input->post('year') && 
            $this->input->post('rating') && 
            $this->input->post('poster') && 
            $this->input->post('player_code') && 
            $this->input->post('director') && 
            $this->input->post('add_date') && 
            $this->input->post('category_id') 
            ){
            $slug = $this->input->post('slug') ;
            $name    = $this->input->post('name') ;
            $descriptions    = $this->input->post('descriptions') ;
            $year    = $this->input->post('year') ;
            $rating    = $this->input->post('rating') ;
            $poster    = $this->input->post('poster') ;
            $player_code    = $this->input->post('player_code');
            $director    = $this->input->post('director') ;
            $add_date    = $this->input->post('add_date');
            $category_id    = $this->input->post('category_id') ;

            if($this->Films_model->setMovies($slug,
            $name,
            $descriptions,
            $year,
            $rating,
            $poster,
            $player_code,
            $director,
            $add_date,
            $category_id)){
                $this->data['title'] = "Movie added";
                $this->load->view('templates/header', $this->data);
                $this->load->view('main/rating', $this->data);
                $this->load->view('templates/footer');
            }
        }
        else {
            $this->load->view('templates/header', $this->data);
            $this->load->view('main/rating', $this->data);
            $this->load->view('templates/footer');
        }
    }

    public function edit($slug = NULL){
        if (!$this->dx_auth->is_admin()){
            show_404();
        }
        $this->data['title'] ='Edit movie/ serial'
        $this->data['movies_item'] = $this->Films_model->getMovies($slug);

        if (empty($this->data['movies_item'])){
            show_404();
        }
        $this->data['_movies'] = $this->data['movies_item'][''];
        $this->data['slug_movies'] = $this->data['movies_item']['slug'];
        $this->data['name_movies'] = $this->data['movies_item']['name'];
        $this->data['descriptions_movies'] = $this->data['movies_item']['descriptions'];
        $this->data['year_movies'] = $this->data['movies_item']['year'];
        $this->data['rating_movies'] = $this->data['movies_item']['rating'];
        $this->data['poster_movies'] = $this->data['movies_item']['poster'];
        $this->data['player_code_movies'] = $this->data['movies_item']['player_code'];
        $this->data['direcor_movies'] = $this->data['movies_item']['direcor'];
        $this->data['add_date_movies'] = $this->data['movies_item']['add_date'];
        $this->data['category_id_movies'] = $this->data['movies_item']['category_id'];
        
        if(
            $this->input->post('slug') && 
            $this->input->post('name') && 
            $this->input->post('descriptions') && 
            $this->input->post('year') && 
            $this->input->post('rating') && 
            $this->input->post('poster') && 
            $this->input->post('player_code') && 
            $this->input->post('director') && 
            $this->input->post('add_date') && 
            $this->input->post('category_id') 
            ){
            $slug = $this->input->post('slug') ;
            $name    = $this->input->post('name') ;
            $descriptions    = $this->input->post('descriptions') ;
            $year    = $this->input->post('year') ;
            $rating    = $this->input->post('rating') ;
            $poster    = $this->input->post('poster') ;
            $player_code    = $this->input->post('player_code');
            $director    = $this->input->post('director') ;
            $add_date    = $this->input->post('add_date');
            $category_id    = $this->input->post('category_id') ;

            if($this->Films_model->setMovies($slug,
            $name,
            $descriptions,
            $year,
            $rating,
            $poster,
            $player_code,
            $director,
            $add_date,
            $category_id)){
                $this->data['title'] = "Movie edited";
                $this->load->view('templates/header', $this->data);
                $this->load->view('main/rating', $this->data);
                $this->load->view('templates/footer');
            }
        }
        else {
            $this->load->view('templates/header', $this->data);
            $this->load->view('main/rating', $this->data);
            $this->load->view('templates/footer');
        }
    }
    public function delete($slug = NULL){
        if(!$this->dx_auth->is_admin()){
            show_404();
        }
        $this->data['movies_delete'] = $this->Films_model->getMovies($slug);

        if(empty($this->data['movies_delete'])){
            show_404();
        }
        $this->data['title'] = "Delete movie/serial";
        $this->data['result'] = "Deletion error".$this->data['movies_delete']['name'];

        if($this->Films_model->deleteMovies($slug)){
            $this->data['result'] = $this->data['movies_delete']['name']."Deleted successfuly";
        }
        $this->load->view('templates/header', $this->data);
            $this->load->view('main/rating', $this->data);
            $this->load->view('templates/footer');
    }
    public function comment(){
        if (!$this->dx_auth->is_logged_in()){
            show_404();
        }
        $this->data['title'] = 'Add comment';

        if($this->input->post('user_id') &&
        $this->input->post('movie_id') &&
        $this->input->post('comment_text')){
            $user_id=$this->input->post('user_id');
            $movie_id=$this->input->post('movie_id');
            $comment_text=$this->input->post('comment_text');
            if($this->Films_model->setComments($user_id, $movie_id, $comment_text)){
                $this->data['title'] = "Comment added";
                $this->load->view('movies/commentCreated');
            }
        }
        else{
            $this->load->view('movies/commentError', $this->data);
        }
    }
}