<x-layout>
    @foreach ($cities as $city)
    {{ $city->name }} 
    <br>
    @endforeach
</x-layout>