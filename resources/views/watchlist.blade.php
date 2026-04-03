<x-app-layout>
    <div class="py-12 min-h-screen bg-base-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
                <div>
                    <h1 class="text-4xl font-black tracking-tight text-base-content">My Watchlist</h1>
                    <p class="text-base-content/60 mt-1">You have {{ $watchlist->count() }} movies in your collection.
                    </p>
                </div>
                <a href="{{ route('movies') }}" class="btn btn-primary rounded-xl px-8 shadow-lg">
                    + Browse More
                </a>
            </div>

            @if($watchlist->isEmpty())
                <div
                    class="flex flex-col items-center justify-center py-20 bg-base-100 rounded-3xl border-2 border-dashed border-base-300">
                    <div class="text-6xl mb-4 opacity-20">🎬</div>
                    <h2 class="text-2xl font-bold opacity-80">Your list is empty</h2>
                    <p class="text-base-content/50 mb-6">Start adding movies you want to watch!</p>
                    <a href="{{ route('movies') }}" class="btn btn-outline">Go to Movies</a>
                </div>
            @else
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                    @foreach($watchlist as $item)
                        <div
                            class="group relative bg-base-100 rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl border border-base-300">

                            <div class="aspect-[2/3] relative overflow-hidden">
                                <img src="https://image.tmdb.org/t/p/w500/{{ $item->poster_path }}" alt="{{ $item->title }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                                <div class="absolute top-2 left-2">
                                    @if($item->status == 'completed')
                                        <div class="badge badge-success gap-1 font-bold shadow-md">✅ Done</div>
                                    @elseif($item->status == 'watching')
                                        <div class="badge badge-secondary gap-1 font-bold shadow-md">🍿 Watching</div>
                                    @else
                                        <div class="badge badge-ghost bg-base-100/80 backdrop-blur-sm gap-1 font-bold shadow-md">📅
                                            Plan</div>
                                    @endif
                                </div>
                            </div>

                            <div class="p-4">
                                <h3 class="font-bold text-sm line-clamp-1 mb-4 text-base-content">{{ $item->title }}</h3>

                                <a href="{{ route('movies.show', $item->movie_id) }}"
                                    class="btn btn-sm btn-block btn-primary btn-outline border-2 rounded-lg group-hover:bg-primary group-hover:text-primary-content transition-colors">
                                    View Details
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>