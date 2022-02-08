@props(['company'])
<section>
    <form method = "POST" action="/manage/flights/create">
        @csrf

        <input type="text" placeholder="City Name" name="name">

        <button type="submit" class="bg-red-500">
            Register new Flight
        </button>
    </form>
</section>