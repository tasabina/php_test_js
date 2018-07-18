<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>404</title>
<style>
html { height: 100%; }
body {
  background: url(your_image.jpg) no-repeat;
  background-size: cover;
  }
.over {
  background: rgba(0, 0, 0, 0.7);
  position: absolute;
  left: 0; right: 0; top: 0; bottom: 0;
  }
.404 {
  margin-top: 100px;
  text-align: center; 
  font-size: 10em;
  color: #fcf9f9;
  position: relative; 
  z-index: 2; 
  }
.notfound {
  text-align: center;
  color: #fff;
  font-size: 2em;
  position: relative;
  z-index: 2;
  }
.notfound a {
  color: #fff;
  font-size: 0.8em;
  }
.notfound a:hover {
  color: yellow;
  text-decoration: none;
  }
</style>
</head>
<body>
<div class="over"></div>
<div class="notfound">404</div>
<div class="notfound">Page not found<br>
<a href="main">Back to the main page...</a>
</div>
</body>
</html>