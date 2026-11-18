<?php

return [
    'resource' => [
        'label' => 'Demande du consommateur',
        'plural_label' => 'Demandes des consommateurs',
    ],

    'fields' => [
        'type' => 'Droit',
        'status' => 'Statut',
        'state' => 'État',
        'requester_name' => 'Demandeur',
        'requester_email' => 'E-mail du demandeur',
        'details' => 'Détails',
        'response' => 'Réponse',
        'reason' => 'Motif',
        'extension_reason' => 'Pourquoi la demande nécessite plus de temps',
        'subject' => 'Consommateur',
        'subject_type' => 'Modèle du consommateur',
        'subject_id' => 'ID du consommateur',
        'verified' => 'Vérifié',
        'due_at' => 'Échéance',
        'verified_at' => 'Vérifié le',
        'completed_at' => 'Clôturé le',
        'created_at' => 'Reçu le',
        'appealed_at' => 'Recours le',
        'appeal_reason' => 'Motif du recours du consommateur',
        'appeal_due_at' => 'Décision du recours attendue le',
        'appeal_result' => 'Décision sur le recours',
        'appeal_response' => 'Décision écrite',
        'decision' => 'Décision',
    ],

    'type' => [
        'access' => 'Accès',
        'correct' => 'Rectification',
        'delete' => 'Suppression',
        'portability' => 'Portabilité',
        'third_parties' => 'Liste des tiers',
        'profiling' => 'Contester le profilage',
    ],

    'status' => [
        'pending' => 'En attente',
        'completed' => 'Traitée',
        'rejected' => 'Refusée',
        'appealed' => 'En recours',
    ],

    'appeal_result' => [
        'granted' => 'Accordé',
        'denied' => 'Refusé',
    ],

    'filters' => [
        'overdue' => 'En retard',
        'appeal_overdue' => 'Recours en retard',
    ],

    'unknown_state' => 'Inconnu (règles les plus strictes)',
    'actions' => [
        'verify' => [
            'label' => 'Vérifier l\'identité',
            'description' => 'Confirmez l\'identité du demandeur et rattachez la demande à son enregistrement. Rien n\'est exporté ni supprimé avant cela.',
            'not_found' => 'Aucun enregistrement trouvé pour ce consommateur.',
            'success' => 'Identité vérifiée.',
        ],
        'fulfil' => [
            'label' => 'Traiter',
            'description' => [
                'access' => 'Exporter toutes les données personnelles déclarées du consommateur dans un fichier JSON.',
                'portability' => 'Exporter toutes les données personnelles déclarées du consommateur dans un fichier JSON portable.',
                'delete' => 'Désidentifie tous les enregistrements du consommateur. Cette action est irréversible.',
            ],
            'success' => 'Demande traitée.',
        ],
        'complete' => [
            'label' => 'Clôturer',
            'description' => 'Ce droit est traité manuellement : consignez la réponse donnée au consommateur.',
            'success' => 'Demande clôturée.',
        ],
        'reject' => [
            'label' => 'Refuser',
            'description' => 'Indiquez au consommateur le motif et, si son État en prévoit un, comment former un recours.',
            'success' => 'Demande refusée.',
        ],
        'extend' => [
            'label' => 'Prolonger le délai',
            'description' => 'Une fois, dans le délai initial, de la prolongation prévue par l\'État du consommateur (45 jours), lorsque c\'est raisonnablement nécessaire. Indiquez le motif au consommateur.',
            'success' => 'Délai prolongé.',
        ],
        'appeal' => [
            'label' => 'Enregistrer le recours',
            'description' => 'Le consommateur conteste le refus. La décision est due dans le délai de son État (45 ou 60 jours).',
            'success' => 'Recours enregistré.',
        ],
        'extend_appeal' => [
            'label' => 'Prolonger le recours',
            'description' => 'Une fois, lorsque l\'État du consommateur le permet (Colorado, Oregon, Minnesota). Indiquez le motif au consommateur.',
            'success' => 'Délai du recours prolongé.',
        ],
        'decide_appeal' => [
            'label' => 'Statuer sur le recours',
            'description' => 'Répondez par écrit, motifs à l\'appui. Accordé : la demande est de nouveau en attente. Refusé : indiquez au consommateur comment contacter le procureur général de son État pour déposer une plainte.',
            'success' => 'Recours tranché.',
        ],
        'download' => [
            'label' => 'Télécharger l\'export',
        ],
    ],
];
