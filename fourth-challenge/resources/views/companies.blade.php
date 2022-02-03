<x-layout>

    <section>
        <form method = "POST" action="/manage/companies/create">
            @csrf
    
            <input type="text" placeholder="Company Name" name="name">
    
            <button type="submit">
                Register new Company
            </button>
        </form>
    </section>

    @foreach ($companies as $company)
    {{ $company->name }}
    <br>
        
    @endforeach
</x-layout>