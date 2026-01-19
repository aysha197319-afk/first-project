<?php
session_start();
if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

if(isset($_POST['add'])){
    $_SESSION['cart'][] = [
        'name'=>$_POST['name'],
        'price'=>$_POST['price']
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Aysha Shop 🛒</title>
<link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='0.9em' font-size='90'>🛍️</text></svg>">
<style>
body{margin:0;font-family:Arial;background:#f4f6f8}
header{background:#222;color:white;padding:15px}
nav a{color:white;margin:0 12px;text-decoration:none;font-weight:bold}
nav a:hover{color:#ff9800}
.container{padding:20px}
.grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:20px}
.card{background:white;padding:15px;border-radius:10px;box-shadow:0 4px 8px rgba(0,0,0,.1)}
button{background:#ff9800;color:white;border:none;padding:10px 15px;border-radius:6px;cursor:pointer}
table{width:100%;border-collapse:collapse}
th,td{border:1px solid #ccc;padding:8px;text-align:center}
th{background:#eee}
footer{background:#222;color:white;text-align:center;padding:10px}
</style>
</head>

<body>

<header>
<h1>Aysha Online Shop 🛒</h1>
<nav>
<a href="#home">Home</a>
<a href="#products">Products</a>
<a href="#cart">Cart</a>
<a href="#contact">Contact</a>
</nav>
</header>

<section id="home" class="container">
<h2>Welcome 😊</h2>
<p><b>Best products</b> &amp; fast delivery 🚚</p>
<svg width="200" height="100">
<rect width="200" height="100" fill="#ff9800"/>
<text x="40" y="60" fill="white" font-size="24">Big Sale</text>
</svg>
</section>

<section id="products" class="container">
<h2>Products</h2>
<div class="grid">

<div class="card">
<img src="https://via.placeholder.com/200">
<h3>T-Shirt 👕</h3>
<p>৳500</p>
<form method="post">
<input type="hidden" name="name" value="T-Shirt">
<input type="hidden" name="price" value="500">
<button name="add">Add to Cart</button>
</form>
</div>

<div class="card">
<img src="https://via.placeholder.com/200">
<h3>Shoes 👟</h3>
<p>৳1200</p>
<form method="post">
<input type="hidden" name="name" value="Shoes">
<input type="hidden" name="price" value="1200">
<button name="add">Add to Cart</button>
</form>
</div>

</div>
</section>

<section id="cart" class="container">
<h2>Your Cart 🛒</h2>
<table>
<tr><th>Product</th><th>Price</th></tr>
<?php $total=0; foreach($_SESSION['cart'] as $item){ ?>
<tr>
<td><?= $item['name'] ?></td>
<td><?= $item['price'] ?></td>
</tr>
<?php $total += $item['price']; } ?>
<tr>
<th>Total</th>
<th>৳<?= $total ?></th>
</tr>
</table>

<canvas id="c" width="300" height="60" style="border:1px solid #ccc"></canvas>
</section>

<section id="contact" class="container">
<h2>Contact 📞</h2>
<ul>
<li>Email: support@aysha.com</li>
<li>Phone: +880123456789</li>
</ul>

<form onsubmit="alert('Message sent 😊');return false;">
<input type="text" required placeholder="Name"><br><br>
<input type="email" required placeholder="Email"><br><br>
<input type="number" placeholder="Phone"><br><br>
<textarea placeholder="Message"></textarea><br><br>
<button>Send</button>
</form>

<iframe src="https://maps.google.com/maps?q=dhaka&output=embed" width="100%" height="200"></iframe>
</section>

<footer>
&copy; 2026 Aysha Shop ❤️
</footer>

<script>
let c=document.getElementById("c").getContext("2d");
c.fillStyle="#ff9800";
c.fillRect(0,0,<?= $total ?>/10,40);
c.fillStyle="black";
c.fillText("Total ৳<?= $total ?>",10,55);
</script>

</body>
</html>
