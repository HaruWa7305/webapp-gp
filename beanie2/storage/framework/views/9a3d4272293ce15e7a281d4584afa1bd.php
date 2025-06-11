<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Profile - Beanie Coffee Shop</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    /* Use your same header/footer styles here */
    body {
      font-family: 'Amatic SC', cursive;
      background: #fff8f0;
      color: #3e2f23;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* Header */
    .header {
      background-color: #3e2f23;
      padding: 15px 0;
    }

    .logo h1 {
      font-size: 2rem;
      color: white;
      margin: 0;
    }

    .logo span {
      color: #cba983;
    }

    .navmenu ul {
      margin: 0;
      padding: 0;
      list-style: none;
      display: flex;
      align-items: center;
    }

    .navmenu ul li a {
      font-size: 1.1rem;
      font-weight: bold;
      color: white;
      margin-left: 1.5rem;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .navmenu ul li a:hover,
    .navmenu ul li a.active {
      color: #cba983;
    }

    .btn-getstarted {
      background: #cba983;
      color: white;
      padding: 8px 20px;
      border-radius: 30px;
      font-weight: bold;
      text-decoration: none;
    }

    .btn-getstarted:hover {
      background: #b48b63;
      color: white;
    }
    .mobile-nav-toggle {
      font-size: 2rem;
      color: white;
      cursor: pointer;
      display: none;
    }
     @media (max-width: 991.98px) {
      .navmenu {
        display: none;
        position: absolute;
        top: 65px;
        right: 20px;
        background-color: #3e2f23;
        border-radius: 10px;
        width: 180px;
        flex-direction: column;
        padding: 10px 0;
        z-index: 9999;
      }

      .navmenu ul {
        flex-direction: column;
        gap: 10px;
      }

      .navmenu ul li a {
        margin-left: 0;
        padding: 8px 20px;
        display: block;
      }

      .navmenu.show {
        display: flex;
      }

      .mobile-nav-toggle {
        display: block;
      }
    }

    /* Main */
    .main-container {
      flex-grow: 1;
      padding: 1rem;
    }

    /* Footer */
    footer {
      background-color: #3e2f23;
      color: white;
      text-align: center;
      padding: 10px 0;
      margin-top: auto;
    }
  </style>
</head>

<body>
  <header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container d-flex align-items-center justify-content-between position-relative">
    <a href="/" class="logo d-flex align-items-center text-decoration-none">
      <h1 class="sitename mb-0">☕ Beanie<span>.</span></h1>
    </a>

    <nav id="navmenu" class="navmenu d-xl-flex align-items-center">
      <ul class="mb-0 d-flex align-items-center gap-3">
        <li><a href="<?php echo e(route('welcome')); ?>" class="active">Home</a></li>
        <li><a href="<?php echo e(route('welcome')); ?>#about">About</a></li>
        <li><a href="<?php echo e(route('menus')); ?>">Menu</a></li>
        <li><a href="<?php echo e(route('welcome')); ?>#contact">Contact</a></li>
        <li><a href="<?php echo e(route('menus')); ?>">Order Now</a></li>
        <li class="d-xl-none">
          <a href="<?php echo e(route('logout')); ?>"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
             class="btn-getstarted"
             style="display: block; margin: 0.5rem 1rem; border-radius: 30px; text-align: center;">
            Log Out
          </a>
        </li>
      </ul>
    </nav>

    <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

    <a href="<?php echo e(route('logout')); ?>"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
       class="btn-getstarted d-none d-xl-inline-block">
      Log Out
    </a>

    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
      <?php echo csrf_field(); ?>
    </form>
  </div>
</header>


  <main class="main-container container d-flex flex-column justify-content-center align-items-center" style="min-height: 70vh;">
  <h2 class="mb-4 text-center" style="font-size: 3.5rem;">Your Profile</h2>

  <div class="card shadow-lg" style="max-width: 600px; width: 100%; border-radius: 20px; background-color: #fff0e0;">
    <div class="card-body text-center p-5">
        <img src="assets/profile2.svg" alt="profile icon" style="width: 180px; height: 180px; object-fit: cover; border-radius: 50%; margin-bottom: 1.5rem;">
      <p class="fs-4 mb-3"><strong>Name:</strong> <?php echo e(Auth::user()->name); ?></p>
      <p class="fs-4"><strong>Email:</strong> <?php echo e(Auth::user()->email); ?></p>
    </div>
  </div>
</main>


  <footer>
    &copy; <?php echo e(date('Y')); ?> Beanie Coffee Shop. All rights reserved.
  </footer>

  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const toggle = document.querySelector(".mobile-nav-toggle");
      const navMenu = document.getElementById("navmenu");

      toggle.addEventListener("click", function () {
        navMenu.classList.toggle("show");
      });
    });
  </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\beanie2\resources\views/profile.blade.php ENDPATH**/ ?>