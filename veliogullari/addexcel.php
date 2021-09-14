<?php
error_reporting(1);
include "assets/php/simple_html_dom.php";
include("resize-class.php");
require('get_google_image.php');

    try {
        $db=new PDO("mysql:host=localhost;dbname=veliogullari;charset=utf8","root","");
    }
    catch (PDOException $e) {
        print $e->getMessage();
    }
    while (true) {
        $query = $db->query("SELECT * FROM products WHERE image = 'empty'")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            $name = $query['name'];
            $productid = $query['id'];
            $search_query = $query['name'];
            $search_query = urlencode($search_query);
            $html = file_get_html("https://www.google.com/search?q=$search_query&tbm=isch");
            $images = $html->find('img');
            $image = $images[1]->src;
            file_put_contents("temporary.png", file_get_contents($image));
            $ext = getExtension(mime_content_type('temporary.png'));
            file_put_contents('temporary.' . $ext, file_get_contents('temporary.png'));
            $resizeObj = new resize('temporary.' . $ext);
            $resizeObj->resizeImage(600, 600, 0);
            $resizeObj->saveImage('data/products/' . $query['category_id'] . $query['brand_id'] . $query['id'] . '.' . $ext, 100);
            $img = 'data/products/' . $query['category_id'] . $query['brand_id'] . $query['id'] . '.' . $ext;
        }
        $query = $db->prepare("UPDATE products SET
    image = :image
    WHERE id = :id");
        $update = $query->execute(array(
            "image" => $img,
            "id" => $productid
        ));
        if ($update) {
            print $name." adlı ürüne resim eklendi 30 saniye sonra başka ürüne geçilior.";
            ?>
            <script>
                setTimeout(location.reload(), 30000);
            </script>
<?php
        }
    }
function getExtension ($mime_type){

    $extensions = array('image/jpeg' => 'jpeg',
        'image/gif' => 'gif',
        'image/png' => 'png',
        'image/bmp' => 'bmp',
        'image/jpg' => 'jpg'
    );

    // Add as many other Mime Types / File Extensions as you like

    return $extensions[$mime_type];

}
?>
