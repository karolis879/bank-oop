<?php

namespace Bank;

use App\DB\DataBase;
// use Ramsey\Uuid\Uuid;

class FileWriter implements DataBase
{
    private $data, $filename;

    public function __construct($filename)
    {
        $this->filename = $filename; // Assign the filename parameter to the property
        if (!file_exists(__DIR__ . '/../data/' . $filename . '.json')) {
            $this->data = [];
        } else {
            $this->data = json_decode(file_get_contents(__DIR__ . '/../data/' . $filename . '.json'), 1);
        }
    }

    public function __destruct()
    {
        $this->data = array_values($this->data);
        file_put_contents(__DIR__ . '/../data/' . $this->filename . '.json', json_encode($this->data));
    }


    public function create(array $userData): void
    {
        // $id = Uuid::uuid4()->toString();
        $id = rand(10000,99999);
        $userData['id'] = $id;
        $this->data[] = $userData;
    }


    public function update(int $userId, array $userData): void
    {
        foreach ($this->data as $key => $value) {
            if ($value['id'] == $userId) {
                $userData['id'] = $userId;
                $this->data[$key] = $userData;
            }
        }
    }


    public function delete(int $userId): void
    {
        foreach ($this->data as $key => $value) {
            if ($value['id'] == $userId) {
                unset($this->data[$key]);
            }
        }
    }


    public function show(int $userId): array
    {
        foreach ($this->data as $key => $value) {
            if ($value['id'] == $userId) {
                return $this->data[$key];
            }
        }
    }

    public function showAll(): array
    {
        return $this->data;
    }
}
