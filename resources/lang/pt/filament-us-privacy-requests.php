<?php

return [
    'resource' => [
        'label' => 'Pedido do consumidor',
        'plural_label' => 'Pedidos de consumidores',
    ],

    'fields' => [
        'type' => 'Direito',
        'status' => 'Estado',
        'state' => 'Estado',
        'requester_name' => 'Requerente',
        'requester_email' => 'E-mail do requerente',
        'details' => 'Detalhes',
        'response' => 'Resposta',
        'reason' => 'Motivo',
        'extension_reason' => 'Porque é que o pedido precisa de mais tempo',
        'subject' => 'Consumidor',
        'subject_type' => 'Modelo do consumidor',
        'subject_id' => 'ID do consumidor',
        'verified' => 'Verificado',
        'due_at' => 'Prazo',
        'verified_at' => 'Verificado em',
        'completed_at' => 'Encerrado em',
        'created_at' => 'Recebido em',
        'appealed_at' => 'Recurso em',
        'appeal_reason' => 'Porque o consumidor recorre',
        'appeal_due_at' => 'Prazo da decisão do recurso',
        'appeal_result' => 'Decisão do recurso',
        'appeal_response' => 'Decisão por escrito',
        'decision' => 'Decisão',
    ],

    'type' => [
        'access' => 'Acesso',
        'correct' => 'Retificação',
        'delete' => 'Eliminação',
        'portability' => 'Portabilidade',
        'third_parties' => 'Lista de terceiros',
        'profiling' => 'Contestar a definição de perfis',
    ],

    'status' => [
        'pending' => 'Pendente',
        'completed' => 'Concluído',
        'rejected' => 'Recusado',
        'appealed' => 'Em recurso',
    ],

    'appeal_result' => [
        'granted' => 'Deferido',
        'denied' => 'Indeferido',
    ],

    'filters' => [
        'overdue' => 'Em atraso',
        'appeal_overdue' => 'Recurso em atraso',
    ],

    'unknown_state' => 'Desconhecido (regras mais rigorosas)',
    'actions' => [
        'verify' => [
            'label' => 'Verificar identidade',
            'description' => 'Confirme quem é o requerente e associe o pedido ao respetivo registo. Nada é exportado nem apagado antes disso.',
            'not_found' => 'Nenhum registo encontrado para este consumidor.',
            'success' => 'Identidade verificada.',
        ],
        'fulfil' => [
            'label' => 'Executar',
            'description' => [
                'access' => 'Exportar todos os dados pessoais declarados do consumidor para um ficheiro JSON.',
                'portability' => 'Exportar todos os dados pessoais declarados do consumidor para um ficheiro JSON portátil.',
                'delete' => 'Desidentifica todos os registos do consumidor. Não é possível anular.',
            ],
            'success' => 'Pedido executado.',
        ],
        'complete' => [
            'label' => 'Concluir',
            'description' => 'Este direito é tratado manualmente: registe a resposta dada ao consumidor.',
            'success' => 'Pedido concluído.',
        ],
        'reject' => [
            'label' => 'Recusar',
            'description' => 'Explique ao consumidor o motivo e, quando o seu estado o preveja, como recorrer.',
            'success' => 'Pedido recusado.',
        ],
        'extend' => [
            'label' => 'Prorrogar o prazo',
            'description' => 'Uma vez, dentro do prazo inicial, pela prorrogação prevista no estado do consumidor (45 dias), quando razoavelmente necessário. Explique o motivo ao consumidor.',
            'success' => 'Prazo prorrogado.',
        ],
        'appeal' => [
            'label' => 'Registar recurso',
            'description' => 'O consumidor recorre da recusa. A decisão vence no prazo do seu estado (45 ou 60 dias).',
            'success' => 'Recurso registado.',
        ],
        'extend_appeal' => [
            'label' => 'Prorrogar o recurso',
            'description' => 'Uma vez, quando o estado do consumidor o permite (Colorado, Oregon, Minnesota). Explique o motivo ao consumidor.',
            'success' => 'Prazo do recurso prorrogado.',
        ],
        'decide_appeal' => [
            'label' => 'Decidir recurso',
            'description' => 'Responda por escrito, com os motivos. Deferido: o pedido volta a ficar pendente. Indeferido: informe o consumidor de como contactar o procurador-geral do estado para apresentar uma reclamação.',
            'success' => 'Recurso decidido.',
        ],
        'download' => [
            'label' => 'Descarregar exportação',
        ],
    ],
];
