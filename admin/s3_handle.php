<?php
if(isset($_GET['action'])){
    $action = $_GET['action'];

    switch ($action) {
        case "get_images":
          get_images();
          break;
        case "blue":
          echo "Your favorite color is blue!";
          break;
        case "green":
          echo "Your favorite color is green!";
          break;
        default:
          echo "Your favorite color is neither red, blue, nor green!";
      }
}

function get_images(){
    $images = file_get_contents("https://0u5hre4gwf.execute-api.ap-south-1.amazonaws.com/prod/api/uploads");
    $images = json_decode($images, true);
    $array = [];
    foreach($images['body']['data'] as $key => $value){
        $array[] = $value;
    }
    print_r(json_encode($array));
}