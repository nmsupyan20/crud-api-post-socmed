<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
    use ResponseTrait;
    public function generateAPIDocumentation()
    {
        require_once('../vendor/autoload.php');

        $openapi = \OpenApi\Generator::scan(['../app/Controllers/PostController.php']);

        header('Content-Type: application/json');
        return $this->respond(json_decode($openapi->toJSON(), true));
    }

    public function index(): string
    {
        return view('api_docs');
    }
}
