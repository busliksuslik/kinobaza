<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Posts_model');
    }

    public function index(){

        $this->data['title'] = "All posts";
        $this->data['posts'] = $this->Posts_model->getPosts();

        $this->load->view('templates/header', $this->data);
        $this->load->view('posts/index', $this->data);
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL){
        $this->data['posts_item'] = $this->Posts_model->getPosts($slug);

        if (empty($this->data['posts_item'])){
            show_404();
        }

        
        $this->data['title'] $movie_slug['name'];
        $this->data['content'] $movie_slug['content'];
        $this->data['slug'] $movie_slug['slug'];

        $this->load->view('templates/header', $this->data);
        $this->load->view('posts/view',$this->data);
        $this->load->view('templates/footer');

    }

    public function create(){
        if (!$this->dx_auth->is_admin()){
            show_404();
        }
        $this->data['title'] ='Add post'
        
        if  (
            $this->input->post('slug') && 
            $this->input->post('title') && 
            $this->input->post('text')
            ){
            $slug  = $this->input->post('slug') ;
            $title = $this->input->post('title') ;
            $text  = $this->input->post('text') ;

            if ($this->Posts_model->setPosts($slug, $title, $text)){
                $this->data['title'] = 'Post added';
                $this->load->view('templates/header', $this->data);
                $this->load->view('posts/create');
                $this->load->view('templates/footer');
            }
        }
        else{
            $this->load->view('templates/header', $this->data);
            $this->load->view('posts/create', $this->data);
            $this->load->view('templates/footer');
        }
    }

    public function edit($slug = NULL){
        if (!$this->dx_auth->is_admin){
            show_404()
        }

        $this->data['title'] = 'edit post';
        $this->data['posts_item'] = $this->Posts_model->getPosts($slug);

        if (empty($this->data['posts_item'])){
            show_404();
        }

        $this->data['id_posts'] = $this->data['posts_item']['id'];
        $this->data['title_posts'] = $this->data['posts_item']['title'];
        $this->data['content_posts'] = $this->data['posts_item']['text'];
        $this->data['slug_posts'] = $this->data['posts_item']['slug'];

        if  (
            $this->input->post('slug') && 
            $this->input->post('title') && 
            $this->input->post('text')
            ){
            $id = $this->data['posts_item']['id'];
            $slug  = $this->input->post('slug') ;
            $title = $this->input->post('title') ;
            $text  = $this->input->post('text') ;

            if ($this->Posts_model->updatePosts($id,$slug, $title, $text)){
                $this->data['title'] = 'Updated successfuly';
                $this->load->view('templates/header', $this->data);
                $this->load->view('posts/edited');
                $this->load->view('templates/footer');
            }
        }
        else{
            $this->load->view('templates/header', $this->data);
            $this->load->view('posts/edit', $this->data);
            $this->load->view('templates/footer');
        }
    }

    public function delete($slug = NULL) {
        if (!$this->dx_auth->is_admin){
            show_404();
        }

        $this->data['posts_delete'] = $this->Posts_model->getPosts($slug);

        if (empty($this->data['posts_delete'])){
            show_404();
        }

        $this->data['title'] = "delete posts";
        $this->data['result'] = "Deletion error ".$this->data['posts_delete']['title'];

        if($this->Posts_model->deletePosts($slug)){
            $this->data['result'] = $this->data['posts_delete']['title']." deleted successfuly";
        }

        $this->load->view('templates/header', $this->data);
        $this->load->view('main/search', $this->data);
        $this->load->view('templates/footer');
    }
}