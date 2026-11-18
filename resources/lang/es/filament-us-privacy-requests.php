<?php

return [
    'resource' => [
        'label' => 'Solicitud del consumidor',
        'plural_label' => 'Solicitudes de consumidores',
    ],

    'fields' => [
        'type' => 'Derecho',
        'status' => 'Estado',
        'state' => 'Estado',
        'requester_name' => 'Solicitante',
        'requester_email' => 'Correo del solicitante',
        'details' => 'Detalles',
        'response' => 'Respuesta',
        'reason' => 'Motivo',
        'extension_reason' => 'Por qué la solicitud necesita más tiempo',
        'subject' => 'Consumidor',
        'subject_type' => 'Modelo del consumidor',
        'subject_id' => 'ID del consumidor',
        'verified' => 'Verificado',
        'due_at' => 'Plazo',
        'verified_at' => 'Verificado el',
        'completed_at' => 'Cerrado el',
        'created_at' => 'Recibido el',
        'appealed_at' => 'Apelado el',
        'appeal_reason' => 'Por qué apela el consumidor',
        'appeal_due_at' => 'Plazo de la decisión de la apelación',
        'appeal_result' => 'Decisión de la apelación',
        'appeal_response' => 'Decisión por escrito',
        'decision' => 'Decisión',
    ],

    'type' => [
        'access' => 'Acceso',
        'correct' => 'Corrección',
        'delete' => 'Eliminación',
        'portability' => 'Portabilidad',
        'third_parties' => 'Lista de terceros',
        'profiling' => 'Cuestionar la elaboración de perfiles',
    ],

    'status' => [
        'pending' => 'Pendiente',
        'completed' => 'Completada',
        'rejected' => 'Denegada',
        'appealed' => 'Apelada',
    ],

    'appeal_result' => [
        'granted' => 'Estimada',
        'denied' => 'Denegada',
    ],

    'filters' => [
        'overdue' => 'Vencidas',
        'appeal_overdue' => 'Apelación vencida',
    ],

    'unknown_state' => 'Desconocido (reglas más estrictas)',
    'actions' => [
        'verify' => [
            'label' => 'Verificar identidad',
            'description' => 'Confirma quién es el solicitante y vincula la solicitud a su registro. Nada se exporta ni se elimina antes de esto.',
            'not_found' => 'No se encontró ningún registro para este consumidor.',
            'success' => 'Identidad verificada.',
        ],
        'fulfil' => [
            'label' => 'Atender',
            'description' => [
                'access' => 'Exportar todos los datos personales declarados del consumidor a un archivo JSON.',
                'portability' => 'Exportar todos los datos personales declarados del consumidor a un archivo JSON portable.',
                'delete' => 'Desidentifica todos los registros del consumidor. No se puede deshacer.',
            ],
            'success' => 'Solicitud atendida.',
        ],
        'complete' => [
            'label' => 'Completar',
            'description' => 'Este derecho se atiende a mano: registra la respuesta que diste al consumidor.',
            'success' => 'Solicitud completada.',
        ],
        'reject' => [
            'label' => 'Denegar',
            'description' => 'Indique al consumidor el motivo y, si su estado lo prevé, cómo apelar.',
            'success' => 'Solicitud denegada.',
        ],
        'extend' => [
            'label' => 'Prorrogar el plazo',
            'description' => 'Una vez, dentro del plazo inicial, con la prórroga del estado del consumidor (45 días), cuando sea razonablemente necesario. Indique el motivo al consumidor.',
            'success' => 'Plazo prorrogado.',
        ],
        'appeal' => [
            'label' => 'Registrar apelación',
            'description' => 'El consumidor apela la negativa. La decisión vence dentro del plazo de su estado (45 o 60 días).',
            'success' => 'Apelación registrada.',
        ],
        'extend_appeal' => [
            'label' => 'Prorrogar la apelación',
            'description' => 'Una vez, cuando el estado del consumidor lo permite (Colorado, Oregón, Minnesota). Indique el motivo al consumidor.',
            'success' => 'Plazo de la apelación prorrogado.',
        ],
        'decide_appeal' => [
            'label' => 'Resolver apelación',
            'description' => 'Responda por escrito, con los motivos. Estimada: la solicitud vuelve a quedar pendiente. Denegada: indique al consumidor cómo contactar al fiscal general de su estado para presentar una queja.',
            'success' => 'Apelación resuelta.',
        ],
        'download' => [
            'label' => 'Descargar exportación',
        ],
    ],
];
