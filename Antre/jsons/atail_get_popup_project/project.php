<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=antredesignstudio;charset=utf8", "Mehti", "asd12345");
} catch ( PDOException $e ){
    print $e->getMessage();
}
$id = $_GET['a'];
$query = $db->query("SELECT * FROM portfolio WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){
    $slides = explode(",",$query['slides']);
    $res="";
    $cc = 0;
    foreach ($slides as $slide){
        if ($cc!=0)$res.=",";
        $res.='
			{
      "src": {
        "img": "'.$slide.'",
        "title": "",
        "text": "",
        "fit": "contain"
      },
      "fit": "contain",
      "type": "image"
    }
			';
        $cc++;
    }
    print '{
  "status": "success",
  "title": "'.$query['title'].'",
  "content": "'.$query['content'].'",
  "date_finish": null,
  "date_start": null,
  "thumbnail": "",
  "thumbnail_url": "'.$query['image'].'",
  "slides": ['.$res.'
  ],
  "token": "",
  "participants": ""
}';
}
