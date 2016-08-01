# Final Exercise
 
### A cumulative review of the SD Code Bootcamp Course

The goal of this exercise is to combine all of the primary concepts we covered during the course. Your goal is to produce a final website that you will review with the class, this will include demonstrations of your work-flow. Your final site must include the following:
- Checkout a new copy of the mini framework, use this as a basis for the application.
- If you’re feeling adventurous, you can consider using another PHP framework such as Yii.



## Database

Modify the schema to include a table for a blog post, include a few basic properties such as:

- Title
- Body
- Date Published
-  Category (this will be a foreign key to the Categories table)
-Others as you see fit

Include a table that represents categories, a blog post will belong to a single category. Populate this table  manually.
- Ensure that you define the FK constraint in your database

Don’t worry about including the default Songs table/data.

## HTML/CSS

Either create or use an existing Bootstrap theme (here is a good one http://getbootstrap.com/examples/blog/), implement this in your application.
- For your CSS, implement SASS to write your CSS in and produce valid CSS.
- Ensure it is mobile-responsive.

Add an image rotator to the main page - consider using jQuery to accomplish this. There are CSS-only solutions if you’re interested :) 

OPTIONAL:Use at least one Bootstrap component. For example, use an alert to notify your user if there action was successful or not (such as adding a new post) - http://getbootstrap.com/2.3.2/components.html#alerts.

OPTIONAL:Add microdata attributes to your theme - use schema.org to find available properties.

## PHP/MVC/JavaScript
Create the necessary views, controllers and modify the model. Remember, most MVC frameworks will not use a single model class. 

The home page should show a listing of all blog posts - title, data published and a snippet of the first 200 words. 
- Clicking on the title will take them to view the entire blog post.
- Populate this page using AJAX and JSON - your controller should generate the necessary JSON to be called and consumed by your JavaScript

Create a page to add a new blog post as well as be able to delete a post. Do not worry about protecting this functionality via authentication.

LOW P: Create a page (controller function) that generates a sitemap - this just needs to be a list of links to all pages in your site.

Include at least one static page such as an about us or contact us.

## Version Control

Create a repository for this code, make sure to commit as necessary.

Before writing any custom code, make a branch to do all of your development on. When you are ready to review this project, create a PULL REQUEST to merge the branch you created back with MASTER.

Include a gitignore file


