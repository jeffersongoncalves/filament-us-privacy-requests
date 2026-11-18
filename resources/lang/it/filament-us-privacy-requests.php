<?php

return [
    'resource' => [
        'label' => 'Richiesta del consumatore',
        'plural_label' => 'Richieste dei consumatori',
    ],

    'fields' => [
        'type' => 'Diritto',
        'status' => 'Stato',
        'state' => 'Stato',
        'requester_name' => 'Richiedente',
        'requester_email' => 'Email del richiedente',
        'details' => 'Dettagli',
        'response' => 'Risposta',
        'reason' => 'Motivo',
        'extension_reason' => 'Perché la richiesta richiede più tempo',
        'subject' => 'Consumatore',
        'subject_type' => 'Modello del consumatore',
        'subject_id' => 'ID del consumatore',
        'verified' => 'Verificato',
        'due_at' => 'Scadenza',
        'verified_at' => 'Verificato il',
        'completed_at' => 'Chiuso il',
        'created_at' => 'Ricevuto il',
        'appealed_at' => 'Ricorso il',
        'appeal_reason' => 'Motivo del ricorso del consumatore',
        'appeal_due_at' => 'Scadenza della decisione sul ricorso',
        'appeal_result' => 'Decisione sul ricorso',
        'appeal_response' => 'Decisione scritta',
        'decision' => 'Decisione',
    ],

    'type' => [
        'access' => 'Accesso',
        'correct' => 'Rettifica',
        'delete' => 'Cancellazione',
        'portability' => 'Portabilità',
        'third_parties' => 'Elenco dei terzi',
        'profiling' => 'Contestare la profilazione',
    ],

    'status' => [
        'pending' => 'In attesa',
        'completed' => 'Completata',
        'rejected' => 'Respinta',
        'appealed' => 'In ricorso',
    ],

    'appeal_result' => [
        'granted' => 'Accolto',
        'denied' => 'Respinto',
    ],

    'filters' => [
        'overdue' => 'Scadute',
        'appeal_overdue' => 'Ricorso scaduto',
    ],

    'unknown_state' => 'Sconosciuto (regole più rigide)',
    'actions' => [
        'verify' => [
            'label' => 'Verifica identità',
            'description' => 'Conferma chi è il richiedente e collega la richiesta al suo record. Prima di questo non viene esportato né cancellato nulla.',
            'not_found' => 'Nessun record trovato per questo consumatore.',
            'success' => 'Identità verificata.',
        ],
        'fulfil' => [
            'label' => 'Evadi',
            'description' => [
                'access' => 'Esporta tutti i dati personali dichiarati del consumatore in un file JSON.',
                'portability' => 'Esporta tutti i dati personali dichiarati del consumatore in un file JSON portabile.',
                'delete' => 'De-identifica tutti i record del consumatore. L\'operazione non può essere annullata.',
            ],
            'success' => 'Richiesta evasa.',
        ],
        'complete' => [
            'label' => 'Completa',
            'description' => 'Questo diritto si gestisce a mano: registra la risposta data al consumatore.',
            'success' => 'Richiesta completata.',
        ],
        'reject' => [
            'label' => 'Respingi',
            'description' => 'Spiega al consumatore il motivo e, se il suo stato lo prevede, come fare ricorso.',
            'success' => 'Richiesta respinta.',
        ],
        'extend' => [
            'label' => 'Prorogare la scadenza',
            'description' => 'Una volta, entro il termine iniziale, della proroga prevista dallo stato del consumatore (45 giorni), quando ragionevolmente necessario. Spiega il motivo al consumatore.',
            'success' => 'Termine prorogato.',
        ],
        'appeal' => [
            'label' => 'Registra ricorso',
            'description' => 'Il consumatore ricorre contro il rifiuto. La decisione è dovuta entro il termine del suo stato (45 o 60 giorni).',
            'success' => 'Ricorso registrato.',
        ],
        'extend_appeal' => [
            'label' => 'Prorogare il ricorso',
            'description' => 'Una volta, dove lo stato del consumatore lo consente (Colorado, Oregon, Minnesota). Spiega il motivo al consumatore.',
            'success' => 'Scadenza del ricorso prorogata.',
        ],
        'decide_appeal' => [
            'label' => 'Decidere il ricorso',
            'description' => 'Rispondi per iscritto, con le motivazioni. Accolto: la richiesta torna in attesa. Respinto: indica al consumatore come contattare il procuratore generale del suo stato per presentare un reclamo.',
            'success' => 'Ricorso deciso.',
        ],
        'download' => [
            'label' => 'Scarica esportazione',
        ],
    ],
];
