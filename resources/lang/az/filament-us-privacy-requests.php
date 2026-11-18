<?php

return [
    'resource' => [
        'label' => 'İstehlakçı sorğusu',
        'plural_label' => 'İstehlakçı sorğuları',
    ],

    'fields' => [
        'type' => 'Hüquq',
        'status' => 'Status',
        'state' => 'Ştat',
        'requester_name' => 'Sorğu edən',
        'requester_email' => 'Sorğu edənin e-poçtu',
        'details' => 'Təfərrüatlar',
        'response' => 'Cavab',
        'reason' => 'Səbəb',
        'extension_reason' => 'Sorğunun niyə əlavə vaxta ehtiyacı var',
        'subject' => 'İstehlakçı',
        'subject_type' => 'İstehlakçı modeli',
        'subject_id' => 'İstehlakçı ID-si',
        'verified' => 'Təsdiqlənib',
        'due_at' => 'Son tarix',
        'verified_at' => 'Təsdiqlənmə',
        'completed_at' => 'Bağlanma',
        'created_at' => 'Alınma',
        'appealed_at' => 'Apellyasiya tarixi',
        'appeal_reason' => 'İstehlakçının apellyasiya səbəbi',
        'appeal_due_at' => 'Apellyasiya qərarının son tarixi',
        'appeal_result' => 'Apellyasiya qərarı',
        'appeal_response' => 'Yazılı qərar',
        'decision' => 'Qərar',
    ],

    'type' => [
        'access' => 'Giriş',
        'correct' => 'Düzəliş',
        'delete' => 'Silinmə',
        'portability' => 'Daşınma',
        'third_parties' => 'Üçüncü tərəflərin siyahısı',
        'profiling' => 'Profilləşdirməyə etiraz',
    ],

    'status' => [
        'pending' => 'Gözləyir',
        'completed' => 'Tamamlandı',
        'rejected' => 'Rədd edildi',
        'appealed' => 'Apellyasiya edilib',
    ],

    'appeal_result' => [
        'granted' => 'Təmin edildi',
        'denied' => 'Rədd edildi',
    ],

    'filters' => [
        'overdue' => 'Gecikmiş',
        'appeal_overdue' => 'Apellyasiya gecikib',
    ],

    'unknown_state' => 'Naməlum (ən sərt qaydalar)',
    'actions' => [
        'verify' => [
            'label' => 'Kimliyi təsdiqlə',
            'description' => 'Sorğu göndərənin kim olduğunu təsdiqləyin və sorğunu onun qeydinə bağlayın. Bundan əvvəl heç nə ixrac edilmir və silinmir.',
            'not_found' => 'Bu istehlakçı üçün qeyd tapılmadı.',
            'success' => 'Kimlik təsdiqləndi.',
        ],
        'fulfil' => [
            'label' => 'İcra et',
            'description' => [
                'access' => 'İstehlakçının bütün bəyan edilmiş şəxsi məlumatlarını JSON faylına ixrac edin.',
                'portability' => 'İstehlakçının bütün bəyan edilmiş şəxsi məlumatlarını daşınan JSON faylına ixrac edin.',
                'delete' => 'İstehlakçının bütün qeydlərini deidentifikasiya edir. Bunu geri qaytarmaq mümkün deyil.',
            ],
            'success' => 'Sorğu icra edildi.',
        ],
        'complete' => [
            'label' => 'Tamamla',
            'description' => 'Bu hüquq əl ilə cavablandırılır: istehlakçıya verdiyiniz cavabı qeyd edin.',
            'success' => 'Sorğu tamamlandı.',
        ],
        'reject' => [
            'label' => 'Rədd etmək',
            'description' => 'İstehlakçıya səbəbi və ştatında varsa, necə apellyasiya verəcəyini bildirin.',
            'success' => 'Sorğu rədd edildi.',
        ],
        'extend' => [
            'label' => 'Müddəti uzat',
            'description' => 'Bir dəfə, ilkin müddət ərzində, istehlakçının ştatındakı uzatma qədər (45 gün), əsaslı zərurət olduqda. Səbəbi istehlakçıya bildirin.',
            'success' => 'Müddət uzadıldı.',
        ],
        'appeal' => [
            'label' => 'Apellyasiyanı qeyd et',
            'description' => 'İstehlakçı imtinaya apellyasiya verir. Qərar onun ştatının müddəti ərzində (45 və ya 60 gün) verilməlidir.',
            'success' => 'Apellyasiya qeyd edildi.',
        ],
        'extend_appeal' => [
            'label' => 'Apellyasiyanı uzat',
            'description' => 'Bir dəfə, istehlakçının ştatı icazə verdikdə (Kolorado, Oreqon, Minnesota). Səbəbi istehlakçıya bildirin.',
            'success' => 'Apellyasiya müddəti uzadıldı.',
        ],
        'decide_appeal' => [
            'label' => 'Apellyasiyanı həll et',
            'description' => 'Səbəbləri ilə yazılı cavab verin. Təmin edildi: sorğu yenidən gözləmədədir. Rədd edildi: istehlakçıya şikayət vermək üçün ştatının baş prokuroru ilə necə əlaqə saxlayacağını bildirin.',
            'success' => 'Apellyasiya həll edildi.',
        ],
        'download' => [
            'label' => 'İxracı yüklə',
        ],
    ],
];
