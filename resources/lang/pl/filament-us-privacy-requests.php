<?php

return [
    'resource' => [
        'label' => 'Wniosek konsumenta',
        'plural_label' => 'Wnioski konsumentów',
    ],

    'fields' => [
        'type' => 'Prawo',
        'status' => 'Status',
        'state' => 'Stan',
        'requester_name' => 'Wnioskodawca',
        'requester_email' => 'E-mail wnioskodawcy',
        'details' => 'Szczegóły',
        'response' => 'Odpowiedź',
        'reason' => 'Powód',
        'extension_reason' => 'Dlaczego żądanie wymaga więcej czasu',
        'subject' => 'Konsument',
        'subject_type' => 'Model konsumenta',
        'subject_id' => 'ID konsumenta',
        'verified' => 'Zweryfikowano',
        'due_at' => 'Termin',
        'verified_at' => 'Zweryfikowano dnia',
        'completed_at' => 'Zamknięto',
        'created_at' => 'Otrzymano',
        'appealed_at' => 'Odwołanie z dnia',
        'appeal_reason' => 'Powód odwołania konsumenta',
        'appeal_due_at' => 'Termin decyzji w sprawie odwołania',
        'appeal_result' => 'Decyzja w sprawie odwołania',
        'appeal_response' => 'Decyzja na piśmie',
        'decision' => 'Decyzja',
    ],

    'type' => [
        'access' => 'Dostęp',
        'correct' => 'Sprostowanie',
        'delete' => 'Usunięcie',
        'portability' => 'Przenoszenie danych',
        'third_parties' => 'Lista stron trzecich',
        'profiling' => 'Zakwestionowanie profilowania',
    ],

    'status' => [
        'pending' => 'Oczekujące',
        'completed' => 'Zrealizowane',
        'rejected' => 'Odrzucony',
        'appealed' => 'Odwołanie złożone',
    ],

    'appeal_result' => [
        'granted' => 'Uwzględnione',
        'denied' => 'Odrzucone',
    ],

    'filters' => [
        'overdue' => 'Po terminie',
        'appeal_overdue' => 'Odwołanie po terminie',
    ],

    'unknown_state' => 'Nieznany (najsurowsze zasady)',
    'actions' => [
        'verify' => [
            'label' => 'Zweryfikuj tożsamość',
            'description' => 'Potwierdź, kim jest wnioskodawca, i powiąż wniosek z jego rekordem. Wcześniej nic nie jest eksportowane ani usuwane.',
            'not_found' => 'Nie znaleziono rekordu tego konsumenta.',
            'success' => 'Tożsamość zweryfikowana.',
        ],
        'fulfil' => [
            'label' => 'Zrealizuj',
            'description' => [
                'access' => 'Eksportuj wszystkie zadeklarowane dane osobowe konsumenta do pliku JSON.',
                'portability' => 'Eksportuj wszystkie zadeklarowane dane osobowe konsumenta do przenośnego pliku JSON.',
                'delete' => 'Deidentyfikuje wszystkie rekordy konsumenta. Tej operacji nie można cofnąć.',
            ],
            'success' => 'Żądanie zrealizowane.',
        ],
        'complete' => [
            'label' => 'Zakończ',
            'description' => 'To prawo realizuje się ręcznie: zapisz odpowiedź udzieloną konsumentowi.',
            'success' => 'Żądanie zakończone.',
        ],
        'reject' => [
            'label' => 'Odrzuć',
            'description' => 'Podaj konsumentowi powód oraz, jeśli jego stan to przewiduje, sposób odwołania.',
            'success' => 'Wniosek odrzucony.',
        ],
        'extend' => [
            'label' => 'Przedłuż termin',
            'description' => 'Raz, w pierwotnym terminie, o przedłużenie przewidziane w stanie konsumenta (45 dni), gdy jest to uzasadnione. Podaj konsumentowi powód.',
            'success' => 'Termin przedłużony.',
        ],
        'appeal' => [
            'label' => 'Zarejestruj odwołanie',
            'description' => 'Konsument odwołuje się od odmowy. Decyzja musi zapaść w terminie jego stanu (45 lub 60 dni).',
            'success' => 'Odwołanie zarejestrowane.',
        ],
        'extend_appeal' => [
            'label' => 'Przedłuż odwołanie',
            'description' => 'Raz, jeśli stan konsumenta na to pozwala (Kolorado, Oregon, Minnesota). Podaj konsumentowi powód.',
            'success' => 'Termin odwołania przedłużony.',
        ],
        'decide_appeal' => [
            'label' => 'Rozstrzygnij odwołanie',
            'description' => 'Odpowiedz na piśmie, z uzasadnieniem. Uwzględnione: żądanie znów oczekuje. Odrzucone: poinformuj konsumenta, jak skontaktować się z prokuratorem generalnym stanu, aby złożyć skargę.',
            'success' => 'Odwołanie rozstrzygnięte.',
        ],
        'download' => [
            'label' => 'Pobierz eksport',
        ],
    ],
];
