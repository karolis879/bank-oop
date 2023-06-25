<?php

namespace Bank;

use Bank\Controllers\RacoonController;
use Bank\Controllers\HomeController;

class App
{

    static public function start()
    {
        $url = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($url);

        return self::router($url);
    }

    static private function router($url)
    {
        // Racoon
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && count($url) == 1 && $url[0] == 'racoon') {
            return (new RacoonController)->index();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && count($url) == 2 && $url[0] == 'racoon' && $url[1] == 'create') {
            return (new RacoonController)->create();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && count($url) == 2 && $url[0] == 'racoon' && $url[1] == 'store') {
            return (new RacoonController)->store($_POST);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && count($url) == 3 && $url[0] == 'racoon' && $url[1] == 'edit') {
            return (new RacoonController)->edit($url[2]);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && count($url) == 3 && $url[0] == 'racoon' && $url[1] == 'update') {
            return (new RacoonController)->update($url[2], $_POST);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && count($url) == 3 && $url[0] == 'racoon' && $url[1] == 'delete') {
            return (new RacoonController)->delete($url[2]);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && count($url) == 3 && $url[0] == 'racoon' && $url[1] == 'destroy') {
            return (new RacoonController)->destroy($url[2]);
        }
        // Racoon END


        else {
            return self::view('404', ['pageTitle' => '404']);
        }
    }

    static public function view($path, $data = null)
    {
        if ($data) {
            extract($data);
        }

        ob_start();

        require __DIR__ . '/../views/top.php';
        require __DIR__ . '/../views/' . $path . '.php';
        require __DIR__ . '/../views/bottom.php';

        return ob_get_clean();
    }
}
