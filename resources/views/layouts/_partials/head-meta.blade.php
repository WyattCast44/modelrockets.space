<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('page-title') - Model Rockets Space 🚀🌌</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="Model Rockets, Rocketry, Rockets, Model Rocket, Model Rocket Forum, Learn Rocketry">
<meta name="description" content="Welcome to Model Rockets Space - The home for model rocket and space enthusiasts">

<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="Model Rockets Space 🚀👩‍🚀👨‍🚀">
<meta name="twitter:description" content="Model Rockets Space | The home for model rocket and space enthusiasts">
<meta name="twitter:image" content="{{ asset('logo.png') }}">

<!-- Facebook -->
<meta property="og:type" content="website">
<meta property="og:locale" content="en_US"> 
<meta property="og:url" content="{{ route('home') }}">
<meta property="og:site_name" content="modelrockets.space">
<meta property="og:image" content="{{ asset('logo.png') }}">
<meta property="og:title" content="Model Rockets Space 🚀👩‍🚀👨‍🚀">
<meta property="og:description" content="Model Rockets Space | The home for model rocket and space enthusiasts">

<!-- Mobile -->
<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#4735AE">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#4735AE">
<meta name="mobile-web-app-capable" content="yes">

<!-- RSS Feeds -->
@include('feed::links')

@yield('meta')