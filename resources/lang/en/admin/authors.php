<?php

    return [
        'index' => [
            'title' => 'Authors',
            'table' => [
                'columns' => [
                    'id' => 'ID',
                    'full_name' => 'Name',
                    'biography' => 'Biography',
                    'actions' => 'Actions',
                    'created_at' => 'Created At',
                    'updated_at' => 'Updated At',
                    'deleted_at' => 'Deleted At',
                ],
                'buttons' => [
                    'create' => 'Add author',
                    'edit' => 'Edit',
                    'delete' => 'Delete',
                ],
                'messages' => [
                    'info_dbl_click' => 'Double click on a row to view the author.',
                ],
            ],
        ],

        'create' => [
            'title' => 'Add Author',
            'form' => [
                'labels' => [
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                    'biography' => 'Biography',
                    'submit' => 'Add Author',
                ],
            ],
        ],

        'show' => [
            'title' => 'Author :name',
            'list' => [
                'full_name' => 'Name:',
                'biography' => 'Biography:',
            ],
        ],

        'edit' => [
            'title' => 'Edit Author :name',
            'form' => [
                'labels' => [
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                    'biography' => 'Biography',
                    'submit' => 'Add Author',
                ],
            ],
        ],

        'exceptions' => [
            'validation_failed' => 'Validation failed. Please ensure all required fields are filled correctly and adhere to the specified formats.',
        ],
    ];
