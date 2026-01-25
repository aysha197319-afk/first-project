<?php
session_start();
if(!isset($_SESSION['cart'])) $_SESSION['cart']=[];
if(isset($_POST['add'])){
    $_SESSION['cart'][]=[
        'name'=>$_POST['name'],
        'price'=>$_POST['price']
    ];
}
$total=0;
foreach($_SESSION['cart'] as $i){$total+=$i['price'];}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Aysha Shop 🛒</title>
<link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='0.9em' font-size='90'>🛍️</text></svg>">
<style>
body{margin:0;font-family:Arial,Helvetica,sans-serif;background:#77828d;color:#333}
header{background:#222;color:white;padding:90px}
nav a{color:white;margin:0 79px;text-decoration:none;font-weight:bold}
nav a:hover{color:#ff9800}
.container{padding:60px}
h1,h2,h3{color:#222}
.grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:40px}
.card{background:white;border-radius:70px;padding:15px;box-shadow:0 10px 20px rgba(0,0,0,.1)}
button{background:#ff9800;border:none;padding:15px 20px;border-radius:10px;color:rgb(209,37,37);cursor:pointer}
button:hover{background:#e68900}
table{width:100%;border-collapse:collapse}
th,td{border:3px solid #ccc;padding:8px;text-align:center}
th{background:#eee}
footer{background:#222;color:white;text-align:center;padding:20px;margin-top:70px}
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
<h2>Welcome to our Store 😊</h2>
<p><b>Best quality</b> products with <i>cheap price</i> &amp; fast delivery 🚚</p>
<svg width="200" height="100">
<rect width="200" height="100" fill="#ff9800"/>
<text x="30" y="60" fill="white" font-size="34">Big Sale</text>
</svg>
</section>

<section id="products" class="container">
<h2>Products List</h2>
<div class="grid">

<div class="card">
<img src="https://images.unsplash.com/photo-1622445270936-5dcb604970e7?q=80&w=387&auto=format&fit=crop">
<h3>T-Shirt 👕</h3>
<p>Price: ৳500</p>
<form method="post">
<input type="hidden" name="name" value="T-Shirt">
<input type="hidden" name="price" value="500">
<button name="add">Add to Cart</button>
</form>
</div>

<div class="card">
<img src="https://images.unsplash.com/photo-1608667508764-33cf0726b13a?q=80&w=580&auto=format&fit=crop">
<h3>Shoes 👟</h3>
<p>Price: ৳1200</p>
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
<?php foreach($_SESSION['cart'] as $c){ ?>
<tr>
<td><?= $c['name'] ?></td>
<td><?= $c['price'] ?></td>
</tr>
<?php } ?>
<tr>
<th>Total</th>
<th>৳<?= $total ?></th>
</tr>
</table>

<h3>Total Visual</h3>
<canvas id="myCanvas" width="350" height="90" style="border:1px solid #ccc"></canvas>
</section>

<section id="contact" class="container">
<h2>Contact Us 📞</h2>
<ul>
<li>Email: support@aysha.com</li>
<li>Phone: +880123456789</li>
</ul>

<form onsubmit="alert('Message sent successfully 😊');return false;">
<input type="text" placeholder="Your Name" required><br><br>
<input type="email" placeholder="Email" required><br><br>
<input type="number" placeholder="Phone" required><br><br>
<textarea placeholder="Message"></textarea><br><br>
<button type="submit">Send</button>
</form>

<h3>Our Location</h3>
<iframe src="https://maps.google.com/maps?q=dhaka&output=embed" width="150%" height="250"></iframe>
</section>

<footer>
<p>&copy; 2026 Aysha Shop | Made with ❤️</p>
</footer>

<script>
let c=document.getElementById("myCanvas").getContext("2d");
c.fillStyle="#ff9800";
c.fillRect(0,0,<?= $total ?>/10,50);
c.fillStyle="black";
c.fillText("Total: ৳<?= $total ?>",10,70);
</script>

</body>
</html>
