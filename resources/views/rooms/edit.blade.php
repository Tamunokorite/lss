<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h1 class="text-5xl">Edit Room</h1>
        <form action="{{ route('rooms.update', $room) }}" method="post" class="mt-5">
            @csrf
            @method('patch')
            <div>
                <x-input-label for="number" value="Number" />
                <x-text-input id="number" type="text" class="mt-1 block w-full" :value="old('number', $room->number)" name="number" required />
            </div>
            <div>
                <x-input-label for="building" value="building" />
                <select name="building" id="building" class="form-control">
                    @foreach ($buildings as $building)
                        @if ($building->id == $room->building_id)
                        <option value="{{ $building->id }}" selected>{{ $building->name }}</option>
                        @else
                        <option value="{{ $building->id }}">{{ $building->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="flex items-center gap-4 mt-5">
                <x-primary-button>{{ _('Save') }}</x-primary-button>
                <a href="{{ URL::previous() }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
