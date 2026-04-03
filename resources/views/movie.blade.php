<x-app-layout>
    <x-slot:title>{{ $movie['title'] }}</x-slot:title>

    <div class="hero min-h-[60vh] relative"
        style="background-image: url('https://image.tmdb.org/t/p/original{{ $movie['backdrop_path'] }}');">
        <div class="hero-overlay bg-opacity-80 bg-black"></div>

        <div class="hero-content flex-col lg:flex-row gap-10 text-white">
            <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                class="max-w-sm rounded-lg shadow-2xl border border-gray-700" />

            <div>
                <h1 class="text-5xl font-bold">{{ $movie['title'] }}</h1>

                <div class="flex gap-4 my-4">
                    <div class="badge badge-warning">⭐ {{ $movie['vote_average'] }}</div>
                    <div class="badge badge-outline text-white">{{ $movie['release_date'] }}</div>
                    <div class="badge badge-outline text-white">{{ $movie['runtime'] }} min</div>
                </div>

                <p class="py-6 text-lg">{{ $movie['overview'] }}</p>

                <div class="flex gap-2">
                    @auth
                        <a href="https://vidsrc-embed.ru/embed/movie/{{ $movie['id'] }}" class="btn btn-primary">Watch
                            Now</a>

                        <form action="{{ route('watchlist.store') }}" method="POST" class="flex flex-col gap-2">
                            @csrf
                            <input type="hidden" name="movie_id" value="{{ $movie['id'] }}">
                            <input type="hidden" name="title" value="{{ $movie['title'] }}">
                            <input type="hidden" name="poster_path" value="{{ $movie['poster_path'] }}">

                            <div class="join">
                                <select name="status" class="select select-bordered join-item select-sm">
                                    <option value="plan_to_watch">Plan to Watch</option>
                                    <option value="watching">Watching</option>
                                    <option value="completed">Completed</option>
                                </select>
                                <button class="btn btn-ghost border-white text-white">Add to List</button>
                            </div>
                        </form>

                    @else
                        <a href="/login" class="btn btn-primary">Login to Stream</a>
                    @endauth

                </div>
            </div>
        </div>
    </div>

    <div class="p-10">
        <h2 class="text-2xl font-bold mb-6">Cast</h2>
        <div class="grid grid-cols-2 md:grid-cols-6 gap-4">
            {{-- We just loop through the cast array directly --}}
            @foreach($movie['credits']['cast'] as $actor)
                {{-- This stops the loop after 6 people without using 'collect' --}}
                @if($loop->index < 6)
                    <div class="card bg-base-100 shadow-xl border border-base-300">
                        <figure>
                            <img src="https://image.tmdb.org/t/p/w185{{ $actor['profile_path'] }}" alt="{{ $actor['name'] }}" />
                        </figure>
                        <div class="p-2 text-center">
                            <p class="text-xs font-bold">{{ $actor['name'] }}</p>
                            <p class="text-[10px] opacity-60">{{ $actor['character'] }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>