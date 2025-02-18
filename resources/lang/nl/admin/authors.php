<?php

    return [
        'index' => [
            'title' => 'Auteurs',
            'table' => [
                'columns' => [
                    'id' => 'ID',
                    'full_name' => 'Naam',
                    'biography' => 'Biografie',
                    'actions' => 'Acties',
                    'created_at' => 'Aangemaakt Op',
                    'updated_at' => 'Bijgewerkt Op',
                    'deleted_at' => 'Verwijderd Op',
                ],
                'buttons' => [
                    'create' => 'Auteur toevoegen',
                    'edit' => 'Bewerken',
                    'delete' => 'Verwijderen',
                ],
                'messages' => [
                    'info_dbl_click' => 'Dubbelklik op een rij om de auteur te bekijken.',
                ],
            ],
        ],

        'create' => [
            'title' => 'Auteur Toevoegen',
            'form' => [
                'labels' => [
                    'first_name' => 'Voornaam',
                    'last_name' => 'Achternaam',
                    'biography' => 'Biografie',
                    'submit' => 'Auteur Toevoegen',
                ],
            ],
        ],

        'show' => [
            'title' => 'Auteur :name',
            'list' => [
            ],
        ],

        'edit' => [
            'title' => 'Edit Auteur :name',
            'form' => [
                'labels' => [
                    'first_name' => 'Voornaam',
                    'last_name' => 'Achternaam',
                    'biography' => 'Biografie',
                    'submit' => 'Auteur Toevoegen',
                ],
            ],
        ],

        'exceptions' => [
            'validation_failed' => 'Validation failed. Please ensure all required fields are filled correctly and adhere to the specified formats.',
        ],
    ];
