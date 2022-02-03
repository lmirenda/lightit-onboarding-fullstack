<x-layout>

    <section>
        <form method = "POST" action="/manage/cities/create">
            @csrf
    
            <input type="text" placeholder="City Name" name="name">
    
            <button type="submit">
                Register new City
            </button>
        </form>
    </section>

    @foreach ($cities as $city)
    {{ $city->name }} 
    <br>
    @endforeach


</x-layout>