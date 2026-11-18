<?php

return [
    'resource' => [
        'label' => 'Consumer request',
        'plural_label' => 'Consumer requests',
    ],

    'fields' => [
        'type' => 'Right',
        'status' => 'Status',
        'state' => 'State',
        'requester_name' => 'Requester',
        'requester_email' => 'Requester email',
        'details' => 'Details',
        'response' => 'Response',
        'reason' => 'Reason',
        'extension_reason' => 'Why the request needs more time',
        'subject' => 'Consumer',
        'subject_type' => 'Consumer model',
        'subject_id' => 'Consumer ID',
        'verified' => 'Verified',
        'due_at' => 'Due',
        'verified_at' => 'Verified at',
        'completed_at' => 'Closed at',
        'created_at' => 'Received at',
        'appealed_at' => 'Appealed at',
        'appeal_reason' => 'Why the consumer appeals',
        'appeal_due_at' => 'Appeal decision due',
        'appeal_result' => 'Appeal decision',
        'appeal_response' => 'Written decision',
        'decision' => 'Decision',
    ],

    'type' => [
        'access' => 'Access',
        'correct' => 'Correct',
        'delete' => 'Delete',
        'portability' => 'Portability',
        'third_parties' => 'List of third parties',
        'profiling' => 'Question profiling',
    ],

    'status' => [
        'pending' => 'Pending',
        'completed' => 'Completed',
        'rejected' => 'Denied',
        'appealed' => 'Appealed',
    ],

    'appeal_result' => [
        'granted' => 'Granted',
        'denied' => 'Denied',
    ],

    'filters' => [
        'overdue' => 'Overdue',
        'appeal_overdue' => 'Appeal overdue',
    ],

    'unknown_state' => 'Unknown (strictest rules)',

    'actions' => [
        'verify' => [
            'label' => 'Verify identity',
            'description' => 'Confirm who the requester is and link the request to their record. Nothing is exported or deleted before this.',
            'not_found' => 'No record found for this consumer.',
            'success' => 'Identity verified.',
        ],
        'fulfil' => [
            'label' => 'Fulfil',
            'description' => [
                'access' => 'Export every declared piece of personal data of the consumer to a JSON file.',
                'portability' => 'Export every declared piece of personal data of the consumer to a portable JSON file.',
                'delete' => 'Deidentify every record of the consumer. This cannot be undone.',
            ],
            'success' => 'Request fulfilled.',
        ],
        'complete' => [
            'label' => 'Complete',
            'description' => 'This right is answered by hand: record the answer you gave the consumer.',
            'success' => 'Request completed.',
        ],
        'reject' => [
            'label' => 'Deny',
            'description' => 'Tell the consumer why and, where their state has one, how to appeal.',
            'success' => 'Request denied.',
        ],
        'extend' => [
            'label' => 'Extend the deadline',
            'description' => 'Once, within the initial period, by the extension of the consumer\'s state (45 days), when reasonably necessary. Tell the consumer why.',
            'success' => 'Deadline extended.',
        ],
        'appeal' => [
            'label' => 'Record appeal',
            'description' => 'The consumer appeals the refusal. The decision is due within the window of their state (45 or 60 days).',
            'success' => 'Appeal recorded.',
        ],
        'extend_appeal' => [
            'label' => 'Extend the appeal',
            'description' => 'Once, where the consumer\'s state allows it (Colorado, Oregon, Minnesota). Tell the consumer why.',
            'success' => 'Appeal deadline extended.',
        ],
        'decide_appeal' => [
            'label' => 'Decide appeal',
            'description' => 'Answer in writing, with the reasons. Granted: the request is pending again. Denied: tell the consumer how to contact their attorney general to submit a complaint.',
            'success' => 'Appeal decided.',
        ],
        'download' => [
            'label' => 'Download export',
        ],
    ],
];
