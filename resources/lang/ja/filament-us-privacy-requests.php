<?php

return [
    'resource' => [
        'label' => '消費者リクエスト',
        'plural_label' => '消費者リクエスト',
    ],

    'fields' => [
        'type' => '権利',
        'status' => 'ステータス',
        'state' => '州',
        'requester_name' => '請求者',
        'requester_email' => '請求者のメール',
        'details' => '詳細',
        'response' => '回答',
        'reason' => '理由',
        'extension_reason' => '追加の時間が必要な理由',
        'subject' => '消費者',
        'subject_type' => '消費者モデル',
        'subject_id' => '消費者ID',
        'verified' => '本人確認済み',
        'due_at' => '期限',
        'verified_at' => '本人確認日時',
        'completed_at' => '完了日時',
        'created_at' => '受付日時',
        'appealed_at' => '不服申立日',
        'appeal_reason' => '消費者の不服申立ての理由',
        'appeal_due_at' => '不服申立ての判断期限',
        'appeal_result' => '不服申立ての判断',
        'appeal_response' => '書面による判断',
        'decision' => '判断',
    ],

    'type' => [
        'access' => 'アクセス',
        'correct' => '訂正',
        'delete' => '削除',
        'portability' => 'ポータビリティ',
        'third_parties' => '第三者の一覧',
        'profiling' => 'プロファイリングへの異議',
    ],

    'status' => [
        'pending' => '保留中',
        'completed' => '完了',
        'rejected' => '拒否',
        'appealed' => '不服申立て中',
    ],

    'appeal_result' => [
        'granted' => '認容',
        'denied' => '棄却',
    ],

    'filters' => [
        'overdue' => '期限切れ',
        'appeal_overdue' => '不服申立て期限超過',
    ],

    'unknown_state' => '不明（最も厳しいルール）',
    'actions' => [
        'verify' => [
            'label' => '本人確認',
            'description' => 'リクエスト者が誰かを確認し、リクエストをそのレコードに紐づけてください。それまでは何もエクスポート・削除されません。',
            'not_found' => 'この消費者のレコードが見つかりません。',
            'success' => '本人確認が完了しました。',
        ],
        'fulfil' => [
            'label' => '対応する',
            'description' => [
                'access' => '消費者の宣言済み個人データをすべて JSON ファイルにエクスポートします。',
                'portability' => '消費者の宣言済み個人データをすべて持ち運び可能な JSON ファイルにエクスポートします。',
                'delete' => '消費者のすべてのレコードを非識別化します。元に戻すことはできません。',
            ],
            'success' => '請求に対応しました。',
        ],
        'complete' => [
            'label' => '完了にする',
            'description' => 'この権利は手動で対応します。消費者に伝えた回答を記録してください。',
            'success' => '請求を完了しました。',
        ],
        'reject' => [
            'label' => '拒否',
            'description' => '消費者に理由と、州に手続きがある場合は不服申立ての方法を伝えてください。',
            'success' => 'リクエストを拒否しました。',
        ],
        'extend' => [
            'label' => '期限を延長',
            'description' => '合理的に必要な場合に限り、当初の期限内に一度だけ、消費者の州の延長期間（45日）分延長できます。理由を消費者に伝えてください。',
            'success' => '期限を延長しました。',
        ],
        'appeal' => [
            'label' => '不服申立てを記録',
            'description' => '消費者が拒否に対して不服を申し立てています。判断は州の期間内（45日または60日）に行う必要があります。',
            'success' => '不服申立てを記録しました。',
        ],
        'extend_appeal' => [
            'label' => '不服申立ての期限を延長',
            'description' => '消費者の州が認める場合（コロラド、オレゴン、ミネソタ）に一度だけ。理由を消費者に伝えてください。',
            'success' => '不服申立ての期限を延長しました。',
        ],
        'decide_appeal' => [
            'label' => '不服申立てを判断',
            'description' => '理由を添えて書面で回答してください。認容：請求は再び保留中になります。棄却：苦情を申し立てるための州司法長官への連絡方法を消費者に伝えてください。',
            'success' => '不服申立てを判断しました。',
        ],
        'download' => [
            'label' => 'エクスポートをダウンロード',
        ],
    ],
];
