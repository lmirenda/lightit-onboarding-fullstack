<x-layout>
    <div class="px-100"">
        @foreach ($flights as $flight)
            {{ $flight->origin->name }} to {{ $flight->destination->name }}
            <br>
        @endforeach
    </div>
</x-layout>