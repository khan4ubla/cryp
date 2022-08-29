<?php
include 'partials/header.php';
$query = "SELECT * FROM posts ORDER BY date_time DESC ";
$posts = mysqli_query($connection, $query);
?>

<!-- ========================================== SEARCH BAR======================================================= -->
<section class="search__bar">
  <form class="container search__bar-container" action="">
    <div>
      <i class="uil uil-search"></i>
      <input type="search" name="" placeholder="Search">
      <button type="submit" class="btn">Go</button>
    </div>
  </form>
</section>


<!-- ===========================================END OF SEARCH BAR===================================================== -->

<!-- ===========================================GENERAL POST SECTION=================================================== -->
<section class="posts">
  <div class="container posts__container">
    <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
      <article class="post">
        <div class="post__thumbnail">
          <img src="images/img2.jpg" />
        </div>
        <div class="post__info">
          <?php
          $category_id = $post['category_id'];
          $category_query = "SELECT * FROM categories WHERE id=$category_id";
          $category_result = mysqli_query($connection, $category_query);
          $category = mysqli_fetch_assoc($category_result);
          ?>
          <br />
          <a href=" <?= ROOT_URL ?>category-posts.php?id=<?= $post['category_id'] ?>" class="category__button"><?= $category['title'] ?></a>
          <h3 class="post__title">
            <a href="post.php"><?= substr($post['body'], 0, 25) ?></a>
          </h3>
          <p class="post__body">
            <?= substr($post['body'], 0, 35) ?>...
          </p>
          <div class="post__author">
            <div class="post__author-avatar">
              <img src="images/avatar2.jpg" />
            </div>
            <div class="post__author-info">
              <h5>Khan Shahid</h5>
              <small>june 26, 2022</small>
            </div>
          </div>
        </div>
      </article>
    <?php endwhile ?>
  </div>
</section>
<!-- =========================== GENERAL POSTS END ======================================= -->

<!-- ===================================== CATEGORY BUTTONS======================================= -->

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
<!-- ===================================== END OF CATEGORY BUTTONS ======================================= -->

<?php
include 'partials/footer.php';
?>