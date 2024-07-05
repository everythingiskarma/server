<!Doctype html>
<?php
// get current light mode
//if (isset($_SESSION['mode'])) {$mode = $_SESSION['mode'];} else {$mode = "light";}
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to isKarma</title>
  <link rel="stylesheet" type="text/css" href="iskarma.com/ui/icomoon/style.css" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="iskarma.com/ui/css/html5.css" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="iskarma.com/ui/css/ui.css" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="iskarma.com/ui/css/web.css" charset="utf-8">
  <!-- initialize the css for api - profile -->
  <link rel="stylesheet" type="text/css" href="iskarma.com/ui/css/profile.css" charset="utf-8">
  <!-- initialize the css for api - authenticator -->
  <link rel="stylesheet" type="text/css" href="iskarma.com/ui/css/images.css" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="iskarma.com/ui/css/authenticator.css" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="iskarma.com/ui/css/animations.css" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="iskarma.com/ui/css/article.css" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="iskarma.com/ui/css/carousel.css" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="iskarma.com/ui/css/header.css" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="iskarma.com/ui/css/pages.css" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="iskarma.com/ui/css/search.css" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="iskarma.com/ui/css/sidebar.css" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="iskarma.com/ui/css/toggles.css" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="iskarma.com/ui/css/welcome.css" charset="utf-8">
  <link rel="icon" type="image/ico" href="iskarma.com/favicon.ico" charset="utf-8">
  <script src="iskarma.com/ui/js/jquery.js"></script>
  <script>
    $(document).ready(function() {
      $.getScript("iskarma.com/ui/js/ajax.js");
      // initialize the ajax controller for api - authenticator
      $.getScript("iskarma.com/ui/js/api-controller-authenticator.js");
      // initialize the ajax controller for api - dashboard
      $.getScript("iskarma.com/ui/js/api-controller-dashboard.js");
      // initialize the ajax controller for api - profile
      $.getScript("iskarma.com/ui/js/api-controller-profile.js");
      // initialize the ajax controller for api - wallet
      $.getScript("iskarma.com/ui/js/api-controller-wallet.js");
      // initialize the ajax controller for api - content
      $.getScript("iskarma.com/ui/js/api-controller-content.js");
      // initialize the ajax controller for api - store
      $.getScript("iskarma.com/ui/js/api-controller-store.js");
      // initialize the ajax controller for api - marketing
      $.getScript("iskarma.com/ui/js/api-controller-marketing.js");

      $.getScript("iskarma.com/ui/js/api-controller-static-content.js");
      $.getScript("iskarma.com/ui/js/api-controller-static-search.js");

      $.getScript("iskarma.com/ui/js/ui.js");
      $.getScript("iskarma.com/ui/js/ui-uploads.js");
      $.getScript("iskarma.com/ui/js/ui-functions.js");
      $.getScript("iskarma.com/ui/js/ui-event-handlers.js");
      $.getScript("iskarma.com/ui/js/ui-startup.js");
      $.getScript("iskarma.com/ui/js/ui-sidebar-menu.js");

      $.getScript("iskarma.com/ui/js/onboarding.js");
      $.getScript("iskarma.com/ui/js/countries.js");
      $.getScript("iskarma.com/ui/js/site.js");
      $.getScript("iskarma.com/ui/js/telemetry.js");
      $.getScript("iskarma.com/ui/js/copy-element-content.js");
      $.getScript("iskarma.com/ui/js/temp.js");
    });
  </script>
</head>

<body>
  <div id="toTop" class="icon-up"></div>
  <header>
    <?php require_once "iskarma.com/sections/header/layout.php"; ?>
  </header>
  <sidebar>
    <?php require_once "iskarma.com/sections/header/views/sidebar.php"; ?>
  </sidebar>
  <main>
    <?php
    // require activities slider carousel
    //require_once "iskarma.com/sections/header/views/slides.php";
    // load dynamic content in this section using jquery/ajax
    //require_once "iskarma.com/content/about/home.php";
    ?>
  </main>

  <wrapper>
    <esc class="icon-close"></esc>
    <div id="processing" class="hide">
      <span class="icon-spinner"></span>
      <span class="icon-spinner1"></span>
    </div>
    <load></load>
  </wrapper>

  <footer>
    <center>
      <a href="https://www.iskarma.com">www.iskarma.com</a><br>
      <small>
        Copyright &copy; 2024, Is Karma Inc. <br>
        <div class="date-clock">
          <?php echo date("l, j F, Y | "); ?>
          <clock></clock>
        </div>
      </small>
    </center>
  </footer>

  <div class="reporting">
    <div class="reports">
      <in><b class="icon-home"></b><i>Welcome to isKarma</i></in>
    </div>
    <div class="reports-grid">
      <div class="icon icon-search"></div>
      <input placeholder="Filter Notifications">
      <div id="x-messages" class="icon icon-trashcan" title="clear"></div>
      <div id="x-reporting" class="icon icon-close" title="close"></div>
      </h2>
    </div>
  </div>

  <div class="rCount icon-msg-n">
    <div class="rel"><span class="ncount"></span></div>
  </div>

  <overload>
    <div class="icon-close x-overload"></div>
    <div class="content"></div>
  </overload>

  <superload>
    <div class="icon-close x-superload"></div>
    <div class="content"></div>
  </superload>

</body>

</html>