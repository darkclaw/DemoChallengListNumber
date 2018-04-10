<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    $titleMultiple = "Linianos";
    $this->listNumber->setTitleMatchMultiple($titleMultiple);
    $this->listNumber->changeNameOfMultiple(3, "Linio");
    $listNumber =  $this->listNumber->changeNameOfMultiple(5, "IT");

    $divRow = "<div  class=\"row\">";
    $divNumbers = "";
    foreach ($listNumber as $key => $number){
        $divNumbers .= "<div class='col-lg-1 col-sm-1 col-md-1'>".$number->getTitle()."</div>";
    }
    $divRow .= $divNumbers;
    $divRow .= "</div>";

    $args = array('listNumber' => $listNumber, 'listNumberHTML' => $divRow);

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
