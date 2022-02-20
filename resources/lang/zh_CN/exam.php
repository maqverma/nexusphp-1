<?php

return [
    'name' => '考核名称',
    'index' => '考核指标',
    'time_range' => '考核时间',
    'index_text_' . \App\Models\Exam::INDEX_UPLOADED => '上传量',
    'index_text_' . \App\Models\Exam::INDEX_SEED_TIME_AVERAGE => '平均做种时间',
    'index_text_' . \App\Models\Exam::INDEX_DOWNLOADED => '下载量',
    'index_text_' . \App\Models\Exam::INDEX_SEED_BONUS => '做种积分',
    'require_value' => '要求',
    'current_value' => '当前',
    'result' => '结果',
    'result_pass' => '通过！',
    'result_not_pass' => '<span style="color: red">未通过！</span>',
    'checkout_pass_message_subject' => '考核通过！',
    'checkout_pass_message_content' => '恭喜！你在规定时间内（:begin ~ :end）顺利完成了考核：:exam_name。',
    'checkout_not_pass_message_subject' => '考核未通过，账号被禁用！',
    'checkout_not_pass_message_content' => '你在规定时间内（:begin ~ :end）未完成考核：:exam_name，账号已被禁用。',
    'ban_log_reason' => '未完成考核：:exam_name(:begin ~ :end)',
    'ban_user_modcomment' => '未完成考核: :exam_name(:begin ~ :end), 被系统禁用.',
    'admin' => [
        'list' => [
            'page_title' => '考核列表'
        ]
    ]
];
