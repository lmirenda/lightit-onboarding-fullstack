<x-layout>
    <h1 class="text-3xl font-bold underline">
        Hello world!
      </h1>
    <div class="px-100"">
        @foreach ($flights as $flight)
            {{ $flight->origin->name }} to {{ $flight->destination->name }}
            <br>
        @endforeach
    </div>
</x-layout>