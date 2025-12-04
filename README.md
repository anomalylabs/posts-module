# Posts Module

*anomaly.module.posts*

#### A versatile articles and posts manager.

The Posts Module provides a flexible blogging and article management system with categories, tags, and multiple post types.

## Features

- Post management
- Category organization
- Tag support
- Multiple post types
- Draft & scheduling
- Featured posts
- RSS feeds
- SEO optimization

## Usage

### Accessing Posts

```php
use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;

$posts = app(PostRepositoryInterface::class);

// Get all posts
$allPosts = $posts->all();

// Get published posts
$published = $posts->findAllPublished();

// Get post by slug
$post = $posts->findBySlug('my-article');

// Get posts by category
$posts = $posts->findByCategory($category);
```

### In Twig

```twig
{# List posts #}
{% for post in posts().published().get() %}
    <article>
        <h2><a href="{{ post.path }}">{{ post.title }}</a></h2>
        <p>{{ post.summary }}</p>
        <time>{{ post.publish_at|date('F j, Y') }}</time>
    </article>
{% endfor %}

{# Display single post #}
<article>
    <h1>{{ post.title }}</h1>
    <time>{{ post.publish_at|date('F j, Y') }}</time>
    <div>{{ post.content|raw }}</div>
    
    {# Categories & Tags #}
    {% for category in post.categories %}
        <span>{{ category.name }}</span>
    {% endfor %}
    
    {% for tag in post.tags %}
        <span>{{ tag.name }}</span>
    {% endfor %}
</article>

{# Recent posts #}
{% for post in posts().published().orderBy('publish_at', 'desc').limit(5).get() %}
    <a href="{{ post.path }}">{{ post.title }}</a>
{% endfor %}
```

### Categories & Tags

```twig
{# All categories #}
{% for category in categories().get() %}
    <a href="{{ url_route('anomaly.module.posts::category', [category.slug]) }}">
        {{ category.name }}
    </a>
{% endfor %}

{# All tags #}
{% for tag in tags().get() %}
    <a href="{{ url_route('anomaly.module.posts::tag', [tag.slug]) }}">
        {{ tag.name }}
    </a>
{% endfor %}
```

## Requirements

- Streams Platform ^1.10
- PyroCMS 3.10+

## License

The Posts Module is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
