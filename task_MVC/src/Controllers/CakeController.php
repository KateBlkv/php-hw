<?php


namespace Climbers\Controllers;


use Climbers\Db\CakesDb;
use Climbers\Yummy\Controller;

class CakeController extends Controller
{
    private $cakeDB;

    public function __construct(){
        $this->cakeDB = new CakesDb();
    }

    public function addNewCake(){
        $post = $_POST;
        $name = $post['name'];
        $price = $post['price'];
        $filling = $post['filling'];
        $weight = $post['weight'];
        $pic = $this->cakeDB->checkImg();
        if ($pic){
            if(!$this->cakeDB->addNewCakeWithFile($name, $filling, $price, $weight, $pic)) {
                echo 'Попробуйте позже';
                return;
            }
        }elseif (!$this->cakeDB->addNewCake($name, $filling,$price, $weight, 'sadcake.jpg')) {
            echo 'Попробуйте позже';
            return;
        }
        $message = $post['name'] . ', Вы успешно зарегистрированы, переходите к записи';
        header('Location: /?message=' . $message);
    }

    public function showRegistrationForm(){
        $data = ['variable' => 'Данные переданы из контроллера'];
        echo $this->getTemplate('registration.php', $data);
    }

    public function selectedCakes(){
        $filtred = $this->cakeDB->filteredCakes();
        //var_dump($filtred);
        $selectedCakes = [
            'selectedCakes' => $filtred
        ];
        echo $this->getTemplate('cakeList.php', $selectedCakes);
    }

    public function deleteCakes(){
        $cakesD = $this->cakeDB->deletedCakes();
        $cakes = $this->cakeDB->getCakeTitles();
        $data = [
            'cakes' => $cakes
        ];
        echo $this->getTemplate('main.php', $data);
    }

}