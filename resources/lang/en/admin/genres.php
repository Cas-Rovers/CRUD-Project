<?php

    return [
        'index' => [
            'title' => 'Genres',
            'table' => [
                'columns' => [
                    'id' => 'ID',
                    'name' => 'Name',
                    'description' => 'description',
                    'actions' => 'Actions',
                    'created_at' => 'Created At',
                    'updated_at' => 'Updated At',
                    'deleted_at' => 'Deleted At',
                ],
                'buttons' => [
                    'create' => 'Add genre',
                    'edit' => 'Edit',
                    'delete' => 'Delete',
                ],
                'messages' => [
                    'info_dbl_click' => 'Double click on a row to view the genre.',
                ],
            ],
        ],

        'create' => [
            'title' => 'Add genre',
            'form' => [
                'labels' => [
                    'name' => 'Name',
                    'description' => 'Description',
                    'submit' => 'Add genre',
                ],
            ],
        ],

        'show' => [
            'title' => 'Genre :name',
            'list' => [
                'name' => 'Name:',
                'description' => 'Description:',
            ],
        ],

        'edit' => [
            'title' => 'Edit genre :name',
            'form' => [
                'labels' => [
                    'name' => 'Name',
                    'description' => 'Description',
                    'submit' => 'Update Book',
                ],
            ],
        ],

        'exceptions' => [
            'validation_failed' => 'Validation failed. Please ensure all required fields are filled correctly and adhere to the specified formats.',
        ],
    ];
