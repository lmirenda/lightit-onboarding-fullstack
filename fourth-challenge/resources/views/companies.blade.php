<x-layout>
    @foreach ($companies as $company)
    {{ $company->name }}
    <br>
        
    @endforeach
</x-layout>