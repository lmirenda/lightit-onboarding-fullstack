<x-layout>

    <section>
        <form method = "POST" action="/manage/cities/" id="add-city-form">
            @csrf
    
            <input type="text" placeholder="City Name" name="name">
    
            <button type="submit" class="px-2 py-2 rounded bg-indigo-600">
                Register new City
            </button>
        </form>
    </section>

    <div id="city-list">

        @foreach ($cities as $city)
        <span>
            {{ $city->name }} 
            <br>
        </span>
        @endforeach

    </div>

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
                            `<span>
                                ${data.name}
                                <br>
                            </span>`
                        );
                        $(form)[0].reset();
                    }
                });
            });
        });
    </script>
    @endpush

</x-layout>