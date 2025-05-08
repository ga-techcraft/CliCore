<?php

namespace Database\Seeds;

use Database\AbstractSeeder;

class UserSeeder extends AbstractSeeder{
    protected ?string $tableName = 'users';

    protected array $tableData = [
        [
            'data_type' => 'string',
            'column_name' => 'name',
        ],
        [
            'data_type' => 'string',
            'column_name' => 'email',
        ],
        [
            'data_type' => 'string',
            'column_name' => 'password',
        ],
    ];

    public function createRowData(): array{
        return [
            [
             'test_name',
             'test_email',
             'test_password',
            ],
            [
             'test_name2',
             'test_email2',
             'test_password2',
            ]

        ];
    }
}