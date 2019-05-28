<?php
// header("Location: views/index.php");
// die();
?>
<!DOCTYPE html>
<html>
<style>
body, html {
  height: 100%;
  margin: 0;
  overflow: hidden;
}

.bgimg {
  background-image: url('https://3c1703fe8d.site.internapcdn.net/newman/gfx/news/hires/2017/1-meteor.jpg');
  height: 100%;
  background-position: center;
  background-size: cover;
  position: relative;
  color: white;
  font-family: "Courier New", Courier, monospace;
  font-size: 25px;
}

.topleft {
  position: absolute;
  top: 0;
  left: 16px;
}

.bottomleft {
  position: absolute;
  bottom: 0;
  left: 16px;
}

.middle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

hr {
  margin: auto;
  width: 40%;
}
</style>
<body>

<div class="bgimg">
  <div class="topleft">
    <p>WordNews</p>
  </div>
  <div class="middle">
    <h1>COMING SOON</h1>
    <hr>
    <p>14 days left</p>
  </div>
  <div class="bottomleft">
    <p>&copy; WordNews 2019</p>
  </div>
</div>

</body>
</html>
