<x-app-layout>
    <div class="container mx-auto px-4 py-10">

        <h1 class="text-4xl font-bold mb-8">Browse Movies</h1>

        <!-- Movies Grid -->
        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

            @foreach ($movies as $movie)
                <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition duration-300">

                    <!-- Poster -->
                    <figure class="relative">
                        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}"
                            class="w-full h-[450px] object-cover" />

                        <!-- Rating badge -->
                        <div class="badge badge-warning absolute top-3 right-3">
                            ⭐ {{ $movie['vote_average'] }}
                        </div>
                    </figure>

                    <!-- Card Body -->
                    <div class="card-body p-4">
                        <h2 class="card-title text-base">
                            {{ $movie['title'] }}
                        </h2>

                        <p class="text-sm opacity-70 line-clamp-3">
                            {{ $movie['overview'] }}
                        </p>

                        <div class="card-actions justify-end mt-3">
                            <a href="{{ route('movies.show', $movie['id']) }}" class="btn btn-sm btn-primary">
                                More Details
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>
        <div class="flex justify-center my-12">
            <div class="join shadow-sm border border-base-300">
                <a href="{{ route('movies', ['page' => max(1, $current_page - 1)]) }}"
                    class="join-item btn btn-md {{ $current_page <= 1 ? 'btn-disabled' : '' }}">
                    «
                </a>

                @foreach(range(max(1, $current_page - 2), min($pages, $current_page + 2)) as $p)
                    <a href="{{ route('movies', ['page' => $p]) }}"
                        class="join-item btn btn-md {{ $current_page == $p ? 'btn-primary' : '' }}">
                        {{ $p }}
                    </a>
                @endforeach

                <a href="{{ route('movies', ['page' => min($pages, $current_page + 1)]) }}"
                    class="join-item btn btn-md {{ $current_page >= $pages ? 'btn-disabled' : '' }}">
                    »
                </a>
            </div>
        </div>

    </div>

</x-app-layout>