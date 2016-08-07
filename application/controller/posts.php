<?php

/**
 * Class Songs
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Posts extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/Posts/index
     */
    public function index()
    {
        // getting all songs and amount of songs
        $five_posts = $this->model->get5RecentPosts();
        $amount_of_posts = $this->model->getAmountOfPosts();

        function limitText($text, $limit) {
          if (str_word_count($text, 0) > $limit) {
              $words = str_word_count($text, 2);
              $pos = array_keys($words);
              $text = substr($text, 0, $pos[$limit]) . '...';
          }
          return $text;
        }

       // load views. within the views we can echo out $songs and $amount_of_songs easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/posts/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addpost()
    {

      // load views. within the views we can echo out $songs and $amount_of_songs easily
       require APP . 'view/_templates/header.php';
       require APP . 'view/posts/addpost.php';
       require APP . 'view/_templates/footer.php';
    }

    public function insertNewPost()
    {
      // if we have POST data to create a new post entry
      if (isset($_POST["submit_new_post"])) {
          // do updateSong() from model/model.php
          $this->model->insertNewPost($_POST["post_name"], $_POST["post_author_id"],  $_POST["post_body"], $_POST["post_category_id"], $_POST["post_img_path"]);
      }



      // where to go after song has been added
      header('location: ' . URL . 'posts/index');

    }


}
