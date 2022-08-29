<?php
include 'partials/header.php';
$featured_query = "SELECT * FROM posts WHERE  is_featured=1";
$featured_result = mysqli_query($connection, $featured_query);
$featured = mysqli_fetch_assoc($featured_result);
//===================================
$query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 9";
$posts = mysqli_query($connection, $query);
?>
<!-- ========================================== FEATURED POST===================================================  -->
<?php if (mysqli_num_rows($featured_result) == 1) : ?>
  <section class="featured">
    <div class="container featured__container">
      <div class="post__thumbnail">
        <img src="images/<?= $featured['thumbnail'] ?>" alt="img not found" />
      </div>
      <div class="post__info">
        <?php
        $category_id = $featured['category_id'];
        $category_query = "SELECT * FROM categories WHERE id=$category_id";
        $category_result = mysqli_query($connection, $category_query);
        $category = mysqli_fetch_assoc($category_result);
        ?>
        <a href="<?= ROOT_URL ?>category-posts.php?<?= $featured['category_id'] ?>" class="category__button"><?= $category['title'] ?></a>
        <h2 class="post__title">
          <a href="<?= ROOT_URL ?>post.php?id=<?= $featured['id'] ?>"><?= $featured['title'] ?></a>
        </h2>
        <p class="post__body">
          <?= substr($featured['body'], 0, 300) ?>...
        </p>
        <div class="post__author">
          <?php
          $author_id = $featured['author_id'];
          $author_query = "SELECT * FROM users WHERE id=$author_id";
          $author_result = mysqli_query($connection, $author_query);
          $author = mysqli_fetch_assoc($author_result);
          ?>
          <div class="post__author-avatar">
            <img src="images/<?= $author['avatar'] ?>" />
          </div>
          <div class="post__author-info">
            <h5> <?= " {$author['firstname']} {$author['lastname']}" ?></h5>
            <small><?= date("M d, Y - H:i", strtotime($featured['date_time'])) ?></small>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif ?>
<!-- ==========================================END OF FEATURED POST===================================================  -->

<!-- ===========================================GEGENERAL POST SECTION=================================================== -->
<section class="posts">
  <div class="container posts__container">
    <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
      <article class="post">
        <div class="post__thumbnail">
          <img src="images/
          <?= $post['thumbnail'] ?>" />
        </div>
        <div class="post__info">
          <?php
          $category_id = $post['category_id'];
          $category_query = "SELECT * FROM categories WHERE id=$category_id";
          $category_result = mysqli_query($connection, $category_query);
          $category = mysqli_fetch_assoc($category_result);
          ?>
          <br>
          <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $post['category_id'] ?>" class="category__button"><?= $category['title'] ?></a>
          <h3 class="post__title">
            <a href="post.php"><?= substr($post['title'], 0, 25) ?></a>
          </h3>
          <p class="post__body">
            <?= substr($post['body'], 0, 35) ?>...
          </p>
          <div class="post__author">
            <?php
            $author_id = $post['author_id'];
            $author_query = "SELECT * FROM users WHERE id=$author_id";
            $author_result = mysqli_query($connection, $author_query);
            $author = mysqli_fetch_assoc($author_result);
            ?>
            <div class="post__author-avatar">
              <img src="images/<?= $author['avatar'] ?>" />
            </div>
            <div class="post__author-info">
              <h5><?= " {$author['firstname']} {$author['lastname']}" ?></h5>
              <small><?= date("M d, Y - H:i", strtotime($post['date_time'])) ?></small>
            </div>
          </div>
        </div>
      </article>
    <?php endwhile ?>
  </div>
</section>
<!-- ===========================================GENERAL POST SECTION=================================================== -->


<!-- =========================================== CATEGORY BUTTONS======================================================= -->
<section class="category__buttons">
  <div class="container category__buttons-container">
    <a href="" class="category__button">Food</a>
    <a href="" class="category__button">Wild Life</a>
    <a href="" class="category__button">travel</a>
    <a href="" class="category__button">Art</a>
    <a href="" class="category__button">Techonology</a>
    <a href="" class="category__button">Music</a>
  </div>
</section>