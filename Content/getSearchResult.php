<?php

//require_once 'C:\Users\derek\vendor\autoload.php';
  require_once 'C:\Users\derek\Desktop\COMP2910\unirest-php-master\src\Unirest.php';


    $methodType = $_SERVER['REQUEST_METHOD'];
    $data = array("status" => "fail", "msg" => "On $methodType");

    if ($methodType === 'GET') {
        if(isset($_GET['output'])) {
            $output = $_GET['output'];
            
            $response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/search?query=" . $output . "&offset=0&number=10",
            array(
                "X-Mashape-Key" => "1V586RLMZ1msh8SCwS8papohih2Op12YfdDjsn3eTMCdHsNSgz",
                "X-Mashape-Host" => "spoonacular-recipe-food-nutrition-v1.p.mashape.com"
            )
            );

            $data = array("status" => "fail", "msg" => "On $methodType", "root" => $response);
         
            $data['status'] = 'success';
            $data['msg'] = 'Retrieving data as JSON';
				    $json = json_encode($data);
						echo $json;
        }
    }
?>