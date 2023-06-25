<?php

namespace Bank\Controllers;

use Bank\App;
use Bank\FileWriter;

class RacoonController
{
    public function index()
    {
        $data = new FileWriter('racoon');
        return App::view('racoon/index', [
            'pageTitle' => 'Racoons list',
            'racoons' => $data->showall(),
        ]);
    }

    public function create()
    {
        return App::view('racoon/create', [
            'pageTitle' => 'Create racoon',
        ]);
    }

    public function edit(int $id)
    {
        $data = new FileWriter('racoon');
        $racoon = $data->show($id);

        return App::view('racoon/edit', [
            'pageTitle' => 'Edit racoon',
            'racoon' => $racoon,
        ]);
    }

    public function update(int $id, array $request)
    {
        $data = new FileWriter('racoon');
        $data->update($id, $request);
        header('Location: /racoon');
    }

    public function delete(int $id)
    {
        $racoon = (new FileWriter('racoon'))->show($id);
        return App::view('racoon/delete', [
            'pageTitle' => 'Confirm racoon delete',
            'racoon' => $racoon,
        ]);
    }

    public function destroy(int $id)
    {
        $data = new FileWriter('racoon');
        $data->delete($id);

        header('Location: /racoon');
    }

    public function store(array $request)
    {
        $data = new FileWriter('racoon');
        $data->create($request);

        header('Location: /racoon');
    }

    public function show(int $id)
    {
        echo "<pre>";
        echo '<h2>Id: ' . $id . '</h>';
    }
}
