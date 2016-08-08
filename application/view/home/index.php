<script>
  //Sets the Active tab in the nav bar

  document.addEventListener("DOMContentLoaded",function() {

    var home_nav= document.querySelector("#home-nav");
    home_nav.className = "active";

  });
</script>
<div class="container overlay">
    <div class="row"><!--This is a place for the introductory content -->
      <h1 class="col-xs-8 col-xs-offset-2 blog-headline">From Design to Development</h1>
    </div>
    <div class="row intro">
        <div class="col-xs-8 col-xs-offset-2">

              <!-- <p >Documenting my journey in learning code. </p> -->
              <p>Take a look at some of the projects I've been working on.</p>
              <a a href="<?php echo URL; ?>posts/index" class="btn btn-hollow" role="button">Read my latest Posts</a>
        </div>
    </div>




  </div><!-- End of Container -->
