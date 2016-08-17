<?php

/**
 * Class Posts
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
        //@JOSH: make sure to remove irrelevant comments :)

	//@JOSH: I wouldn't make a function that returns just 5 results, instead, make the number to return an argument.
        //$five_posts = $this->model->get5RecentPosts();
	$five_posts = $this->model->getRecentPosts(5);

	//@JOSH: if this is unnecessary than I would remove it
        //$amount_of_posts = $this->model->getAmountOfPosts();
	/*@JOSH: I Know this is how the original author did it, but I would consider just doing something like:

	$amount_posts = count($five_posts);


	This might save a DB call
	*/
	
	//@JOSH: I generally avoid defining a function within another in PHP
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

    //JSON object PAGE

    public function postJSON($post_id)
    {
      if (isset($post_id)) {
        $post = $this->model->getPost($post_id);

        //var_dump($post);

        $result = '{"results": [{'.
          '"category":" '.$post->category_name.'",' .
          '"name":" '.$post->name.'",' .
          '"body":" '.$post->body.'",' .
          '"date":" '.$post->date_published.'",' .
          '"author":" '.$post->author_name.'",' .
          '"image":"'.$post->img_path.'"' .
          "}]}";
        echo $result;
      }
    }


    public function singlePost($post_id)
    {
      if (isset($post_id)) {
        $post = $this->model->getPost($post_id);
        $five_posts = $this->model->get5RecentPosts();
      // load views.
       require APP . 'view/_templates/header.php';
       require APP . 'view/posts/singlePost.php';
       require APP . 'view/_templates/footer.php';
     }
     //@JOSH: What happens if the post_id is not set? What if it's not numeric?
    }


}
