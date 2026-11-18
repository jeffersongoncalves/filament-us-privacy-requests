<?php

return [
    'resource' => [
        'label' => '消费者请求',
        'plural_label' => '消费者请求',
    ],

    'fields' => [
        'type' => '权利',
        'status' => '状态',
        'state' => '州',
        'requester_name' => '请求人',
        'requester_email' => '请求人邮箱',
        'details' => '详情',
        'response' => '答复',
        'reason' => '原因',
        'extension_reason' => '请求需要更多时间的原因',
        'subject' => '消费者',
        'subject_type' => '消费者模型',
        'subject_id' => '消费者 ID',
        'verified' => '已验证',
        'due_at' => '截止日期',
        'verified_at' => '验证时间',
        'completed_at' => '关闭时间',
        'created_at' => '接收时间',
        'appealed_at' => '申诉时间',
        'appeal_reason' => '消费者申诉的理由',
        'appeal_due_at' => '申诉决定截止日期',
        'appeal_result' => '申诉决定',
        'appeal_response' => '书面决定',
        'decision' => '决定',
    ],

    'type' => [
        'access' => '访问',
        'correct' => '更正',
        'delete' => '删除',
        'portability' => '可携带性',
        'third_parties' => '第三方名单',
        'profiling' => '质疑画像结果',
    ],

    'status' => [
        'pending' => '待处理',
        'completed' => '已完成',
        'rejected' => '已拒绝',
        'appealed' => '已申诉',
    ],

    'appeal_result' => [
        'granted' => '已批准',
        'denied' => '已驳回',
    ],

    'filters' => [
        'overdue' => '已逾期',
        'appeal_overdue' => '申诉逾期',
    ],

    'unknown_state' => '未知（最严格规则）',
    'actions' => [
        'verify' => [
            'label' => '验证身份',
            'description' => '请确认请求者的身份，并将请求关联到其记录。在此之前不会导出或删除任何内容。',
            'not_found' => '未找到该消费者的记录。',
            'success' => '身份已验证。',
        ],
        'fulfil' => [
            'label' => '执行',
            'description' => [
                'access' => '将消费者所有已声明的个人数据导出为 JSON 文件。',
                'portability' => '将消费者所有已声明的个人数据导出为可携带的 JSON 文件。',
                'delete' => '对该消费者的全部记录去标识化。此操作无法撤销。',
            ],
            'success' => '请求已执行。',
        ],
        'complete' => [
            'label' => '完成',
            'description' => '此项权利需人工处理：请记录你给消费者的答复。',
            'success' => '请求已完成。',
        ],
        'reject' => [
            'label' => '拒绝',
            'description' => '告知消费者原因；如其所在州设有申诉程序，一并告知申诉方式。',
            'success' => '请求已拒绝。',
        ],
        'extend' => [
            'label' => '延长期限',
            'description' => '在合理必要时，于初始期限内按消费者所在州的延长期（45天）延长一次，并告知消费者原因。',
            'success' => '期限已延长。',
        ],
        'appeal' => [
            'label' => '记录申诉',
            'description' => '消费者对拒绝提出申诉。须在其所在州的期限（45或60天）内作出决定。',
            'success' => '已记录申诉。',
        ],
        'extend_appeal' => [
            'label' => '延长申诉期限',
            'description' => '仅在消费者所在州允许时（科罗拉多、俄勒冈、明尼苏达）延长一次，并告知消费者原因。',
            'success' => '申诉期限已延长。',
        ],
        'decide_appeal' => [
            'label' => '裁决申诉',
            'description' => '以书面形式说明理由作答。批准：请求重新变为待处理。驳回：告知消费者如何联系所在州总检察长提交投诉。',
            'success' => '申诉已裁决。',
        ],
        'download' => [
            'label' => '下载导出文件',
        ],
    ],
];
