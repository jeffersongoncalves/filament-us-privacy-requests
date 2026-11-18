<?php

return [
    'resource' => [
        'label' => 'Consumentenverzoek',
        'plural_label' => 'Consumentenverzoeken',
    ],

    'fields' => [
        'type' => 'Recht',
        'status' => 'Status',
        'state' => 'Staat',
        'requester_name' => 'Aanvrager',
        'requester_email' => 'E-mail van de aanvrager',
        'details' => 'Details',
        'response' => 'Antwoord',
        'reason' => 'Reden',
        'extension_reason' => 'Waarom het verzoek meer tijd nodig heeft',
        'subject' => 'Consument',
        'subject_type' => 'Consumentmodel',
        'subject_id' => 'Consument-ID',
        'verified' => 'Geverifieerd',
        'due_at' => 'Uiterste datum',
        'verified_at' => 'Geverifieerd op',
        'completed_at' => 'Afgesloten op',
        'created_at' => 'Ontvangen op',
        'appealed_at' => 'Bezwaar op',
        'appeal_reason' => 'Waarom de consument bezwaar maakt',
        'appeal_due_at' => 'Besluit op bezwaar uiterlijk',
        'appeal_result' => 'Besluit op bezwaar',
        'appeal_response' => 'Schriftelijk besluit',
        'decision' => 'Besluit',
    ],

    'type' => [
        'access' => 'Inzage',
        'correct' => 'Correctie',
        'delete' => 'Verwijdering',
        'portability' => 'Overdraagbaarheid',
        'third_parties' => 'Lijst van derden',
        'profiling' => 'Profilering betwisten',
    ],

    'status' => [
        'pending' => 'In behandeling',
        'completed' => 'Afgehandeld',
        'rejected' => 'Afgewezen',
        'appealed' => 'Bezwaar ingediend',
    ],

    'appeal_result' => [
        'granted' => 'Toegewezen',
        'denied' => 'Afgewezen',
    ],

    'filters' => [
        'overdue' => 'Te laat',
        'appeal_overdue' => 'Bezwaar te laat',
    ],

    'unknown_state' => 'Onbekend (strengste regels)',
    'actions' => [
        'verify' => [
            'label' => 'Identiteit verifiëren',
            'description' => 'Bevestig wie de aanvrager is en koppel het verzoek aan diens record. Daarvoor wordt niets geëxporteerd of verwijderd.',
            'not_found' => 'Geen record gevonden voor deze consument.',
            'success' => 'Identiteit geverifieerd.',
        ],
        'fulfil' => [
            'label' => 'Uitvoeren',
            'description' => [
                'access' => 'Exporteer alle opgegeven persoonsgegevens van de consument naar een JSON-bestand.',
                'portability' => 'Exporteer alle opgegeven persoonsgegevens van de consument naar een overdraagbaar JSON-bestand.',
                'delete' => 'De-identificeert alle records van de consument. Dit kan niet ongedaan worden gemaakt.',
            ],
            'success' => 'Verzoek uitgevoerd.',
        ],
        'complete' => [
            'label' => 'Afronden',
            'description' => 'Dit recht wordt handmatig afgehandeld: leg het antwoord vast dat je de consument hebt gegeven.',
            'success' => 'Verzoek afgerond.',
        ],
        'reject' => [
            'label' => 'Afwijzen',
            'description' => 'Vertel de consument waarom en, als zijn staat het kent, hoe hij bezwaar kan maken.',
            'success' => 'Verzoek afgewezen.',
        ],
        'extend' => [
            'label' => 'Termijn verlengen',
            'description' => 'Eenmaal, binnen de eerste termijn, met de verlenging van de staat van de consument (45 dagen), wanneer redelijkerwijs nodig. Vertel de consument waarom.',
            'success' => 'Termijn verlengd.',
        ],
        'appeal' => [
            'label' => 'Bezwaar vastleggen',
            'description' => 'De consument maakt bezwaar tegen de weigering. Het besluit moet binnen de termijn van zijn staat vallen (45 of 60 dagen).',
            'success' => 'Bezwaar vastgelegd.',
        ],
        'extend_appeal' => [
            'label' => 'Bezwaartermijn verlengen',
            'description' => 'Eenmaal, waar de staat van de consument het toestaat (Colorado, Oregon, Minnesota). Vertel de consument waarom.',
            'success' => 'Bezwaartermijn verlengd.',
        ],
        'decide_appeal' => [
            'label' => 'Beslissen op bezwaar',
            'description' => 'Antwoord schriftelijk, met de redenen. Toegewezen: het verzoek staat weer open. Afgewezen: vertel de consument hoe hij de procureur-generaal van zijn staat kan bereiken om een klacht in te dienen.',
            'success' => 'Op bezwaar beslist.',
        ],
        'download' => [
            'label' => 'Export downloaden',
        ],
    ],
];
