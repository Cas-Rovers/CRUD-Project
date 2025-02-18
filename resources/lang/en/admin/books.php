<?php

    return [
        'index' => [
            'title' => 'Books',
            'table' => [
                'columns' => [
                    'id' => 'ID',
                    'title' => 'Title',
                    'description' => 'Description',
                    'genres' => 'Genre(s)',
                    'authors' => 'Author(s)',
                    'price' => 'Price',
                    'actions' => 'Actions',
                    'created_at' => 'Created At',
                    'updated_at' => 'Updated At',
                    'deleted_at' => 'Deleted At',
                ],
                'buttons' => [
                    'create' => 'Create Book',
                    'edit' => 'Edit',
                    'delete' => 'Delete',
                ],
                'messages' => [
                    'info_dbl_click' => 'Double click on a row to view the book.',
                ],
            ],
        ],

        'create' => [
            'title' => 'Create Book',
            'form' => [
                'labels' => [
                    'title' => 'Title',
                    'description' => 'Description',
                    'price' => 'Price',
                    'stock' => 'Stock',
                    'published_at' => 'Published At',
                    'genres' => 'Genre(s)',
                    'authors' => 'Author(s)',
                    'submit' => 'Create Book',
                ],
                'placeholders' => [
                    'genres' => 'Select a genre',
                    'authors' => 'Select an author',
                ],
            ],
        ],

        'show' => [
            'title' => 'Book :title',
            'list' => [],
        ],

        'edit' => [
            'title' => 'Edit Book :title',
            'form' => [
                'labels' => [
                    'title' => 'Title',
                    'description' => 'Description',
                    'price' => 'Price',
                    'stock' => 'Stock',
                    'published_at' => 'Published At',
                    'genres' => 'Genre(s)',
                    'authors' => 'Author(s)',
                    'submit' => 'Update Book',
                ],
                'placeholders' => [
                    'genres' => 'Select a genre',
                    'authors' => 'Select an author',
                ],
            ],
        ],

        'exceptions' => [
            'validation_failed' => 'Validation failed. Please ensure all required fields are filled correctly and adhere to the specified formats.',
        ],
    ];
