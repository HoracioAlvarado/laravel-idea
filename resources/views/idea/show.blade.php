<x-layout>
    <div class="py-8 max-w-4xl mx-auto">
        <div class="flex justify-between">
            <a
                href="{{ route('idea.index') }}"
                class="flex items-center gap-x-2 text-sm font-medium"
            >Back to Ideas
            </a>
            <div class="gap-x-3 flex items-center">
                <button class="btn btn-outlined">Edit Idea</button>

                <form
                    action="{{ route('idea.destroy', $idea) }}"
                    method="POST"
                >
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        class="btn btn-outlined text-red-500"
                    >Delete Idea</button>
                </form>
            </div>
        </div>
        <div class="mt-8 space-y-6">
            <h1 class="font-bold text-4xl">{{ $idea->title }}</h1>

            <div class="mt-2 flex gap-x-3 items-center">
                <x-idea.status-label :status="$idea->status->value">
                    {{ $idea->status->label() }}
                </x-idea.status-label>

                <div class="text-muted-foreground text-sm">{{ $idea->created_at->diffForHumans() }}</div>

            </div>


            <x-card class="mt-6">
                <div class="text-foreground max-w-none cursor-pointer">
                    {{ $idea->description }}
                </div>
            </x-card>

            @if ($idea->steps->count())
                <div>
                    <h3 class="font-bold text-xl mt-6">Steps</h3>

                    <div class="mt-6 space-y-2">
                        @foreach ($idea->steps as $step)
                            <x-card>
                                <form
                                    action="{{ route('step.update', $step) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <div class="flex items-center gap-x-3">
                                        <button
                                            type="submit"
                                            role="checkbox"
                                            class="size-5 flex items-center justify-center rounded-lg text-primary-foreground border border-primary {{ $step->completed ? 'bg-primary' : '' }}"
                                        >&check; </button>
                                        <span
                                            class="{{ $step->completed ? 'line-through text-muted-foreground' : '' }}">{{ $step->description }}</span>
                                    </div>
                                </form>
                            </x-card>
                        @endforeach
                    </div>
                </div>
            @endif


            @if ($idea->links->count())
                <div>
                    <h3 class="font-bold text-xl mt-6">Links</h3>

                    <div class="mt-6 space-y-2">
                        @foreach ($idea->links as $link)
                            <x-card
                                href="{{ $link }}"
                                class="text-primary font-medium flex gap-x-3 items-center"
                            >{{ $link }}</x-card>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layout>
