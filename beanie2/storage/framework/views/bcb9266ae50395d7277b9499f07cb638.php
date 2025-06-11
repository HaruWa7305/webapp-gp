<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Beanie Coffee Shop - Ordering System</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    /* your existing CSS (omitted for brevity) */
    body {
      font-family: 'Amatic SC', cursive;
      background: #fff8f0;
      color: #3e2f23;
    }

    /* Header/Navbar */
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

    /* Main layout */
    .main-container {
      flex-grow: 1;
      padding: 1rem;
    }

    .menu-list {
      max-height: 80vh;
      overflow-y: auto;
      border-right: 2px solid #cba983;
      padding-right: 1rem;
    }

    .menu-item {
      display: flex;
      align-items: center;
      margin-bottom: 1rem;
      background: white;
      border-radius: 12px;
      padding: 10px;
      box-shadow: 0 0 10px rgb(0 0 0 / 0.1);
      gap: 15px;
    }

    .menu-item img {
      width: 80px;
      height: 80px;
      object-fit: cover;
      border-radius: 8px;
      flex-shrink: 0;
    }

    .menu-info {
      flex-grow: 1;
    }

    .menu-info h5 {
      margin: 0 0 5px;
      font-weight: 700;
      font-size: 1.2rem;
    }

    .menu-info p {
      margin: 0 0 5px;
      font-size: 0.9rem;
      color: #7d6f63;
    }

    .menu-price {
      font-weight: 700;
      color: #cba983;
      font-size: 1.1rem;
      margin-bottom: 5px;
    }

    .menu-actions {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .menu-actions input[type="number"] {
      width: 60px;
      padding: 4px;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 1rem;
      text-align: center;
    }

    .menu-actions button {
      background-color: #cba983;
      border: none;
      color: white;
      padding: 6px 12px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 700;
      transition: background-color 0.3s ease;
    }

    .menu-actions button:hover {
      background-color: #b48b63;
    }

    /* Cart styling */
    .cart {
      background: white;
      border-radius: 12px;
      padding: 10px 15px;
      box-shadow: 0 0 10px rgb(0 0 0 / 0.1);
      max-height: 80vh;
      overflow-y: auto;
    }

    .cart-header {
      font-weight: 700;
      font-size: 1.5rem;
      margin-bottom: 10px;
      color: #3e2f23;
    }

    .cart-items {
      list-style: none;
      padding: 0;
      margin: 0 0 15px 0;
      max-height: 60vh;
      overflow-y: auto;
    }

    .cart-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid #ddd;
      padding: 6px 0;
      font-weight: 500;
    }

    .cart-item-name {
      flex: 1;
    }

    .cart-item-qty {
      margin: 0 15px;
      color: #7d6f63;
    }

    .cart-item-price {
      color: #cba983;
      font-weight: 700;
      min-width: 70px;
      text-align: right;
    }

    .cart-item-remove {
      cursor: pointer;
      color: #c74b3e;
      font-weight: 900;
      font-size: 1.2rem;
      margin-left: 10px;
      user-select: none;
    }

    .cart-total {
      font-weight: 700;
      font-size: 1.2rem;
      border-top: 2px solid #cba983;
      padding-top: 10px;
      text-align: right;
      color: #3e2f23;
    }

    /* Responsive */
    @media (max-width: 767px) {
      .main-container {
        flex-direction: column;
      }

      .menu-list {
        border-right: none;
        border-bottom: 2px solid #cba983;
        max-height: none;
        padding-right: 0;
        margin-bottom: 20px;
      }
      .payment-method {
  margin-top: 1rem;
}

.payment-method label {
  font-weight: 700;
  margin-bottom: 0.5rem;
  display: block;
}

.payment-method select {
  width: 100%;
  padding: 6px 10px;
  border-radius: 6px;
  border: 1px solid #ccc;
  font-size: 1rem;
}

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
          <li><a href="welcome" class="active">Home</a></li>
          <li><a href="welcome#about">About</a></li>
          <li><a href="<?php echo e(route('menus')); ?>">Menu</a></li>
          <li><a href="welcome#contact">Contact</a></li>
          <li><a href="<?php echo e(route('menus')); ?>">Order Now</a></li>
          <li class="d-xl-none">
            <a href="<?php echo e(route('profile')); ?>" class="btn-getstarted" style="display: block; margin: 0.5rem 1rem; border-radius: 30px; text-align: center;">
              Profile
            </a>
          </li>
        </ul>
      </nav>

      <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
      <a href="<?php echo e(route('profile')); ?>" class="btn-getstarted d-none d-xl-inline-block">Profile</a>
    </div>
  </header>

  <main class="main-container container d-flex gap-4">
    <div class="menu-list col-lg-7 col-md-7 col-sm-12">
      <?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="menu-item">
        <img src="<?php echo e($item->img); ?>" alt="<?php echo e($item->name); ?>" />
        <div class="menu-info">
            <h5><?php echo e($item->name); ?></h5>
            <p><?php echo e($item->desc); ?></p>
            <div class="menu-price">RM<?php echo e(number_format($item->price, 2)); ?></div>
        </div>
        <div class="menu-quantity">
            Stock: <?php echo e($item->quantity); ?> <!-- Use the object property instead of array key -->
        </div>
        <div class="menu-actions">
            <input type="number" min="1" value="1" id="qty-<?php echo e($item->id); ?>" />
            <button data-id="<?php echo e($item->id); ?>">Add</button>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="cart col-lg-5 col-md-5 col-sm-12">
      <div class="cart-header">Your Cart</div>
      <ul class="cart-items" id="cart-items">
        <li>Your cart is empty</li>
      </ul>
      <div class="cart-total" id="cart-total">Total: RM 0.00</div>

      <!-- Order form -->
      <form id="orderForm" method="POST" action="<?php echo e(route('order.store')); ?>">
        <?php echo csrf_field(); ?>
        <input type="text" name="name" placeholder="Your Name" required />
        <input type="email" name="email" placeholder="Your Email" required />
        <input type="hidden" name="cart" id="cartInput" value="" />

        <div class="payment-method mt-3">
          <label for="paymentMethod" class="form-label fw-bold">Payment Method</label>
          <select name="payment_method" id="paymentMethod" class="form-select" required>
            <option value="" disabled selected>Select Payment Method</option>
            <optgroup label="Online Banking">
              <option value="maybank">Maybank</option>
              <option value="cimb">CIMB Bank</option>
              <option value="public_bank">Public Bank</option>
              <option value="rhb">RHB Bank</option>
              <option value="hong_leong">Hong Leong Bank</option>
            </optgroup>
            <option value="cod">Cash On Delivery</option>
          </select>
        </div>

        <button type="submit" id="buyNowBtn">Buy Now</button>
      </form>
    </div>
  </main>
  <footer>
    &copy; <?php echo e(date('Y')); ?> Beanie Coffee Shop. All rights reserved.
  </footer>

  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  const menuItems = <?php echo json_encode($menuItems, 15, 512) ?>;
  const cart = {};

  function formatRM(amount) {
    return 'RM ' + amount.toFixed(2);
  }

  function renderCart() {
    const cartItemsEl = document.getElementById('cart-items');
    cartItemsEl.innerHTML = '';
    let total = 0;
    const ids = Object.keys(cart);

    if (ids.length === 0) {
      cartItemsEl.innerHTML = '<li>Your cart is empty</li>';
      document.getElementById('cart-total').textContent = 'Total: RM 0.00';
      document.getElementById('buyNowBtn').disabled = true;
      return;
    }

    document.getElementById('buyNowBtn').disabled = false;

    ids.forEach(id => {
      const item = menuItems.find(i => i.id == id);
      if (!item) return;

      const qty = cart[id];
      const price = item.price * qty;
      total += price;

      const li = document.createElement('li');
      li.classList.add('cart-item');
      li.innerHTML = `
        <span class="cart-item-name">${item.name}</span>
        <span class="cart-item-qty">x${qty}</span>
        <span class="cart-item-price">${formatRM(price)}</span>
        <span class="cart-item-remove" data-id="${id}" title="Remove item">&times;</span>
      `;
      cartItemsEl.appendChild(li);
    });

    document.getElementById('cart-total').textContent = 'Total: ' + formatRM(total);

    document.querySelectorAll('.cart-item-remove').forEach(el => {
      el.addEventListener('click', () => {
        const id = el.getAttribute('data-id');
        delete cart[id];
        renderCart();
      });
    });
  }

  // Handle Add to Cart
  document.querySelectorAll('.menu-actions button').forEach(button => {
    button.addEventListener('click', () => {
      const id = button.getAttribute('data-id');
      const qtyInput = document.getElementById('qty-' + id);
      let qty = parseInt(qtyInput.value);

      if (isNaN(qty) || qty <= 0) {
        qty = 1;
      }

      if (cart[id]) {
        cart[id] += qty;
      } else {
        cart[id] = qty;
      }

      renderCart();
    });
  });

  // Handle form submission: serialize cart to JSON
  document.getElementById('orderForm').addEventListener('submit', function (e) {
    const cartInput = document.getElementById('cartInput');
    cartInput.value = JSON.stringify(cart);
  });
</script>
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
<?php /**PATH C:\xampp\htdocs\beanie2\resources\views/menus.blade.php ENDPATH**/ ?>