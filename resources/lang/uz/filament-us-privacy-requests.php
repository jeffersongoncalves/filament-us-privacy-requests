<?php

return [
    'resource' => [
        'label' => 'Isteʼmolchi soʻrovi',
        'plural_label' => 'Isteʼmolchi soʻrovlari',
    ],

    'fields' => [
        'type' => 'Huquq',
        'status' => 'Holat',
        'state' => 'Shtat',
        'requester_name' => 'So\'rovchi',
        'requester_email' => 'So\'rovchining e-pochtasi',
        'details' => 'Tafsilotlar',
        'response' => 'Javob',
        'reason' => 'Sabab',
        'extension_reason' => 'So\'rovga nima uchun ko\'proq vaqt kerak',
        'subject' => 'Isteʼmolchi',
        'subject_type' => 'Isteʼmolchi modeli',
        'subject_id' => 'Isteʼmolchi ID',
        'verified' => 'Tasdiqlangan',
        'due_at' => 'Muddat',
        'verified_at' => 'Tasdiqlangan vaqt',
        'completed_at' => 'Yopilgan vaqt',
        'created_at' => 'Qabul qilingan vaqt',
        'appealed_at' => 'Apellyatsiya sanasi',
        'appeal_reason' => 'Iste\'molchining apellyatsiya sababi',
        'appeal_due_at' => 'Apellyatsiya qarori muddati',
        'appeal_result' => 'Apellyatsiya qarori',
        'appeal_response' => 'Yozma qaror',
        'decision' => 'Qaror',
    ],

    'type' => [
        'access' => 'Kirish',
        'correct' => 'Tuzatish',
        'delete' => 'O\'chirish',
        'portability' => 'Ko\'chirish',
        'third_parties' => 'Uchinchi shaxslar ro\'yxati',
        'profiling' => 'Profillashga e\'tiroz',
    ],

    'status' => [
        'pending' => 'Kutilmoqda',
        'completed' => 'Bajarildi',
        'rejected' => 'Rad etildi',
        'appealed' => 'Apellyatsiya qilingan',
    ],

    'appeal_result' => [
        'granted' => 'Qanoatlantirildi',
        'denied' => 'Rad etildi',
    ],

    'filters' => [
        'overdue' => 'Muddati o\'tgan',
        'appeal_overdue' => 'Apellyatsiya muddati o\'tgan',
    ],

    'unknown_state' => 'Noma\'lum (eng qat\'iy qoidalar)',
    'actions' => [
        'verify' => [
            'label' => 'Shaxsni tasdiqlash',
            'description' => 'Soʻrovchining kimligini tasdiqlang va soʻrovni uning yozuviga bogʻlang. Bundan oldin hech narsa eksport qilinmaydi yoki oʻchirilmaydi.',
            'not_found' => 'Bu isteʼmolchi uchun yozuv topilmadi.',
            'success' => 'Shaxs tasdiqlandi.',
        ],
        'fulfil' => [
            'label' => 'Bajarish',
            'description' => [
                'access' => 'Iste\'molchining barcha e\'lon qilingan shaxsiy ma\'lumotlarini JSON fayliga eksport qiling.',
                'portability' => 'Iste\'molchining barcha e\'lon qilingan shaxsiy ma\'lumotlarini ko\'chiriladigan JSON fayliga eksport qiling.',
                'delete' => 'Isteʼmolchining barcha yozuvlarini shaxssizlashtiradi. Buni bekor qilib boʻlmaydi.',
            ],
            'success' => 'So\'rov bajarildi.',
        ],
        'complete' => [
            'label' => 'Yakunlash',
            'description' => 'Bu huquqqa qoʻlda javob beriladi: isteʼmolchiga bergan javobingizni qayd eting.',
            'success' => 'So\'rov yakunlandi.',
        ],
        'reject' => [
            'label' => 'Rad etish',
            'description' => 'Iste\'molchiga sababini va shtatida bo\'lsa, qanday apellyatsiya berishini ayting.',
            'success' => 'Soʻrov rad etildi.',
        ],
        'extend' => [
            'label' => 'Muddatni uzaytirish',
            'description' => 'Bir marta, dastlabki muddat ichida, iste\'molchi shtatidagi uzaytirish miqdorida (45 kun), asosli zarurat bo\'lganda. Sababini iste\'molchiga ayting.',
            'success' => 'Muddat uzaytirildi.',
        ],
        'appeal' => [
            'label' => 'Apellyatsiyani qayd etish',
            'description' => 'Iste\'molchi rad etishga apellyatsiya beradi. Qaror uning shtati muddatida (45 yoki 60 kun) chiqarilishi kerak.',
            'success' => 'Apellyatsiya qayd etildi.',
        ],
        'extend_appeal' => [
            'label' => 'Apellyatsiyani uzaytirish',
            'description' => 'Bir marta, iste\'molchi shtati ruxsat bergan joyda (Kolorado, Oregon, Minnesota). Sababini iste\'molchiga ayting.',
            'success' => 'Apellyatsiya muddati uzaytirildi.',
        ],
        'decide_appeal' => [
            'label' => 'Apellyatsiya bo\'yicha qaror',
            'description' => 'Sabablari bilan yozma javob bering. Qanoatlantirildi: so\'rov yana kutilmoqda. Rad etildi: iste\'molchiga shikoyat berish uchun shtat bosh prokurori bilan qanday bog\'lanishini ayting.',
            'success' => 'Apellyatsiya bo\'yicha qaror qabul qilindi.',
        ],
        'download' => [
            'label' => 'Eksportni yuklab olish',
        ],
    ],
];
