<?php

namespace Bank\Controllers;

use Bank\App;
use Bank\FileWriter;
use Bank\Messages;

class saskaitosController
{
    public function index()
    {
        $data = new FileWriter('saskaitos');
        return App::view('saskaitos/index', [
            'pageTitle' => 'saskaitoss list',
            'saskaitoss' => $data->showall(),
        ]);
    }

    public function create()
    {
        return App::view('saskaitos/create', [
            'pageTitle' => 'Create saskaitos',
        ]);
    }

    public function edit(int $id)
    {
        $data = new FileWriter('saskaitos');
        $saskaitos = $data->show($id);

        return App::view('saskaitos/edit', [
            'pageTitle' => 'Edit saskaitos',
            'saskaitos' => $saskaitos,
        ]);
    }

    public function update(int $id, array $request)
    {
        $data = new FileWriter('saskaitos');
        $data->update($id, $request);
        Messages::addMessage('success', 'saskaitos updated');

        header('Location: /saskaitos');
    }

    public function delete(int $id)
    {
        $saskaitos = (new FileWriter('saskaitos'))->show($id);
        return App::view('saskaitos/delete', [
            'pageTitle' => 'Confirm saskaitos delete',
            'saskaitos' => $saskaitos,
        ]);
    }

    public function destroy(int $id)
    {
        $data = new FileWriter('saskaitos');
        $data->delete($id);
        Messages::addMessage('success', 'saskaitos deleted');

        header('Location: /saskaitos');
    }

    public function store(array $request)
    {
        $data = new FileWriter('saskaitos');
        $data->create($request);
        Messages::addMessage('success', 'Sąskaita sukurta!');

        header('Location: /saskaitos');
    }

    public function show(int $id)
    {
        echo "<pre>";
        echo '<h2>Id: ' . $id . '</h>';
    }
}
