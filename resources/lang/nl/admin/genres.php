<?php

    return [
        'index' => [
            'title' => 'Genres',
            'table' => [
                'columns' => [
                    'id' => 'ID',
                    'name' => 'Naam',
                    'description' => 'Omschrijving',
                    'actions' => 'Acties',
                    'created_at' => 'Aangemaakt op',
                    'updated_at' => 'Laatst gewijzigd op',
                    'deleted_at' => 'Verwijderd op',
                ],
                'buttons' => [
                    'create' => 'Genre toevoegen',
                    'edit' => 'Wijzigen',
                    'delete' => 'Verwijderen',
                ],
                'messages' => [
                    'info_dbl_click' => 'Dubbelklik op een rij om de genre te bekijken.',
                ],
            ],
        ],

        'create' => [
            'title' => 'Genre toevoegen',
            'form' => [
                'labels' => [
                    'name' => 'Naam',
                    'description' => 'Omschrijving',
                    'submit' => 'Genre toevoegen',
                ],
            ],
        ],

        'show' => [
            'title' => 'Genre :name',
            'list' => [
                'name' => 'Naam:',
                'description' => 'Omschrijving:',
            ],
        ],

        'edit' => [
            'title' => 'Genre :name bewerken',
            'form' => [
                'labels' => [
                    'name' => 'Naam',
                    'description' => 'Omschrijving',
                    'submit' => 'Wijzigingen opslaan',
                ],
            ],
        ],

        'exceptions' => [
            'validation_failed' => 'Validatie is mislukt. Controleer of alle verplichte velden correct zijn ingevuld en voldoen aan de gespecificeerde formaten.',
        ],
    ];
