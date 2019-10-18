@foreach($feeds as $name => $feed)
    <link rel="alternate" type="application/rss+xml" href="{{ route("feeds.{$name}") }}" title="{{ $feed['title'] }}">
@endforeach
