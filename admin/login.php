<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('inc/header.php') ?>

<body class="hold-transition ">
  <script>
    start_loader()
  </script>
  <style>
    html,
    body {
      height: calc(100%) !important;
      width: calc(100%) !important;
      overflow: hidden;
    }

    body {
      background-image: url("<?php echo validate_image($_settings->info('cover')) ?>");
      background-size: cover;
      background-repeat: no-repeat;
    }

    .login-title {
      text-shadow: 2px 2px black
    }

    .text__header-h1 {
      /* display: flex;
      justify-content: center;
      align-items: center;
      width: 30%; */
      width: 40%;
      position: relative;
      left: 100px;
      color: #fff;
      border-radius: 30px;
      background-color: rgba(12, 13, 14, 0.04);
      /* background: linear-gradient(to right, #30CFD0 0%, #330867 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent; */
      font-size: 50px;
    }


    #login {
      flex-direction: column !important
    }

    #logo-img {
      height: 150px;
      width: 150px;
      object-fit: scale-down;
      object-position: center center;
      border-radius: 100%;
    }

    #login .col-7,
    #login .col-5 {
      width: 100% !important;
      max-width: unset !important
    }

    .section__loign-rows {
      display: flex;
      position: relative;
      border-radius: 30px;
    }

    .section__form-top {
      position: absolute;
      /* border-radius: 30px; */
    }

    .section__form-footer {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100vw;
      position: absolute;
      left: -107px;
      bottom: 0;
    }

    .section__form-img {
      top: -120px;
    }

    .card {
      border-radius: 20px;
      cursor: pointer;
    }

    .section__item-img {
      cursor: pointer;
      pointer-events: none;
      z-index: 999;
    }

    /* form login style */
    .login-box {
      margin: 0 auto;
      width: 400px;
      padding: 40px;
      background: rgba(0, 0, 0, .8);
      box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
      border-radius: 10px;
    }

    .login-box h2 {
      margin: 0 0 30px;
      padding: 0;
      color: #fff;
      text-align: center;
    }

    .login-box .user-box {
      position: relative;
    }

    .login-box .user-box input {
      width: 100%;
      padding: 10px 0;
      font-size: 16px;
      color: #fff;
      margin-bottom: 30px;
      border: none;
      border-bottom: 1px solid #fff;
      outline: none;
      background: transparent;
    }

    .login-box .user-box label {
      position: absolute;
      top: 0;
      left: 0;
      padding: 10px 0;
      font-size: 16px;
      color: #fff;
      pointer-events: none;
      transition: .5s;
    }

    .login-box .user-box input:focus~label,
    .login-box .user-box input:valid~label {
      top: -20px;
      left: 0;
      color: #03e9f4;
      font-size: 12px;
    }

    .login-box form a {
      position: relative;
      display: inline-block;
      padding: 10px 20px;
      color: #03e9f4;
      font-size: 16px;
      text-decoration: none;
      text-transform: uppercase;
      overflow: hidden;
      transition: .5s;
      margin-top: 40px;
      letter-spacing: 4px
    }

    .login-box a:hover {
      background: #03e9f4;
      color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 5px #03e9f4,
        0 0 25px #03e9f4,
        0 0 50px #03e9f4,
        0 0 100px #03e9f4;
    }

    .login-box a span {
      position: absolute;
      display: block;
    }

    .login-box a span:nth-child(1) {
      top: 0;
      left: -100%;
      width: 100%;
      height: 2px;
      background: linear-gradient(90deg, transparent, #03e9f4);
    }

    .login-box a span:nth-child(2) {
      top: -100%;
      right: 0;
      width: 2px;
      height: 100%;
      background: linear-gradient(180deg, transparent, #03e9f4);
    }

    .login-box a span:nth-child(3) {
      bottom: 0;
      right: -100%;
      width: 100%;
      height: 2px;
      background: linear-gradient(270deg, transparent, #03e9f4);
    }


    .login-box a span:nth-child(4) {
      bottom: -100%;
      left: 0;
      width: 2px;
      height: 100%;
      background: linear-gradient(360deg, transparent, #03e9f4);
    }

    /* KEYFRAMES */

    @keyframes btn-anim1 {
      0% {
        left: -100%;
      }

      50%,
      100% {
        left: 100%;
      }
    }

    @keyframes btn-anim2 {
      0% {
        top: -100%;
      }

      50%,
      100% {
        top: 100%;
      }
    }

    @keyframes btn-anim3 {
      0% {
        right: -100%;
      }

      50%,
      100% {
        right: 100%;
      }
    }

    @keyframes btn-anim4 {
      0% {
        bottom: -100%;
      }

      50%,
      100% {
        bottom: 100%;
      }
    }

    /* USING KEYFRAMES */

    .login-box a span:nth-child(1) {
      animation: btn-anim1 1s linear infinite;
    }

    .login-box a span:nth-child(2) {
      animation: btn-anim2 1s linear infinite;
      animation-delay: .25s
    }

    .login-box a span:nth-child(3) {
      animation: btn-anim3 1s linear infinite;
      animation-delay: .5s
    }

    .login-box a span:nth-child(4) {
      animation: btn-anim4 1s linear infinite;
      animation-delay: .75s
    }

    .form_login-hover:hover {
      color: #fff !important;
    }

    .login-box {
      position: relative;
      top: 50px;
    }

    /* typing */

    .title-container {
      display: flex;
      justify-content: center;
      padding-top: 5%;
      padding-bottom: 5%;

    }

    /* Style the title and the image appearing behind the words */
    h1.title {
      font-size: 5vw;
      font-family: Segoe UI, "Rockwell Extra Bold";
      letter-spacing: 8px;
      background-image: url("https://i.pinimg.com/originals/fc/fa/4b/fcfa4b5d2b15848c101ce15db59a2c4f.gif");
      background-position-y: 74%;
      background-position-x: 80%;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      -webkit-font-smoothing: antialiased;
      background-repeat: repeat;
      font-weight: 800;
      display: flex;
      flex-shrink: inherit;
      text-transform: uppercase;
    }

    .title {
      width: 92%;
      margin-top: 3%;
      margin-bottom: 3%;
      display: flex;
      justify-content: center;
      background-image: linear-gradient(0deg, #000000 0%, #080808 50%, #000000 100%);
      background-color: #000000;
    }

    /* the image that appears in the background of block */
    .title-words {
      border: 6px solid rgb(7, 7, 7);
      width: 60%;
      display: flex;
      justify-content: center;
      background-image: url("https://i.pinimg.com/originals/fc/fa/4b/fcfa4b5d2b15848c101ce15db59a2c4f.gif");
      background-size: cover;
      background-position-y: 75%;
    }

    //snow fall
    /* body,
    html {
      margin: 0;
      padding: 0;
      background-color: rgba(20, 20, 25, 1);
    } */

    /* body,
    html {
      overflow-x: hidden;
      width: 100vw;
      height: auto;
    } */

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
  </style>
  <div class="snow-container"></div>
  <div style="height: 100vh;">
    <div class="section__loign-rows h-100 d-flex align-items-center w-100" id="login">
      <!-- item 1 -->
      <div class="section__form-img col-7 h-100 d-flex align-items-center justify-content-center">
        <div class="section__item-img w-100">
          <a href="http://localhost/orms">
            <div style="text-align:center">
              <img src="<?= validate_image($_settings->info('logo')) ?>" alt="ádasdasd" id="logo-img">
            </div>
          </a>
        </div>
      </div>

      <!-- Item 2 -->
      <!-- SECTION__FORM -->
      <div class="section__form-top col-5 h-100 bg-gradient">
        <div style="gap:110px" class="d-flex w-100 h-100 justify-content-center align-items-center">
          <h1 class="text__header-h1 text-center py-5">
            <!-- <b>
          
          </b>
          <div></div>
          Trang Đăng Nhập -->
            <div class="title-container">
              <div class="title-words">
                <div class="title">
                  <h1 class="title">
                    <!-- <?php echo $_settings->info('name') ?> -->
                    TRANG ĐĂNG NHẬP
                  </h1>
                </div>
              </div>
            </div>
          </h1>
          <!-- FORM -->
          <div class="login-box">
            <h2>Đăng Nhập</h2>
            <form autocomplete="off" id="login-frm" action="" method="post">
              <div class="user-box">
                <input type="text" name="username" required>
                <label>Tài Khoản</label>
              </div>
              <div class="user-box">
                <input type="password" name="password" required="">
                <label>Mật Khẩu</label>
              </div>
              <a href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <button class="form_login-hover"
                  style="color:#03e9f4;;font-size:1.2rem;font-weight:600;background: none;border:none;outline:none"
                  type="submit">Đăng
                  Nhập</button>
                <a href="<?php echo base_url ?>">Đến trang chủ</a>
              </a>
            </form>
          </div>
          <!-- End FORM -->
        </div>
      </div>
      <!-- #region -->

      <footer class="section__form-footer">
        <?php include "inc/footer.php"; ?>
      </footer>
    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <script>
      $(document).ready(function () {
        end_loader();
      })
    </script>

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

</body>

</html>