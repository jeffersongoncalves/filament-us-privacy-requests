<?php

return [
    'resource' => [
        'label' => 'Verbraucheranfrage',
        'plural_label' => 'Verbraucheranfragen',
    ],

    'fields' => [
        'type' => 'Recht',
        'status' => 'Status',
        'state' => 'Bundesstaat',
        'requester_name' => 'Antragsteller',
        'requester_email' => 'E-Mail des Antragstellers',
        'details' => 'Details',
        'response' => 'Antwort',
        'reason' => 'Grund',
        'extension_reason' => 'Warum die Anfrage mehr Zeit braucht',
        'subject' => 'Verbraucher',
        'subject_type' => 'Verbraucher-Model',
        'subject_id' => 'Verbraucher-ID',
        'verified' => 'Verifiziert',
        'due_at' => 'Fällig',
        'verified_at' => 'Verifiziert am',
        'completed_at' => 'Abgeschlossen am',
        'created_at' => 'Eingegangen am',
        'appealed_at' => 'Einspruch am',
        'appeal_reason' => 'Warum der Verbraucher Einspruch einlegt',
        'appeal_due_at' => 'Einspruchsentscheidung fällig',
        'appeal_result' => 'Einspruchsentscheidung',
        'appeal_response' => 'Schriftliche Entscheidung',
        'decision' => 'Entscheidung',
    ],

    'type' => [
        'access' => 'Auskunft',
        'correct' => 'Berichtigung',
        'delete' => 'Löschung',
        'portability' => 'Datenübertragbarkeit',
        'third_parties' => 'Liste der Dritten',
        'profiling' => 'Profiling anfechten',
    ],

    'status' => [
        'pending' => 'Offen',
        'completed' => 'Erledigt',
        'rejected' => 'Abgelehnt',
        'appealed' => 'Einspruch eingelegt',
    ],

    'appeal_result' => [
        'granted' => 'Stattgegeben',
        'denied' => 'Abgelehnt',
    ],

    'filters' => [
        'overdue' => 'Überfällig',
        'appeal_overdue' => 'Einspruch überfällig',
    ],

    'unknown_state' => 'Unbekannt (strengste Regeln)',
    'actions' => [
        'verify' => [
            'label' => 'Identität prüfen',
            'description' => 'Bestätigen Sie, wer die anfragende Person ist, und verknüpfen Sie die Anfrage mit ihrem Datensatz. Vorher wird nichts exportiert oder gelöscht.',
            'not_found' => 'Für diesen Verbraucher wurde kein Datensatz gefunden.',
            'success' => 'Identität geprüft.',
        ],
        'fulfil' => [
            'label' => 'Ausführen',
            'description' => [
                'access' => 'Alle deklarierten personenbezogenen Daten des Verbrauchers in eine JSON-Datei exportieren.',
                'portability' => 'Alle deklarierten personenbezogenen Daten des Verbrauchers in eine übertragbare JSON-Datei exportieren.',
                'delete' => 'De-identifiziert alle Datensätze des Verbrauchers. Das kann nicht rückgängig gemacht werden.',
            ],
            'success' => 'Anfrage ausgeführt.',
        ],
        'complete' => [
            'label' => 'Abschließen',
            'description' => 'Dieses Recht wird manuell beantwortet: Halten Sie die Antwort fest, die Sie dem Verbraucher gegeben haben.',
            'success' => 'Anfrage abgeschlossen.',
        ],
        'reject' => [
            'label' => 'Ablehnen',
            'description' => 'Nennen Sie dem Verbraucher den Grund und, wo sein Bundesstaat es vorsieht, wie er Einspruch einlegen kann.',
            'success' => 'Anfrage abgelehnt.',
        ],
        'extend' => [
            'label' => 'Frist verlängern',
            'description' => 'Einmal, innerhalb der ersten Frist, um die Verlängerung des Bundesstaats des Verbrauchers (45 Tage), wenn vernünftigerweise erforderlich. Nennen Sie dem Verbraucher den Grund.',
            'success' => 'Frist verlängert.',
        ],
        'appeal' => [
            'label' => 'Einspruch erfassen',
            'description' => 'Der Verbraucher legt gegen die Ablehnung Einspruch ein. Die Entscheidung ist innerhalb der Frist seines Bundesstaats fällig (45 oder 60 Tage).',
            'success' => 'Einspruch erfasst.',
        ],
        'extend_appeal' => [
            'label' => 'Einspruchsfrist verlängern',
            'description' => 'Einmal, wo der Bundesstaat des Verbrauchers es erlaubt (Colorado, Oregon, Minnesota). Nennen Sie dem Verbraucher den Grund.',
            'success' => 'Einspruchsfrist verlängert.',
        ],
        'decide_appeal' => [
            'label' => 'Über Einspruch entscheiden',
            'description' => 'Schriftlich und mit Begründung antworten. Stattgegeben: Die Anfrage ist wieder offen. Abgelehnt: Teilen Sie dem Verbraucher mit, wie er den Generalstaatsanwalt seines Bundesstaats für eine Beschwerde kontaktiert.',
            'success' => 'Über den Einspruch entschieden.',
        ],
        'download' => [
            'label' => 'Export herunterladen',
        ],
    ],
];
