<?php

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }


/*A test query that pulls the number of posts*/

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/songs.php for more)
     */

    public function getAmountOfPosts()
    {
      $sql = "SELECT COUNT(id) AS amount_of_posts FROM posts";
      $query = $this->db->prepare($sql);
      $query->execute();

      // fetch() is the PDO method that get exactly one result
      return $query->fetch()->amount_of_posts;
    }


/*Query to pull the 5 most recent posts */

    public function get5RecentPosts(){
      $sql = "SELECT posts.id, posts.name, author.name AS author_name, posts.date_published, " .
      "posts.body, category.name AS category_name, posts.img_path FROM posts " .
          "INNER JOIN author ON posts.author_id = author.id " .
          "INNER JOIN category ON posts.category_id = category.id " .
          "ORDER BY posts.date_published DESC LIMIT 5";
      $query = $this->db->prepare($sql);
      $query->execute();

      return $query->fetchAll();
    }




/*A query to add a post*/

public function insertNewPost($post_name, $post_author_id, $post_body, $post_category_id, $post_img_path)
{
    $sql = "INSERT INTO posts (name, author_id, body, category_id, img_path) " .
          " VALUES ( :name, :author_id, :body, :category_id, :img_path)";
    $query = $this->db->prepare($sql);
    $parameters = array(':name' => $post_name, ':author_id' => $post_author_id, ':body' => $post_body, ':category_id' => $post_category_id, ':img_path' => $post_img_path);

    $query->execute($parameters);
}


public function getPost($post_id)
{
    $sql = "SELECT posts.id, posts.name, author.name AS author_name, posts.date_published, " .
    "posts.body, category.name AS category_name, posts.img_path FROM posts " .
        "INNER JOIN author ON posts.author_id = author.id " .
        "INNER JOIN category ON posts.category_id = category.id ".
        "WHERE posts.id = :post_id LIMIT 1";
    $query = $this->db->prepare($sql);
    $post_id_in = (int)$post_id;
    $parameters = array(':post_id' => $post_id_in);
    //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
    $query->execute($parameters);
    return $query->fetch();
}



/*@TODO: A way to delete a post (maybe an edit page with this functionality )*/



    // /**
    //  * Delete a song in the database
    //  * Please note: this is just an example! In a real application you would not simply let everybody
    //  * add/update/delete stuff!
    //  * @param int $song_id Id of song
    //  */
    // public function deleteSong($song_id)
    // {
    //     $sql = "DELETE FROM song WHERE id = :song_id";
    //     $query = $this->db->prepare($sql);
    //     $parameters = array(':song_id' => $song_id);
    //
    //     // useful for debugging: you can see the SQL behind above construction by using:
    //     // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
    //
    //     $query->execute($parameters);
    // }
    //
    //
    // /**
    //  * Update a song in database
    //  * // TODO put this explaination into readme and remove it from here
    //  * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
    //  * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
    //  * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
    //  * in the views (see the views for more info).
    //  * @param string $artist Artist
    //  * @param string $track Track
    //  * @param string $link Link
    //  * @param int $song_id Id
    //  */
    // public function updateSong($artist, $track, $link, $song_id)
    // {
    //     $sql = "UPDATE song SET artist = :artist, track = :track, link = :link WHERE id = :song_id";
    //     $query = $this->db->prepare($sql);
    //     $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link, ':song_id' => $song_id);
    //
    //     // useful for debugging: you can see the SQL behind above construction by using:
    //     // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
    //
    //     $query->execute($parameters);
    // }


}
