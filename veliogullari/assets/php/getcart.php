<?php
session_start();
try {
    $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
}
catch (PDOException $e) {
    print $e->getMessage();
}
$array = $_SESSION['cart'];
$total = 0;
if (!count($array)){
    print "Sepetiniz boş";
}
foreach (array_keys($array) as $key){
    $query = $db->query("SELECT * FROM products WHERE id= '{$key}'")->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="single-cart-item">
        <div class="cart-img">
            <a href="cart.php"><img src="<?php print $query['image'];?>" alt=""></a>
        </div>
        <div class="cart-text">
            <h5 class="title"><a href="cart.php"><?php print $query['name'];?></a></h5>
            <div class="cart-text-btn">
                <div class="cart-qty">
                    <span><?php print $array[$key];?>x</span>
                    <span class="cart-price"><?php print $query['price'];?>₺</span>
                </div>
            </div>
        </div>
    </div>
<?php
    $total+=$query['price']*$array[$key];
}
?>
<div class="cart-price-total d-flex justify-content-between">
        <h5 id="cartitems" hidden><?php print count($array);?></h5>
        <h5>Toplam :</h5>
        <h5><?php print $total;?>₺</h5>
    </div>
<div class="cart-links d-flex justify-content-center">
    <a class="obrien-button white-btn" href="cart">Sepet</a>
    <a class="obrien-button white-btn" href="checkout.php">Ödeme</a>
</div>