@props([
    'title' => 'BitMart — Shop Online in Bangladesh',
    'description' => 'BitMart — modern online shopping with smart AI assistance. Shop fashion, lifestyle, electronics and more across Bangladesh with fast delivery.',
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Hind+Siliguri:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-neutral-0 pb-16 text-neutral-800 lg:pb-0">

    @include('partials.header')

    <main>
        {{ $slot }}
    </main>

    @include('partials.footer')

    @include('partials.mobile-nav')

    @include('partials.ai-sheet')

    @include('partials.quick-view')

    <div id="toast-root" class="pointer-events-none fixed inset-x-0 top-4 z-[60] flex flex-col items-center gap-2 px-4 lg:items-end lg:pr-6"></div>

</body>
</html>