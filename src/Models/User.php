<?php


namespace App\Models;

class User
{


    public function findAll()
    {
        // nah disini kamu query ke db yaaaa ! 
        $data = [
            [
                'name' => 'zam',
                'age' => 21
            ],
            [
                'name' => 'fira',
                'age' => 21
            ]
        ];
        return $data;
    }


}
