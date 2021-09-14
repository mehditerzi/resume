<?php
error_reporting(0);
try {
    $db = new PDO("mysql:host=localhost;dbname=veliogullari;charset=UTF8", "root", "");
} catch ( PDOException $e ){
    print $e->getMessage();
}
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'products';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array(
        'db'        => 'image',
        'dt'        => 0,
        'formatter' => function( $d, $row ) {
            return "<img height='50px' width='50px' src='/".$d."'>";
        }
    ),
    array( 'db' => 'name',  'dt' => 1 ),
    array( 'db' => 'barcode',   'dt' => 2 ),
    array( 'db' => 'quantity',     'dt' => 3 ),
    array(
        'db'        => 'price',
        'dt'        => 4,
        'formatter' => function( $d, $row ) {
            return '₺'.number_format($d);
        }
    ),
    array('db'=> 'brand_id',
        'dt' => 5,
        'formatter' => function($d,$row){
            try {
                $db = new PDO("mysql:host=localhost;dbname=veliogullari;charset=UTF8", "root", "");
            } catch ( PDOException $e ){
                print $e->getMessage();
            }
            $query = $db->query("SELECT * FROM brands WHERE id = '{$d}'")->fetch(PDO::FETCH_ASSOC);
            if ( $query ){
              return   $query['name'];
            }
            else{
                return "Hata";
            }
        }
    ),
    array('db'=> 'category_id',
        'dt' => 6,
        'formatter' => function($d,$row){
            try {
                $db = new PDO("mysql:host=localhost;dbname=veliogullari;charset=UTF8", "root", "");
            } catch ( PDOException $e ){
                print $e->getMessage();
            }
            $query = $db->query("SELECT * FROM categories WHERE id = '{$d}'")->fetch(PDO::FETCH_ASSOC);
            if ( $query ){
                return   $query['name'];
            }
            else{
                return "Hata";
            }
        }
    ),
    array('db'=> 'id',
        'dt' => 7,
        'formatter' => function($d,$row){
        return '<a class="btn btn-primary" href="editproduct?id='.$d.'">Düzenle</a><button onclick="deleteproduct('.$d.')" class="btn btn-danger" style="margin-left: 10px;">Sil</button>';
        }
        )
);

// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'veliogullari',
    'host' => 'localhost'
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.php' );
$result = SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns );
if (json_encode($result,JSON_UNESCAPED_UNICODE)){
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
}
else{
    print_r(json_last_error_msg());
}