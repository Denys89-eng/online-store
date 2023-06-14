<?php


use Phinx\Seed\AbstractSeed;

class AdminSeeder extends AbstractSeed
{


    public function run(): void
    {

        $passwordHash = password_hash('admin', PASSWORD_DEFAULT);

        $dataArray = [
            [
                'login' => 'admin',
                'password' => $passwordHash,
                'email' => 'quwery@gmail.com',
            ]
        ];

        $data = $this->table('Admin');
        $data->insert($dataArray)
            ->saveData();
    }
}
