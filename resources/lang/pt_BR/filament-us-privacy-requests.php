<?php

return [
    'resource' => [
        'label' => 'Solicitação do consumidor',
        'plural_label' => 'Solicitações de consumidores',
    ],

    'fields' => [
        'type' => 'Direito',
        'status' => 'Status',
        'state' => 'Estado',
        'requester_name' => 'Solicitante',
        'requester_email' => 'E-mail do solicitante',
        'details' => 'Detalhes',
        'response' => 'Resposta',
        'reason' => 'Motivo',
        'extension_reason' => 'Por que o pedido precisa de mais tempo',
        'subject' => 'Consumidor',
        'subject_type' => 'Modelo do consumidor',
        'subject_id' => 'ID do consumidor',
        'verified' => 'Verificado',
        'due_at' => 'Prazo',
        'verified_at' => 'Verificado em',
        'completed_at' => 'Encerrado em',
        'created_at' => 'Recebido em',
        'appealed_at' => 'Recurso em',
        'appeal_reason' => 'Por que o consumidor recorre',
        'appeal_due_at' => 'Prazo da decisão do recurso',
        'appeal_result' => 'Decisão do recurso',
        'appeal_response' => 'Decisão por escrito',
        'decision' => 'Decisão',
    ],

    'type' => [
        'access' => 'Acesso',
        'correct' => 'Correção',
        'delete' => 'Exclusão',
        'portability' => 'Portabilidade',
        'third_parties' => 'Lista de terceiros',
        'profiling' => 'Questionar o perfilamento',
    ],

    'status' => [
        'pending' => 'Pendente',
        'completed' => 'Concluída',
        'rejected' => 'Negada',
        'appealed' => 'Em recurso',
    ],

    'appeal_result' => [
        'granted' => 'Deferido',
        'denied' => 'Indeferido',
    ],

    'filters' => [
        'overdue' => 'Vencidas',
        'appeal_overdue' => 'Recurso atrasado',
    ],

    'unknown_state' => 'Desconhecido (regras mais rígidas)',
    'actions' => [
        'verify' => [
            'label' => 'Verificar identidade',
            'description' => 'Confirme quem é o solicitante e vincule a solicitação ao registro dele. Nada é exportado nem excluído antes disso.',
            'not_found' => 'Nenhum registro encontrado para este consumidor.',
            'success' => 'Identidade verificada.',
        ],
        'fulfil' => [
            'label' => 'Atender',
            'description' => [
                'access' => 'Exporta todos os dados pessoais declarados do consumidor para um arquivo JSON.',
                'portability' => 'Exporta todos os dados pessoais declarados do consumidor para um arquivo JSON portável.',
                'delete' => 'Desidentifica todos os registros do consumidor. Isso não pode ser desfeito.',
            ],
            'success' => 'Solicitação atendida.',
        ],
        'complete' => [
            'label' => 'Concluir',
            'description' => 'Este direito é atendido manualmente: registre a resposta que você deu ao consumidor.',
            'success' => 'Solicitação concluída.',
        ],
        'reject' => [
            'label' => 'Negar',
            'description' => 'Explique ao consumidor o motivo e, quando o estado dele prevê, como recorrer.',
            'success' => 'Solicitação negada.',
        ],
        'extend' => [
            'label' => 'Prorrogar o prazo',
            'description' => 'Uma vez, dentro do prazo inicial, pela prorrogação prevista no estado do consumidor (45 dias), quando razoavelmente necessário. Explique o motivo ao consumidor.',
            'success' => 'Prazo prorrogado.',
        ],
        'appeal' => [
            'label' => 'Registrar recurso',
            'description' => 'O consumidor recorre da recusa. A decisão vence no prazo do estado dele (45 ou 60 dias).',
            'success' => 'Recurso registrado.',
        ],
        'extend_appeal' => [
            'label' => 'Prorrogar o recurso',
            'description' => 'Uma vez, quando o estado do consumidor permite (Colorado, Oregon, Minnesota). Explique o motivo ao consumidor.',
            'success' => 'Prazo do recurso prorrogado.',
        ],
        'decide_appeal' => [
            'label' => 'Decidir recurso',
            'description' => 'Responda por escrito, com os motivos. Deferido: o pedido volta a ficar pendente. Indeferido: informe ao consumidor como contatar o procurador-geral do estado para apresentar uma reclamação.',
            'success' => 'Recurso decidido.',
        ],
        'download' => [
            'label' => 'Baixar exportação',
        ],
    ],
];
