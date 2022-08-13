<x-layouts.base title="Наш блог">
    <x-admin.base-layout>
            <a href="{{ route('posts.create') }}">Добавить пост</a>
            <hr>
            @can('admin-moderator')
                <div class="mb-4">
                    <h1>Новые посты</h1>
                    <hr>
                        @forelse($newPosts as $post)
                            <div class="btn-group gap-1">
                                <h2>{{ $post->title }}</h2>
                                <x-form method='get' action="{{ route('accept.post', $post->id) }}">
                                    <button class='btn btn-success btn-sm'>Принять</button>
                                </x-form>
                                <x-form method='get' action="{{ route('decline.post', $post->id) }}">
                                    <button class='btn btn-primary btn-sm'>Отклонить</button>
                                </x-form>
                            </div>
                            <em>{{ $post->created_at }}</em><br>
                            <a href="{{ route('posts.show', $post->id) }}">подробнее...</a>
                            <hr>
                        @empty
                            <em>Новых постов нет</em>
                        @endforelse
                </div>
            @endcan
            @can('admin-main')
                <div>
                    <h1>Все посты</h1>
                    <hr>
                    
                        @foreach($posts as $post)
                            <h2>{{ $post->title }}</h2>
                            <a href="{{ route('posts.show', $post->id) }}">подробнее...</a>
                            <p>{{ $post->status->text() }}</p>
                            <hr>
                        @endforeach
                
                    {{ $posts->links() }}
                </div>
            @endcan
            @can('admin-writer')
            <div>
                <h1>Мои посты</h1>
                <hr>
                    @foreach(auth()->user()->posts as $post)
                        <h2>{{ $post->title }}</h2>
                        <a href="{{ route('posts.show', $post->id) }}">подробнее...</a>
                        <p>{{ $post->status->text() }}</p>
                        <hr>
                    @endforeach
                {{ $posts->links() }}
            </div>
            @endcan
    </x-admin.base-layout>
</x-layouts.base>