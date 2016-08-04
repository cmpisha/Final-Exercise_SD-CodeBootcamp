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


/*@TODO: Create a test query that pulls the number of posts*/

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


/*@TODO: Create a query to pull the 5 most recent posts */

    public function get5RecentPosts(){
      $sql = "SELECT posts.id, posts.name, author.name AS author_name, posts.date_published, " .
      "posts.body, category.name AS category_name, posts.img_path FROM posts " .
          "INNER JOIN author ON posts.author_id = author.id " .
          "INNER JOIN category ON posts.category_id = category.id " .
          "ORDER BY posts.id";
      $query = $this->db->prepare($sql);
      $query->execute();

      return $query->fetchAll();
    }


/*@TODO: A query and view to add a post*/

public function insertNewPost($post_name, $post_author_id, $post_body, $post_category_id, $post_img_path)
{
    $sql = "INSERT INTO posts (name, author_id, body, category_id, img_path) " .
          " VALUES ( :name, :author_id, :body, :category_id, :img_path)";
    $query = $this->db->prepare($sql);
    $parameters = array(':name' => $post_name, ':author_id' => $post_author_id, ':body' => $post_body, ':category_id' => $post_category_id, ':img_path' => $post_img_path);

    $query->execute($parameters);
}

/**
 * Add a Vehicle to database
 */
public function addVehicle($manu_id, $model_id, $year, $mileage, $exterior_color_id)
{

    $sql = "INSERT INTO Vehicle (manu_id, model_id, year, mileage, exterior_color_id) VALUES (:manu_id, :model_id, :year, :mileage, :exterior_color_id)";
    $query = $this->db->prepare($sql);
    $parameters = array(':manu_id' => $manu_id, ':model_id' => $model_id, ':year' => $year, ':mileage' => $mileage, ':exterior_color_id' => $exterior_color_id);

    // useful for debugging: you can see the SQL behind above construction by using:
    // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

    $query->execute($parameters);

}

    // /**
    //  * Get a song from database
    //  */
    // public function getSong($song_id)
    // {
    //     $sql = "SELECT id, artist, track, link FROM song WHERE id = :song_id LIMIT 1";
    //     $query = $this->db->prepare($sql);
    //     $parameters = array(':song_id' => $song_id);
    //
    //     // useful for debugging: you can see the SQL behind above construction by using:
    //     // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
    //
    //     $query->execute($parameters);
    //
    //     // fetch() is the PDO method that get exactly one result
    //     return $query->fetch();
    // }
    //
    //
    // /**
    //  * Add a song to database
    //  * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
    //  * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
    //  * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
    //  * in the views (see the views for more info).
    //  * @param string $artist Artist
    //  * @param string $track Track
    //  * @param string $link Link
    //  */
    // public function addSong($artist, $track, $link)
    // {
    //     $sql = "INSERT INTO song (artist, track, link) VALUES (:artist, :track, :link)";
    //     $query = $this->db->prepare($sql);
    //     $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link);
    //
    //     // useful for debugging: you can see the SQL behind above construction by using:
    //     // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
    //
    //     $query->execute($parameters);
    // }
    //

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
