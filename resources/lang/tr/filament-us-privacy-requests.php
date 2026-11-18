<?php

return [
    'resource' => [
        'label' => 'Tüketici talebi',
        'plural_label' => 'Tüketici talepleri',
    ],

    'fields' => [
        'type' => 'Hak',
        'status' => 'Durum',
        'state' => 'Eyalet',
        'requester_name' => 'Başvuran',
        'requester_email' => 'Başvuranın e-postası',
        'details' => 'Ayrıntılar',
        'response' => 'Yanıt',
        'reason' => 'Gerekçe',
        'extension_reason' => 'Talebin neden daha fazla zamana ihtiyacı var',
        'subject' => 'Tüketici',
        'subject_type' => 'Tüketici modeli',
        'subject_id' => 'Tüketici kimliği',
        'verified' => 'Doğrulandı',
        'due_at' => 'Son tarih',
        'verified_at' => 'Doğrulanma',
        'completed_at' => 'Kapanma',
        'created_at' => 'Alınma',
        'appealed_at' => 'İtiraz tarihi',
        'appeal_reason' => 'Tüketicinin itiraz nedeni',
        'appeal_due_at' => 'İtiraz kararı son tarihi',
        'appeal_result' => 'İtiraz kararı',
        'appeal_response' => 'Yazılı karar',
        'decision' => 'Karar',
    ],

    'type' => [
        'access' => 'Erişim',
        'correct' => 'Düzeltme',
        'delete' => 'Silme',
        'portability' => 'Taşınabilirlik',
        'third_parties' => 'Üçüncü tarafların listesi',
        'profiling' => 'Profillemeye itiraz',
    ],

    'status' => [
        'pending' => 'Bekliyor',
        'completed' => 'Tamamlandı',
        'rejected' => 'Reddedildi',
        'appealed' => 'İtiraz edildi',
    ],

    'appeal_result' => [
        'granted' => 'Kabul edildi',
        'denied' => 'Reddedildi',
    ],

    'filters' => [
        'overdue' => 'Süresi geçmiş',
        'appeal_overdue' => 'İtiraz gecikmiş',
    ],

    'unknown_state' => 'Bilinmiyor (en katı kurallar)',
    'actions' => [
        'verify' => [
            'label' => 'Kimliği doğrula',
            'description' => 'Talep sahibinin kim olduğunu doğrulayın ve talebi kaydına bağlayın. Bundan önce hiçbir şey dışa aktarılmaz veya silinmez.',
            'not_found' => 'Bu tüketici için kayıt bulunamadı.',
            'success' => 'Kimlik doğrulandı.',
        ],
        'fulfil' => [
            'label' => 'Yerine getir',
            'description' => [
                'access' => 'Tüketicinin beyan edilen tüm kişisel verilerini bir JSON dosyasına aktarın.',
                'portability' => 'Tüketicinin beyan edilen tüm kişisel verilerini taşınabilir bir JSON dosyasına aktarın.',
                'delete' => 'Tüketicinin tüm kayıtlarını kimliksizleştirir. Bu işlem geri alınamaz.',
            ],
            'success' => 'Başvuru yerine getirildi.',
        ],
        'complete' => [
            'label' => 'Tamamla',
            'description' => 'Bu hak elle yanıtlanır: tüketiciye verdiğiniz yanıtı kaydedin.',
            'success' => 'Başvuru tamamlandı.',
        ],
        'reject' => [
            'label' => 'Reddet',
            'description' => 'Tüketiciye nedenini ve eyaletinde varsa nasıl itiraz edeceğini bildirin.',
            'success' => 'Talep reddedildi.',
        ],
        'extend' => [
            'label' => 'Süreyi uzat',
            'description' => 'Bir kez, ilk süre içinde, tüketicinin eyaletindeki uzatma kadar (45 gün), makul ölçüde gerekli olduğunda. Nedenini tüketiciye bildirin.',
            'success' => 'Süre uzatıldı.',
        ],
        'appeal' => [
            'label' => 'İtirazı kaydet',
            'description' => 'Tüketici reddi itiraz ediyor. Karar eyaletinin süresi içinde (45 veya 60 gün) verilmelidir.',
            'success' => 'İtiraz kaydedildi.',
        ],
        'extend_appeal' => [
            'label' => 'İtiraz süresini uzat',
            'description' => 'Bir kez, tüketicinin eyaleti izin verdiğinde (Colorado, Oregon, Minnesota). Nedenini tüketiciye bildirin.',
            'success' => 'İtiraz süresi uzatıldı.',
        ],
        'decide_appeal' => [
            'label' => 'İtirazı karara bağla',
            'description' => 'Gerekçeleriyle yazılı yanıt verin. Kabul edildi: talep yeniden beklemede. Reddedildi: tüketiciye şikâyette bulunmak için eyaletinin başsavcısıyla nasıl iletişime geçeceğini bildirin.',
            'success' => 'İtiraz karara bağlandı.',
        ],
        'download' => [
            'label' => 'Dışa aktarımı indir',
        ],
    ],
];
