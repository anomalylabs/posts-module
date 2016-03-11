<?php

return [
    'lastmod' => function (\Anomaly\PostsModule\Post\Contract\PostRepositoryInterface $posts) {

        $post = $posts->lastModified();

        return $post->lastModified()->toAtomString();
    },
    'entries' => function (\Anomaly\PostsModule\Post\Contract\PostRepositoryInterface $posts) {

        /* @var \Anomaly\PostsModule\Post\PostCollection $posts */
        $posts = $posts->all();

        return $posts->live();
    },
    'handler' => function (\Roumen\Sitemap\Sitemap $sitemap, \Anomaly\PostsModule\Post\Contract\PostInterface $entry) {
        $sitemap->add(url($entry->path()), $entry->lastModified()->toAtomString(), 0.5, 'monthly');
    }
];
