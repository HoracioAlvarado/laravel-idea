<x-layout.layout>
    <div>
        <header class="py-8 md:py-12">
            <h1 class="text-3xl font-bold">Ideas</h1>
            <p class="text-muted-foreground text-sm mt-2">Capture your thoughts. Make a plan.</p>

            <x-card
                x-data
                @click="$dispatch('open-modal', 'create-idea')"
                is="button"
                type="button"
                aria-haspopup="dialog"
                class="mt-10 cursor-pointer h-32 w-full text-left"
            >
                <p>What's the idea?</p>
            </x-card>
        </header>

        <div>
            <a
                href="{{ route('idea.index') }}"
                class="btn {{ request()->has('status') ? 'btn-outlined' : '' }}"
            >All <span class="text-xs pl-1">{{ $statusCounts->get('all') }}</span></a>

            @foreach (App\IdeaStatus::cases() as $status)
                <a
                    href="{{ route('idea.index', ['status' => $status->value]) }}"
                    class="btn {{ request('status') === $status->value ? '' : 'btn-outlined' }}"
                >
                    {{ $status->label() }} <span class="text-xs pl-1">{{ $statusCounts->get($status->value) }}</span>
                </a>
            @endforeach
        </div>

        <div class="mt-10 text-muted-foreground">
            <div class="grid md:grid-cols-2 gap-6">

                @forelse($ideas as $idea)
                    <x-card href="{{ route('idea.show', $idea) }}">
                        <h3 class="text-foreground text-lg">{{ $idea->title }}</h3>
                        <div class="mt-1">
                            <x-idea.status-label status="{{ $idea->status }}">
                                {{ $idea->status->label() }}
                            </x-idea.status-label>
                        </div>

                        <div class="mt-5 line-clamp-3">{{ $idea->description }}</div>
                        <div class="mt-4">{{ $idea->created_at->diffForHumans() }}</div>
                    </x-card>

                @empty
                    <x-card>
                        <p>No ideas here.</p>
                    </x-card>
                @endforelse
            </div>
        </div>

        <!-- modal -->
        <x-modal
            title="Create an Idea"
            name="create-idea"
        >
            <p>I am a modal</p>
        </x-modal>
    </div>
</x-layout.layout>
