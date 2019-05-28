<?php

?>
 <div class="content">
        <main>
          <div class="container-fluid">
            <h2>Articles</h2>
            <div class="table-responsive">
              <table class='table table-light'>
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th>Image</th>
					<th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    include './finance_list.php';
                  ?>
                </tbody>
              </table>
            </div>
                <?php
                  include './add_article.php';
                ?>
            </div>
          </main>
      </div>
</html>



