<header class="mb-8 flex justify-between items-center">
    <div>
        <h1>{{ $title }}</h1>
        <h3>{{ $description }}</h3>
    </div>
    <a href="{{ route($path) }}" class="btn-primary">{{ $button }}</a>
</header>
