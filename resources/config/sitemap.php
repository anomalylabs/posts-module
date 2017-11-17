<?php

use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;
use Illuminate\Contracts\Config\Repository;
use Roumen\Sitemap\Sitemap;

return [
    'lastmod' => function (PostRepositoryInterface $posts) {

        if (!$post = $posts->lastModified()) {
            return null;
        }

        return $post->lastModified()->toAtomString();
    },
    'entries' => function (PostRepositoryInterface $posts) {

        /* @var \Anomaly\PostsModule\Post\PostCollection $posts */
        $posts = $posts->all();

        return $posts->live();
    },
    'handler' => function (Sitemap $sitemap, Repository $config, PostInterface $entry) {

        $translations = [];

        $url = parse_url($entry->route('view'));

        foreach ($config->get('streams::locales.enabled') as $locale) {
            if ($locale != $config->get('streams::locales.default')) {
                $translations[] = [
                    'language' => $locale,
                    'url'      => url("{$url['scheme']}://{$url['host']}/{$locale}{$url['path']}"),
                ];
            }
        }

        $sitemap->add(
            url($entry->route('view')),
            $entry->lastModified()->toAtomString(),
            0.5,
            'monthly',
            [],
            null,
            $translations
        );
    },
];
