<script>
  //Sets the Active tab in the nav bar

  document.addEventListener("DOMContentLoaded",function() {

    var add_new_nav= document.querySelector("#add-new-nav");
    add_new_nav.className = "active";

  });
</script>

    <div class="container overlay">
      <div class="row"><!--This is a place for the introductory content -->
        <h1 class="col-xs-6 col-xs-offset-3 blog-headline">Add a Post</h1>
      </div>

      <form class="col-xs-8 col-xs-offset-2" action="<?php echo URL; ?>posts/insertNewPost" method="POST">
        <div class="form-group">
          <label for="post_name">Post Title</label>
          <input type="text" class="form-control" name="post_name" placeholder="Add your title here">
        </div>

        <label for="post_author">Author</label>
        <select class="form-control" name="post_author_id">
          <option value="1">Caitlin</option>
        </select>

        <div class="form-group">
          <label for="post_body">Content</label>
          <textarea class="form-control" rows="10" name="post_body"></textarea>
        </div>

        <label for="post_category_id">Category</label>
        <select class="form-control" name="post_category_id">
          <option value ="1">Community</option>
          <option value ="2">Work</option>
          <option value ="3">Events</option>
          <option value ="4">Design</option>
          <option value ="5">Web Development</option>
          <option value ="6">Tutorials</option>
          <option value ="7">Resources</option>
        </select>

        <div class="form-group">
          <label for="post_img">Image Name</label>
          <input type="text" class="form-control" name="post_img_path" placeholder="Add your image name here, with file extension">
        </div>

        <!-- <input type="submit" name="submit_new_post" value="Update" > -->

        <button type="submit" class="btn btn-default" name="submit_new_post" value="Update">Add Post!</button>
      </form>
  </div><!-- End of Container -->
