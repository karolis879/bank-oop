<?php

namespace Bank\Controllers;

use Bank\App;
use Bank\FileWriter;
use Bank\Messages;
use Bank\OldData;

class saskaitosController
{
    public function index()
    {
        $data = App::get('Saskaitos');
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
        $data = App::get('Saskaitos');
        $saskaitos = $data->show($id);

        return App::view('saskaitos/edit', [
            'pageTitle' => 'Edit saskaitos',
            'saskaitos' => $saskaitos,
        ]);
    }

    public function update(int $id, array $request)
    {
        $data = App::get('Saskaitos');
        $account = $data->show($id);
        $funds = $request['funds'];

        if ($funds < 0) {
            // Display an error message or handle the invalid input appropriately
            Messages::addMessage('danger', 'Invalid funds amount');
            header('Location: /saskaitos/edit/' . $id);
            return;
        }

        if (isset($request['addFunds'])) {
            $account['balance'] += $funds;
            $data->update($id, $account);
        } elseif (isset($request['removeFunds'])) {
            if (($account['balance'] - $funds) < 0) {
                Messages::addMessage('danger', 'Invalid funds amount');
                header('Location: /saskaitos/edit/' . $id);
                return;
            } else {
                $account['balance'] -= $funds;
                $data->update($id, $account);
            }
        }

        Messages::addMessage('success', 'saskaitos updated');
        header('Location: /saskaitos');
    }



    public function delete(int $id)
    {
        $data = App::get('Saskaitos');
        $account = $data->show($id);
        if ($account['balance'] > 0) {
            Messages::addMessage('danger', 'negalima');
            header('Location: /saskaitos');
            return;
        }
        $saskaitos = (App::get('Saskaitos'))->show($id);
        return App::view('saskaitos/delete', [
            'pageTitle' => 'Confirm saskaitos delete',
            'saskaitos' => $saskaitos,
        ]);
    }

    public function destroy(int $id)
    {
        $data = App::get('Saskaitos');
        $data->delete($id);
        Messages::addMessage('success', 'saskaitos deleted');

        header('Location: /saskaitos');
    }


    public function store(array $request)
    {
        extract($request);

        $error1 = 0;
        $error2 = 0;
        $error3 = 0;

        if (strlen($name) < 3 || strlen($lastName) < 3) {
            Messages::addMessage('warning', 'Vardą ir pavardę turi sudaryti bent trys simboliai.');
            $error1 = 1;
        }

        if (!ctype_digit($PersonId) || strlen(trim($PersonId)) !== 11) {
            Messages::addMessage('warning', 'Asmens kodą turi sudaryti vienuolika skaičių.');
            $error2 = 1;
        }

        $data = App::get('Saskaitos');
        $accounts = $data->showall();
        if (!preg_match('/^(3[0-9]{2}|4[0-9]{2}|6[0-9]{2}|5[0-9]{2})(0[1-9]|1[0-2])(0[1-9]|[12][0-9]|3[01])\d{4}$/', $PersonId)) {
            Messages::addMessage('danger', 'Personal code is incorrect');
            $error3 = 1;
        } else {
            foreach ($accounts as $account) {
                if ($account['personal_id'] === $PersonId) {
                    Messages::addMessage('warning', 'Vartotojas su tokiu asmens kodu jau įvestas.');
                    OldData::flashData($request);
                    header("Location: /saskaitos/create");
                    return;
                }
            }
        }



        if ($error1 || $error2 || $error3) {
            OldData::flashData($request);
            header("Location: /saskaitos/create");
            die;
        }

        $newAccount = [
            'id' => $id,
            'first_name' => $name,
            'last_name' => $lastName,
            'personal_id' => $PersonId,
            'iban' => FileWriter::generateIban(),
            'balance' => 0
        ];
        $data->create($newAccount);

        Messages::addMessage('success', 'Nauja sąskaita sėkmingai pridėta.');
        header('Location: /saskaitos');
    }




    public function show(int $id)
    {
        echo "<pre>";
        echo '<h2>Id: ' . $id . '</h>';
    }
}
