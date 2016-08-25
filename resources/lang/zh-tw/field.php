<?php

return [
    'name'             => [
        'name'         => '名稱',
        'instructions' => '請輸入一個容易辨識的名稱。',
    ],
    'title'            => [
        'name'         => '標題',
        'instructions' => '請輸入文章的標題。',
    ],
    'slug'             => [
        'name'         => '縮略名',
        'instructions' => '這是網址的縮略名(slug)，會用來建立文章的網址。',
    ],
    'description'      => [
        'name'         => '說明',
        'instructions' => '此項目的簡短說明。',
    ],
    'summary'          => [
        'name'         => '摘要',
        'instructions' => '此文章的簡短摘要。',
    ],
    'category'         => [
        'name'         => '分類',
        'instructions' => '請指定此文章的分類。',
    ],
    'meta_title'       => [
        'name'         => 'Meta 標題',
        'instructions' => '請輸入這文章的 SEO 標題。 如果沒有填寫，則預設為該文章的標題。',
    ],
    'meta_description' => [
        'name'         => 'Meta 說明',
        'instructions' => '請輸入這文章的 SEO 說明。',
    ],
    'meta_keywords'    => [
        'name'         => 'Meta 關鍵字',
        'instructions' => '請輸入這文章的 SEO 關鍵字。',
    ],
    'theme_layout'     => [
        'name'         => '模板佈局',
        'instructions' => '這個 模板佈局(theme layout) 將會被用於 包裝(wrap) 文章的內容。',
    ],
    'layout'           => [
        'name'         => '佈局',
        'instructions' => '這個 佈局(layout) 將會被用來顯示頁面的內容。',
    ],
    'css'              => [
        'name'         => 'CSS',
        'instructions' => '這些 CSS 將會加入到 <strong>styles.css</strong> asset collection 當中。',
    ],
    'js'               => [
        'name'         => 'JS',
        'instructions' => '這些 script 將會加入到 <strong>scripts.js</strong> asset collection 當中。',
    ],
    'tags'             => [
        'name'         => '標籤',
        'instructions' => '請輸入經過組織的標籤，並以空白分隔。',
    ],
    'enabled'          => [
        'name'         => '啟用',
        'label'        => '這個文章是否啟用？',
        'instructions' => '這篇文章只有在 啟用狀態下 並且 發表時間符合條件，才會顯示在網站上。',
    ],
    'featured'         => [
        'name'         => '特色',
        'label'        => '這是特色文章嗎？',
        'instructions' => '特色文章有別於一般的文章，將會有比較多的曝光機會。',
    ],
    'publish_at'       => [
        'name'         => '發表於',
        'instructions' => '設定此文章要發表或公布的日期與時間。',
    ],
    'author'           => [
        'name'         => '作者',
        'instructions' => '設定公開顯是的作者資訊。',
    ],
    'ttl'              => [
        'label'        => '暫存時間 Time to live (TTL)',
        'instructions' => '您希望設定文章有多少的暫存時間(分鐘)？',
    ],
];
