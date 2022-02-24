<?php

return [
    'game' => [
        'max_rounds' => 20
    ],
    'hero' => [
        'type' => 'hero',
        'name' => 'Orderus',
        'stats' => [
            'health' => [
                'min' => 70,
                'max' => 100
            ],
            'strength' => [
                'min' => 70,
                'max' => 80
            ],
            'defence' => [
                'min' => 45,
                'max' => 55
            ],
            'speed' => [
                'min' => 40,
                'max' => 50
            ],
            'luck' => [
                'min' => 10,
                'max' => 30
            ]
        ],
        'attack_skills' => [
            'rapid_strike' => [
                'chance_percentage' => 10
            ]
        ],
        'defence_skills' => [
            'magic_shield' => [
                'chance_percentage' => 20
            ]
        ],
    ],
    'beast' => [
        'type' => 'beast',
        'name' => 'Grizzly',
        'stats' => [
            'health' => [
                'min' => 60,
                'max' => 90
            ],
            'strength' => [
                'min' => 60,
                'max' => 90
            ],
            'defence' => [
                'min' => 40,
                'max' => 60
            ],
            'speed' => [
                'min' => 40,
                'max' => 60
            ],
            'luck' => [
                'min' => 25,
                'max' => 40
            ]
        ]
    ]
];