<?php
namespace Climbers\Controllers;


use Climbers\Db\CakesDb;
use Climbers\Yummy\Controller;

class IndexController extends Controller
{
    private $cakesDB;

    public function __construct(){
        $this->cakesDB = new CakesDb();

    }
    public function index(){
        $cakes = $this->cakesDB->getCakeTitles();
        $data = [
            'cakes' => $cakes
        ];
        echo $this->getTemplate('main.php', $data);

    }
}