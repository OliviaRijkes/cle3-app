<?php
$superMarketLocations = [
    [
        "name" => "entrance",
        "location" => ""
    ],
    [
        "name" => "intersection1",
        "location" => ""
    ]
];

/** * @return array */
function getPlayers(): array
{
    return [
        [
            "id" => 1,
            "name" => "Ugurcan Cakir",
            "position" => "Goalkeeper",
        ],
        [
            "id" => 2,
            "name" => "Gunay Guvenc",
            "position" => "Goalkeeper",
        ],
        [
            "id" => 3,
            "name" => "Sacha Boey",
            "position" => "Right-Back",
        ],
        [
            "id" => 4,
            "name" => "Roland Sallai",
            "position" => "Right Winger",
        ],
        [
            "id" => 5,
            "name" => "Wilfred Singo",
            "position" => "Right-Back",
        ],
        [
            "id" => 6,
            "name" => "Davidson Sanchez",
            "position" => "Centre-Back",
        ],
        [
            "id" => 7,
            "name" => "Abdulkerim Bardakci",
            "position" => "Centre-Back",
        ],
        [
            "id" => 8,
            "name" => "Eren Elmali",
            "position" => "Left-Back",
        ],
        [
            "id" => 9,
            "name" => "Ismail Jakobs",
            "position" => "Left-Back",
        ],
        [
            "id" => 10,
            "name" => "Lucas Torreira",
            "position" => "Defensive Midfielder",
        ],
        [
            "id" => 11,
            "name" => "Mario Lemina",
            "position" => "Defensive Midfielder",
        ],
        [
            "id" => 12,
            "name" => "Ilkay Gundogan",
            "position" => "Central Midfielder",
        ],
        [
            "id" => 13,
            "name" => "Yunus Akgun",
            "position" => "Right Winger",
        ],
        [
            "id" => 14,
            "name" => "Baris Alper Yilmaz",
            "position" => "Left Winger",
        ],
        [
            "id" => 15,
            "name" => "Noa Lang",
            "position" => "Left Winger",
        ],
        [
            "id" => 16,
            "name" => "Leroy Sane",
            "position" => "Right Winger",
        ],
        [
            "id" => 17,
            "name" => "Victor Osimhen",
            "position" => "Striker",
        ],
        [
            "id" => 18,
            "name" => "Mauro Icardi",
            "position" => "Striker",
        ],
        [
            "id" => 19,
            "name" => "Gabriel Sara",
            "position" => "Attacking Midfielder",
        ],
        [
            "id" => 19,
            "name" => "Okan Buruk",
            "position" => "Coach",
        ]
    ];
}

/**
 * @param $id
 * @return array|false
 */
function getPlayerDetails($id): array|false
{
    $tags = [
        1 => [
            "nationality" => "Turkish",
            "appearances" => 31,
            "goals" => 0,
            "assists" => 0,
            "contract_until" => "30/06/2030"
        ],
        2 => [
            "nationality" => "Turkish",
            "appearances" => 13,
            "goals" => 0,
            "assists" => 0,
            "contract_until" => "30/06/2028"
        ],
        3 => [
            "nationality" => "France",
            "appearances" => 10,
            "goals" => 2,
            "assists" => 3,
            "contract_until" => "30/06/2026 (loan)"
        ],
        4 => [
            "nationality" => "Hungary",
            "appearances" => 37,
            "goals" => 1,
            "assists" => 6,
            "contract_until" => "30/06/2028"
        ],
        5 => [
            "nationality" => "Ivory Coast",
            "appearances" => 21,
            "goals" => 1,
            "assists" => 2,
            "contract_until" => "30/06/2030"
        ],
        6 => [
            "nationality" => "Colombia",
            "appearances" => 38,
            "goals" => 2,
            "assists" => 0,
            "contract_until" => "30/06/2029"
        ],
        7 => [
            "nationality" => "Turkish",
            "appearances" => 38,
            "goals" => 13,
            "assists" => 1,
            "contract_until" => "30/06/2027"
        ],
        8 => [
            "nationality" => "Turkish",
            "appearances" => 33,
            "goals" => 4,
            "assists" => 0,
            "contract_until" => "30/06/2028"
        ],
        9 => [
            "nationality" => "Senegal",
            "appearances" => 30,
            "goals" => 1,
            "assists" => 2,
            "contract_until" => "30/06/2028"
        ],
        10 => [
            "nationality" => "Uruguay",
            "appearances" => 38,
            "goals" => 3,
            "assists" => 4,
            "contract_until" => "30/06/2027"
        ],
        11 => [
            "nationality" => "Gabon",
            "appearances" => 32,
            "goals" => 1,
            "assists" => 1,
            "contract_until" => "30/06/2029"
        ],
        12 => [
            "nationality" => "Germany",
            "appearances" => 30,
            "goals" => 2,
            "assists" => 4,
            "contract_until" => "30/06/2029"
        ],
        13 => [
            "nationality" => "Turkish",
            "appearances" => 34,
            "goals" => 8,
            "assists" => 8,
            "contract_until" => "30/06/2026"
        ],
        14 => [
            "nationality" => "Turkish",
            "appearances" => 40,
            "goals" => 10,
            "assists" => 12,
            "contract_until" => "30/06/2028"
        ],
        15 => [
            "nationality" => "Netherlands",
            "appearances" => 10,
            "goals" => 2,
            "assists" => 2,
            "contract_until" => "30/06/2026 (loan)"
        ],
        16 => [
            "nationality" => "Germany",
            "appearances" => 30,
            "goals" => 6,
            "assists" => 8,
            "contract_until" => "30/06/2028"
        ],
        17 => [
            "nationality" => "Nigeria",
            "appearances" => 28,
            "goals" => 19,
            "assists" => 7,
            "contract_until" => "30/06/2029"
        ],
        18 => [
            "nationality" => "Argentina",
            "appearances" => 38,
            "goals" => 15,
            "assists" => 2,
            "contract_until" => "30/06/2026"
        ],
        19 => [
            "nationality" => "Brazil",
            "appearances" => 38,
            "goals" => 6,
            "assists" => 3,
            "contract_until" => "30/06/2029"
        ],
        20 => [
            "nationality" => "Turkish",
            "appearances" => 48,
        ]
    ];
    return $tags[$id] ?? false;
}




