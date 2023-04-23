<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h1 class="text-5xl">Add Room</h1>
        <form action="{{ route('rooms.store') }}" method="post" class="mt-5">
            @csrf
            <div>
                <x-input-label for="number" value="Number" />
                <x-text-input id="number" type="text" class="mt-1 block w-full" :value="old('number')" name="number" required />
            </div>
            <div>
                <x-input-label for="building" value="Building" />
                <select name="building" id="building" class="form-control">
                    @foreach ($buildings as $building)
                        @if ($building->id == \Request::get('building'))
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
