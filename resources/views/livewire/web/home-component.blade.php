<div>
    @foreach ($sections as $section)
    @if ($section->name === 'web-banner')
    <x-web-banner :banners="$banners" />
    @elseif ($section->name === 'web-featured-categories')
    <x-web-featured-categories :categories="$categories" />
    @elseif ($section->name === 'featured-services')
    <x-featured-services :featuredservices="$featuredservices" />
    @elseif ($section->name === 'top-services')
    <x-top-services :topservices="$topservices" />
    @elseif ($section->name === 'offering')
    <x-offering :offer="$offer" />
    @elseif ($section->name === 'work')
    <x-work />
    @elseif ($section->name === 'popular-services')
    <x-popular-services :popularservices="$popularservices" />
    @elseif ($section->name === 'packages')
    <x-packages :packages="$packages" />
    @elseif ($section->name === 'user-reviews')
    <x-reviews :userreviews="$userreviews" />
    @elseif ($section->name === 'blog')
    <x-blog :blogs="$blogs" />
    @elseif ($section->name === 'partner')
    <x-partner :partner="$partner" />
    @elseif($section->name === 'location')
    <x-web-location :cities="$cities" />
    @elseif ($section->name === 'app')
    <x-app :appl="$appl" />
    @endif
    @endforeach
</div>