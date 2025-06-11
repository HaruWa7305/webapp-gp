<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Beanie Coffee Shop</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    body {
      font-family: 'Amatic SC', cursive;
      background: #fff8f0;
      color: #3e2f23;
    }

    .header {
      background-color: #3e2f23;
      padding: 15px 0;
    }

    .logo h1 {
      font-size: 2.5rem;
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
      font-size: 1.2rem;
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

    #hero {
      background: url('https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=1350&q=80') center center no-repeat;
      background-size: cover;
      height: 75vh;
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: center;
      text-align: center;
      padding: 0 1rem;
      text-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
    }

    #hero h1 {
      font-size: 4rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
    }

    #hero p {
      font-size: 1.5rem;
      max-width: 600px;
      margin: 0 auto 1.5rem;
    }

    #hero .btn-getstarted {
      font-size: 1.2rem;
      padding: 12px 30px;
    }

    section {
      padding: 4rem 0;
      text-align: center;
    }

    section h2 {
      font-size: 3rem;
      margin-bottom: 1rem;
      color: #3e2f23;
    }

    section p.lead {
      font-size: 1.3rem;
      margin-bottom: 3rem;
      color: #5a4a3e;
    }

    .menu-item {
      background: white;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 0 10px rgb(0 0 0 / 0.1);
      transition: transform 0.3s ease;
    }

    .menu-item:hover {
      transform: translateY(-8px);
    }

    .menu-item h3 {
      font-weight: 700;
      font-size: 1.5rem;
      margin-bottom: 0.5rem;
      color: #3e2f23;
    }

    .menu-item p {
      font-size: 1.1rem;
      color: #7d6f63;
      margin-bottom: 0.8rem;
    }

    .menu-item .price {
      font-weight: 700;
      color: #cba983;
      font-size: 1.3rem;
    }

    footer {
      background-color: #3e2f23;
      color: white;
      padding: 1.5rem 0;
      text-align: center;
      font-size: 0.9rem;
    }
  </style>
</head>

<body>

  <!-- Login success message -->
  <?php if(session('status')): ?>
    <div class="container mt-3">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session('status')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
  <?php endif; ?>

  <!-- Header/Navbar -->
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container d-flex align-items-center justify-content-between position-relative">
        <a href="#" class="logo d-flex align-items-center text-decoration-none">
            <h1 class="sitename mb-0">☕ Beanie<span>.</span></h1>
        </a>

        <nav id="navmenu" class="navmenu d-xl-flex align-items-center">
            <ul class="mb-0 d-flex align-items-center gap-3">
                <li><a href="#hero" class="active">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="<?php echo e(route('menus')); ?>">Order Now</a></li>
                <li><a href="<?php echo e(route('orders.status')); ?>">Order Status</a></li> <!-- Order Status Link -->
                <!-- Log Out Button (only shown when user is authenticated) -->
                <?php if(Auth::check()): ?>
                    <li>
                        <form action="<?php echo e(route('logout')); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn-getstarted" style="display: block; margin: 0.5rem 1rem;">
                                Log Out
                            </button>
                        </form>
                    </li>
                <?php endif; ?>
                <li class="d-xl-none">
                    <a href="<?php echo e(route('profile')); ?>" class="btn-getstarted" style="display: block; margin: 0.5rem 1rem;">
                        Profile
                    </a>
                </li>
            </ul>
        </nav>

        <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
        <a href="<?php echo e(route('profile')); ?>" class="btn-getstarted d-none d-xl-inline-block">Profile</a>
    </div>
</header>

  <!-- Hero Section -->
  <section id="hero">
    <div class="container">
      <h1>Welcome to Beanie</h1>
      <p>Your favorite spot for freshly brewed coffee and treats!</p>
      <a href="#menu" class="btn-getstarted">See Our Menu</a>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="bg-light py-5">
    <div class="container">
      <h2>About Beanie</h2>
      <p class="lead">At Beanie Coffee Shop, we pride ourselves on brewing the finest coffee sourced from sustainable farms. Cozy atmosphere, friendly faces, and delicious treats await you!</p>
    </div>
  </section>

  <!-- Menu Section -->
  <section id="menu">
    <div class="container">
      <h2>Our Menu</h2>
      <p class="lead">Explore our handpicked selection of coffee and snacks.</p>
      <div class="row g-4 justify-content-center">
        <div class="col-md-4">
          <div class="menu-item text-center">
            <img src="https://images.unsplash.com/photo-1511920170033-f8396924c348?auto=format&fit=crop&w=400&q=80" alt="Espresso" class="img-fluid rounded mb-3" style="height: 200px; object-fit: cover; width: 100%;" />
            <h3>Espresso</h3>
            <p>Rich and bold espresso shot with a velvety crema.</p>
            <div class="price">RM 8.50</div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="menu-item text-center">
            <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=400&q=80" alt="Cappuccino" class="img-fluid rounded mb-3" style="height: 200px; object-fit: cover; width: 100%;" />
            <h3>Cappuccino</h3>
            <p>Perfect balance of espresso, steamed milk, and foam.</p>
            <div class="price">RM 9.50</div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="menu-item text-center">
            <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=400&q=80" alt="Blueberry Muffin" class="img-fluid rounded mb-3" style="height: 200px; object-fit: cover; width: 100%;" />
            <h3>Blueberry Muffin</h3>
            <p>Freshly baked, moist muffin bursting with blueberries.</p>
            <div class="price">RM 12.00</div>
          </div>
        </div>
      </div>
      <div class="text-center mt-4">
        <a href="<?php echo e(route('menus')); ?>" class="btn btn-outline-primary btn-lg">View All</a>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="bg-light py-5">
    <div class="container">
      <h2>Contact Us</h2>
      <p class="lead mb-4">Have questions? Reach out and we'll get back to you soon.</p>
      <form class="mx-auto" style="max-width: 500px;">
        <div class="mb-3">
          <input type="text" class="form-control" placeholder="Your Name" required />
        </div>
        <div class="mb-3">
          <input type="email" class="form-control" placeholder="Your Email" required />
        </div>
        <div class="mb-3">
          <textarea class="form-control" rows="5" placeholder="Your Message" required></textarea>
        </div>
        <button type="submit" class="btn btn-warning w-100 fw-bold">Send Message</button>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      &copy; 2025 Beanie Coffee Shop. All Rights Reserved.
    </div>
  </footer>

  <!-- Bootstrap JS -->
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
<?php /**PATH C:\xampp\htdocs\beanie2\resources\views/welcome.blade.php ENDPATH**/ ?>