<x-layout>

    <section>
        <form method = "POST" action="/manage/cities/" id="add-city-form">
            @csrf
    
            <input type="text" placeholder="City Name" name="name" class="form-control">
    
            <button type="submit" class="px-2 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700">
                Register new City
            </button>
        </form>
    </section>

    <table>
        <thead>
            <tr>
                <th>City ID</th>
                <th>Company Name</th>
            </tr>
        </thead>

        <tbody id="city-list">
            @foreach ($cities as $city)
            <tr>
                <td>{{ $city->id }} </td>
                <td>{{ $city->name }} </td>
            </tr>
            @endforeach
        
        </tbody>
    </table>


    @push('scripts')
    <script>
        $( document ).ready(function(){
            $('#add-city-form').on('submit', function(e){
                e.preventDefault();
                var form = this;
                $.ajax({
                    url:$(form).attr('action'),
                    method:$(form).attr('method'),
                    data: $(form).serialize(),
                    success: function updateDiv(data)
                    { 
                        $('#city-list').prepend(
                            `<tr>
                                <td>${data.id} </td>
                                <td>${data.name} </td>
                            </tr>`
                        );
                        $(form)[0].reset();
                        
                    }
                });
            });
        });
    </script>
    @endpush

</x-layout>