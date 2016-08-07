<div class="container overlay">
    <div class="row"><!--This is a place for the introductory content -->
      <h1 class="col-xs-8 col-xs-offset-2 blog-headline">Latest Posts</h1>
    </div>
    <div class="row intro">
        <div class="col-xs-8 col-xs-offset-2">

              <!-- <p >Documenting my journey in learning code. </p> -->
              <p>Take a look at some of the projects I've been working on.</p>
              <h3>Amount of songs (data from second model)</h3>
              <div>
                  <?php echo $amount_of_posts; ?>
              </div>
        </div>
    </div>

    <div>

        <h3><?php if (isset($post->id)) echo htmlspecialchars($post->id, ENT_QUOTES, 'UTF-8'); ?></h3>


    </div>

      <?php foreach ($five_posts as $post) { ?>
          <div class="row thumbnail-row"><!--This is a place for the cards -->
              <div class="thumbnail">
                <div class="col-xs-4">
                  <img class="img-responsive" src="<?php echo URL; ?>img/<?php if (isset($post->img_path)) echo htmlspecialchars($post->img_path, ENT_QUOTES, 'UTF-8'); ?>" alt="Placeholder">
                </div>
                <div class="caption col-xs-8">
                  <h3><?php if (isset($post->name)) echo htmlspecialchars($post->name, ENT_QUOTES, 'UTF-8'); ?></h3>
                  <h6><?php if (isset($post->date_published)) echo htmlspecialchars($post->date_published, ENT_QUOTES, 'UTF-8'); ?></h6>
                  <p><?php if (isset($post->body)){
                      //echo htmlspecialchars($post->body, ENT_QUOTES, 'UTF-8');
                      $body = htmlspecialchars($post->body, ENT_QUOTES, 'UTF-8');
                      echo limitText($body, 150);
                  } ?></p>
                  <p><a href="#" class="btn btn-hollow" role="button">Read More</a></p>
                </div>
              </div>
          </div>
      <?php } ?>

    <!--End of Card Section -->


  </div><!-- End of Container -->
