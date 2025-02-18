<?php

    return [
        'index' => [
            'title' => 'Boeken',
            'table' => [
                'columns' => [
                    'id' => 'ID',
                    'title' => 'Titel',
                    'description' => 'Omschrijving',
                    'genres' => 'Genre(s)',
                    'authors' => 'Auteur(s)',
                    'price' => 'Prijs',
                    'actions' => 'Acties',
                    'created_at' => 'Aangemaakt Op',
                    'updated_at' => 'Bijgewerkt Op',
                    'deleted_at' => 'Verwijderd Op',
                ],
                'buttons' => [
                    'create' => 'Boek toevoegen',
                    'edit' => 'Bewerken',
                    'delete' => 'Verwijderen',
                ],
                'messages' => [
                    'info_dbl_click' => 'Dubbele klik op een rij om het boek te bekijken.',
                ],
            ],
        ],

        'create' => [
            'title' => 'Boek toevoegen',
            'form' => [
                'labels' => [
                    'title' => 'Titel',
                    'description' => 'Omschrijving',
                    'price' => 'Prijs',
                    'stock' => 'Voorraad',
                    'published_at' => 'Gepubliceerd op',
                    'genres' => 'Genre(s)',
                    'authors' => 'Auteur(s)',
                    'submit' => 'Opslaan',
                ],
                'placeholders' => [
                    'genres' => 'Selecteer een genre',
                    'authors' => 'Selecteer een auteur',
                ],
            ],
        ],

        'edit' => [
            'title' => 'Boek :title bewerken',
        ],

        'exceptions' => [
            'validation_failed' => 'Validatie mislukt. Zorg ervoor dat alle verplichte velden correct zijn ingevuld en voldoen aan de opgegeven formaten.',
        ],
    ];
