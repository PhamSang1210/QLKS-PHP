<?php require_once('./config.php'); ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<style>
  html {
    scroll-behavior: smooth;
  }

  #header {
    height: 70vh;
    width: calc(100%);
    position: relative;
    top: -1em;
  }

  #header:before {
    content: "";
    position: absolute;
    height: calc(100%);
    width: calc(100%);
    background-image: url(<?= validate_image($_settings->info("cover")) ?>);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
  }

  #header>div {
    position: absolute;
    height: calc(100%);
    width: calc(100%);
    z-index: 2;
  }

  #top-Nav a.nav-link.active {
    color: #343a40;
    font-weight: 900;
    position: relative;
  }

  #top-Nav a.nav-link.active:before {
    content: "";
    position: absolute;
    border-bottom: 2px solid #343a40;
    width: 33.33%;
    left: 33.33%;
    bottom: 0;
  }

  /* snow fall */
  body,
  html {
    margin: 0;
    padding: 0;
    background-color: rgba(20, 20, 25, 1);
  }

  body,
  html {
    overflow-x: hidden;
    width: 100vw;
    height: auto;
  }

  .snow-container {
    position: fixed;
    top: 0;
    left: 0;
    overflow: hidden;
    width: 100vw;
    height: 100vh;
    z-index: 99999;
    pointer-events: none;
  }


  .snowflake {
    position: absolute;
    background-color: white;
    border-radius: 50%;
    opacity: 0.8;
    pointer-events: none;
  }

  @keyframes fall {
    0% {
      opacity: 0;
      transform: translateY(0);
    }

    10% {
      opacity: 1;
    }

    100% {
      opacity: 0.5;
      transform: translateY(100vh);
    }
  }

  @keyframes diagonal-fall {
    0% {
      opacity: 0;
      transform: translate(0, 0);
    }

    10% {
      opacity: 1;
    }

    100% {
      opacity: 0.25;
      transform: translate(10vw, 100vh);
    }
  }

  /* banner noel */
  .banner__noel {
    position: fixed;
    bottom: -60px;
    left: -155px;
    z-index: 1;
  }

  /* Zalo */
  @media (max-width: 576px) {
    .fb-customerchat {
      display: none;
    }
  }

  .zalome {
    position: fixed;
    bottom: 15px;
    right: 10px;
    margin: 10px;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    background-color: #004A7F;
    color: #FFFFFF;
    cursor: pointer;
    display: inline-block;
    font-family: Arial;
    font-size: 20px;
    padding: -10px -10px;
    text-align: center;
    text-decoration: none;
  }

  @-webkit-keyframes glowing {
    0% {
      background-color: #004A7F;
      -webkit-box-shadow: 0 0 3px #004A7F;
    }

    50% {
      background-color: #0094FF;
      -webkit-box-shadow: 0 0 10px #0094FF;
    }

    100% {
      background-color: #004A7F;
      -webkit-box-shadow: 0 0 3px #004A7F;
    }
  }

  @-moz-keyframes glowing {
    0% {
      background-color: #004A7F;
      -moz-box-shadow: 0 0 3px #004A7F;
    }

    50% {
      background-color: #0094FF;
      -moz-box-shadow: 0 0 10px #0094FF;
    }

    100% {
      background-color: #004A7F;
      -moz-box-shadow: 0 0 3px #004A7F;
    }
  }

  @-o-keyframes glowing {
    0% {
      background-color: #004A7F;
      box-shadow: 0 0 3px #004A7F;
    }

    50% {
      background-color: #0094FF;
      box-shadow: 0 0 10px #0094FF;
    }

    100% {
      background-color: #004A7F;
      box-shadow: 0 0 3px #004A7F;
    }
  }

  @keyframes glowing {
    0% {
      background-color: #004A7F;
      box-shadow: 0 0 3px #004A7F;
    }

    50% {
      background-color: #0094FF;
      box-shadow: 0 0 10px #0094FF;
    }

    100% {
      background-color: #004A7F;
      box-shadow: 0 0 3px #004A7F;
    }
  }

  .zalome {
    z-index: 1;
    -webkit-animation: glowing 1500ms infinite;
    -moz-animation: glowing 1500ms infinite;
    -o-animation: glowing 1500ms infinite;
    animation: glowing 1500ms infinite;

  }

  /* icon git */
  @media (max-width: 576px) {
    .fb-customerchat {
      display: none;
    }
  }

  .git {
    position: fixed;
    top: 530px;
    bottom: 20px;
    right: 10px;
    margin: 10px;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    background-color: #004A7F;
    color: #FFFFFF;
    cursor: pointer;
    display: inline-block;
    font-family: Arial;
    font-size: 20px;
    padding: -10px -10px;
    text-align: center;
    text-decoration: none;
  }

  @-webkit-keyframes glowing {
    0% {
      background-color: #004A7F;
      -webkit-box-shadow: 0 0 3px #004A7F;
    }

    50% {
      background-color: #0094FF;
      -webkit-box-shadow: 0 0 10px #0094FF;
    }

    100% {
      background-color: #004A7F;
      -webkit-box-shadow: 0 0 3px #004A7F;
    }
  }

  @-moz-keyframes glowing {
    0% {
      background-color: #004A7F;
      -moz-box-shadow: 0 0 3px #004A7F;
    }

    50% {
      background-color: #0094FF;
      -moz-box-shadow: 0 0 10px #0094FF;
    }

    100% {
      background-color: #004A7F;
      -moz-box-shadow: 0 0 3px #004A7F;
    }
  }

  @-o-keyframes glowing {
    0% {
      background-color: #004A7F;
      box-shadow: 0 0 3px #004A7F;
    }

    50% {
      background-color: #0094FF;
      box-shadow: 0 0 10px #0094FF;
    }

    100% {
      background-color: #004 A7F;
      box-shadow: 0 0 3px #004A7F;
    }
  }

  @keyframes glowing {
    0% {
      background-color: #004A7F;
      box-shadow: 0 0 3px #004A7F;
    }

    50% {
      background-color: #0094FF;
      box-shadow: 0 0 10px #0094FF;
    }


    100% {
      background-color: #004A7F;
      box-shadow: 0 0 3px #004A7F;
    }
  }

  .git {
    z-index: 2;
    -webkit-animation: glowing 1500ms infinite;
    -moz-animation: glowing 1500ms infinite;
    -o-animation: glowing 1500ms infinite;
    animation: glowing 1500ms infinite;

  }

  /* Hotline */
  .header__hotline {
    position: fixed;
    top: 460px;
    bottom: 20px;
    right: 10px;
    margin: 10px;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    background-color: #004A7F;
    color: #FFFFFF;
    cursor: pointer;
    display: inline-block;
    font-family: Arial;
    font-size: 20px;
    padding: -10px -10px;
    text-align: center;
    text-decoration: none;
    z-index: 3;
  }

  @-webkit-keyframes glowing {
    0% {
      background-color: #004A7F;
      -webkit-box-shadow: 0 0 3px #004A7F;
    }

    50% {
      background-color: #0094FF;
      -webkit-box-shadow: 0 0 10px #0094FF;
    }

    100% {
      background-color: #004A7F;
      -webkit-box-shadow: 0 0 3px #004A7F;
    }
  }

  @-moz-keyframes glowing {
    0% {
      background-color: #004A7F;
      -moz-box-shadow: 0 0 3px #004A7F;
    }

    50% {
      background-color: #0094FF;
      -moz-box-shadow: 0 0 10px #0094FF;
    }

    100% {
      background-color: #004A7F;
      -moz-box-shadow: 0 0 3px #004A7F;
    }
  }

  @-o-keyframes glowing {
    0% {
      background-color: #004A7F;
      box-shadow: 0 0 3px #004A7F;
    }

    50% {
      background-color: #0094FF;
      box-shadow: 0 0 10px #0094FF;
    }

    100% {
      background-color: #004 A7F;
      box-shadow: 0 0 3px #004A7F;
    }
  }

  @keyframes glowing {
    0% {
      background-color: #004A7F;
      box-shadow: 0 0 3px #004A7F;
    }

    50% {
      background-color: #0094FF;
      box-shadow: 0 0 10px #0094FF;
    }


    100% {
      background-color: #004A7F;
      box-shadow: 0 0 3px #004A7F;
    }
  }

  .header__hotline {
    z-index: 3;
    -webkit-animation: glowing 1500ms infinite;
    -moz-animation: glowing 1500ms infinite;
    -o-animation: glowing 1500ms infinite;
    animation: glowing 1500ms infinite;

  }

  .header__hotline:hover {
    cursor: pointer;
  }


  .flying-deer {
    width: 100px;
    height: 100px;
    background-image: url(<?php echo tuan_loc ?>);
    background-size: contain;
    position: absolute;
    animation: fly 7s linear infinite;
    z-index: 100;
    background-repeat: no-repeat;
    top: 500px;
    /* bottom: -50px; */
  }

  @keyframes fly {
    0% {
      transform: translateX(0);
    }

    100% {
      transform: translateX(1200px);
    }
  }

  .decor_left {
    position: fixed;
    top: 50px;
    z-index: 4;
  }

  .decor_right {
    position: fixed;
    top: 50px;
    right: 0;
    z-index: 4;
  }



  /* Go to top */
  a {
    text-decoration: none;
  }

  i.fa-angle-double-up {
    position: fixed;
    top: 89%;
    left: 90%;
    z-index: 999;
    color: #fff;
    background: #000;
    font-size: 30px;
    padding: 8px 13px;
    border-radius: 10px;
    box-shadow: 0 0 5px 2px #000;
    transition: 0.3s;
  }

  i.fa-angle-double-up:hover {
    background: #fff;
    color: #000;
    box-shadow: 0 0 5px #000;
  }

  .gotoTop {
    /* display: ; */
  }

  .hidden {
    display: none;
  }
</style>
<?php require_once('inc/header.php') ?>

<body class="layout-top-nav layout-fixed layout-navbar-fixed" style="height: auto;">

  <!-- go to top -->
  <a onclick="goToTop()" class="gotoTop hidden" href="#">
    <i class="fa fa-angle-double-up"></i>
  </a>
  <!-- decor 1 -->
  <header class="decor_left">
    <img src="<?php echo decor_left ?>" alt="">
  </header>
  <!-- decor 2 -->
  <header class="decor_right">
    <img src="<?php echo decor_right ?>" alt="">
  </header>
  <!-- Tuan Loc Chay Qua -->
  <div class="flying-deer"></div>
  <!-- Zalo 16:43p 16/12/2023 -->
  <div class='zalome'>
    <a href='https://github.com/PhamSang1210/QLKS-PHP' target='_blank'>
      <img alt='icon zalo' src='uploads/icon/icon-zalo.png' />
    </a>
    <!-- GIT -->
    <div class="git">
      <div class='git'><a href='https://github.com/PhamSang1210/QLKS-PHP' target='_blank'>
          <img style="width: 100%;
    height: 100%;
    border-radius: 50%;" alt='icon github' src='uploads/icon/git.png' />
        </a>
      </div>
    </div>


  </div>
  <section class="header__hotline">
    <a href="tel:0988888888">
      <img alt='icon hotline-panda' src='<?php echo contact ?>' />
    </a>
  </section>
  <!-- end -->
  <!-- Fall snow -->
  <div class="snow-container"></div>
  <div style="height: 200vh;">
    <!-- End Fall snow -->
    <img class="banner__noel" src="uploads/noel.png" alt="">
    <div class="wrapper">
      <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
      <?php require_once('inc/topBarNav.php') ?>
      <?php if ($_settings->chk_flashdata('success')): ?>
        <script>
          alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
        </script>
      <?php endif; ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper pt-5" style="">
        <?php if ($page == "home" || $page == "about_us"): ?>
          <div id="header" class="shadow mb-4">
            <div class="d-flex justify-content-center h-100 w-100 align-items-center flex-column px-3">
              <h1 class="w-100 text-center site-title px-5">
                <?php echo $_settings->info('name') ?>
              </h1>
              <!-- <h3 class="w-100 text-center px-5 site-subtitle"><?php echo $_settings->info('name') ?></h3> -->
            </div>
          </div>
        <?php endif; ?>
        <!-- Main content -->
        <section style="background-color:#333;" class="content ">
          <div class="container">
            <?php
            if (!file_exists($page . ".php") && !is_dir($page)) {
              include '404.html';
            } else {
              if (is_dir($page))
                include $page . '/index.php';
              else
                include $page . '.php';
            }
            ?>
          </div>
        </section>
        <!-- /.content -->
        <div class="modal fade rounded-0" id="confirm_modal" role='dialog'>
          <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header rounded-0">
                <h5 class="modal-title">Xác nhận</h5>
              </div>
              <div class="modal-body rounded-0">
                <div id="delete_content"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id='confirm' onclick="">Tiếp Tục</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade rounded-0" id="uni_modal" role='dialog'>
          <div class="modal-dialog modal-md modal-dialog-centered rounded-0" role="document">
            <div class="modal-content rounded-0">
              <div class="modal-header rounded-0">
                <h5 class="modal-title"></h5>
              </div>
              <div class="modal-body rounded-0">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id='submit'
                  onclick="$('#uni_modal form').submit()">Lưu</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade rounded-0" id="uni_modal_right" role='dialog'>
          <div class="modal-dialog modal-full-height  modal-md" role="document">
            <div class="modal-content">
              <div class="modal-header rounded-0">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span class="fa fa-arrow-right"></span>
                </button>
              </div>
              <div class="modal-body rounded-0">
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="viewer_modal" role='dialog'>
          <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
              <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
              <img src="" alt="">
            </div>
          </div>
        </div>
      </div>
      <!-- /.content-wrapper -->
      <button id="goTop"></button>
      <?php require_once('inc/footer.php') ?>

      <script>
        document.addEventListener("DOMContentLoaded", function () {
          const snowContainer = document.querySelector(".snow-container");

          const particlesPerThousandPixels = 0.1;
          const fallSpeed = 1.25;
          const pauseWhenNotActive = true;
          const maxSnowflakes = 200;
          const snowflakes = [];

          let snowflakeInterval;
          let isTabActive = true;

          function resetSnowflake(snowflake) {
            const size = Math.random() * 5 + 1;
            const viewportWidth = window.innerWidth - size; // Adjust for snowflake size
            const viewportHeight = window.innerHeight;

            snowflake.style.width = `${size}px`;
            snowflake.style.height = `${size}px`;
            snowflake.style.left = `${Math.random() * viewportWidth}px`; // Constrain within viewport width
            snowflake.style.top = `-${size}px`;

            const animationDuration = (Math.random() * 3 + 2) / fallSpeed;
            snowflake.style.animationDuration = `${animationDuration}s`;
            snowflake.style.animationTimingFunction = "linear";
            snowflake.style.animationName =
              Math.random() < 0.5 ? "fall" : "diagonal-fall";

            setTimeout(() => {
              if (parseInt(snowflake.style.top, 10) < viewportHeight) {
                resetSnowflake(snowflake);
              } else {
                snowflake.remove(); // Remove when it goes off the bottom edge
              }
            }, animationDuration * 1000);
          }

          function createSnowflake() {
            if (snowflakes.length < maxSnowflakes) {
              const snowflake = document.createElement("div");
              snowflake.classList.add("snowflake");
              snowflakes.push(snowflake);
              snowContainer.appendChild(snowflake);
              resetSnowflake(snowflake);
            }
          }

          function generateSnowflakes() {
            const numberOfParticles =
              Math.ceil((window.innerWidth * window.innerHeight) / 1000) *
              particlesPerThousandPixels;
            const interval = 5000 / numberOfParticles;

            clearInterval(snowflakeInterval);
            snowflakeInterval = setInterval(() => {
              if (isTabActive && snowflakes.length < maxSnowflakes) {
                requestAnimationFrame(createSnowflake);
              }
            }, interval);
          }

          function handleVisibilityChange() {
            if (!pauseWhenNotActive) return;

            isTabActive = !document.hidden;
            if (isTabActive) {
              generateSnowflakes();
            } else {
              clearInterval(snowflakeInterval);
            }
          }

          generateSnowflakes();

          window.addEventListener("resize", () => {
            clearInterval(snowflakeInterval);
            setTimeout(generateSnowflakes, 1000);
          });

          document.addEventListener("visibilitychange", handleVisibilityChange);
        });

      </script>

      <script>

</body >

</html >