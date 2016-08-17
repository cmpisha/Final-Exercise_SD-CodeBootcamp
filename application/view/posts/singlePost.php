<script>

  function clearChildNodes(the_node) {

    while (the_node.firstChild) {
        the_node.removeChild(the_node.firstChild);
    }
  }

  function make_ajax(url, callback) {
    var xmlhttp=new XMLHttpRequest();

    xmlhttp.addEventListener("readystatechange",function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
      {
        callback(xmlhttp.responseText);
      }
    });

    xmlhttp.open("GET",url,true);
    xmlhttp.send();
  }

  function update_view(json_data) {
    var p = JSON.parse(json_data);

    var singlePostContent = document.querySelector("#singlePostContent");

    clearChildNodes(singlePostContent);

    var new_category= document.createElement("h4");
    new_category.innerHTML = p.results[0].category;
    singlePostContent.appendChild(new_category);

    var new_name= document.createElement("h1");
    new_name.innerHTML = p.results[0].name;
    singlePostContent.appendChild(new_name);

    var new_body= document.createElement("p");
    new_body.innerHTML = p.results[0].body;
    new_body.className = "body-copy";
    singlePostContent.appendChild(new_body);

    var new_author= document.createElement("h4");
    new_author.innerHTML = "by "+p.results[0].author;
    singlePostContent.appendChild(new_author);

    var new_date= document.createElement("h5");
    new_date.innerHTML = "Date Published: "+p.results[0].date;
    singlePostContent.appendChild(new_date);

    var singlePostImg = document.querySelector("#postImg");
    singlePostImg.src ="<?php echo URL;?>img/"+p.results[0].image;

  }

  document.addEventListener("DOMContentLoaded",function() {

    //@JOSH: What happens if the POST ID is not set? 
    make_ajax("/posts/postJSON/ <?php if (isset($post->id)) echo htmlspecialchars($post->id, ENT_QUOTES, 'UTF-8'); ?>",update_view);

  });

  //Sets the Active tab in the nav bar

  document.addEventListener("DOMContentLoaded",function() {

    var post_nav= document.querySelector("#post-nav");
    post_nav.className = "active";

  });

</script>
<div class="container overlay">
  <div class="row blog-content"><!--This is a place for the introductory content -->

    <div class="col-sm-2 sidebar">
      <img src="img/code-bootcamp.png" class="img-responsive" alt="Placeholder" id="postImg">
      <h3>Related Articles</h3>
      <ul>
        <?php foreach ($five_posts as $post) { ?>
        <li><a href="<?php echo URL . 'posts/singlepost/' . htmlspecialchars($post->id, ENT_QUOTES, 'UTF-8'); ?>"><?php if (isset($post->name)) echo htmlspecialchars($post->name, ENT_QUOTES, 'UTF-8'); ?></a></li>
        <?php }?>
      </ul>
    </div>

    <div id="singlePostContent" class="col-sm-9 col-sm-offset-1">
      <h4>Blog Content goes here</h4>
      <h1>Title</h1>
      <p class="body-copy">Body Copy</p>
      <h4>Author Name</h4>
      <h5>Date Published</h5>

      <img src="img/placeholder_img.jpg" class="img-responsive" alt="Placeholder">
    </div>


  </div>
</div>
