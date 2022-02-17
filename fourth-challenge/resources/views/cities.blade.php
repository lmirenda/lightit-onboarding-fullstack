<x-layout>
    <div class="container flex justify-center mx-auto my-3">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b border-gray-200 shadow">
                    <div class="container p-4">
                        <section>
                            <form method="POST" action="/manage/cities/" id="add-city-form">
                                @csrf

                                <input type="text" placeholder="City Name" name="name" class="form-control my-1">

                                <button type="submit"
                                    class="w-full text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-8 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Register new City
                                </button>
                            </form>
                        </section>
                    </div>
                    <table>
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    ID
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    City Name
                                </th>

                            </tr>
                        </thead>
                        <tbody class="bg-white" id="city-list">
                            @foreach ($cities as $city)
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-2 text-sm text-gray-500">
                                        {{ $city->id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{ $city->name }}
                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="align-center">
                        {{ $cities->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#add-city-form').on('submit', function(e) {
                    e.preventDefault();
                    var form = this;
                    $.ajax({
                        url: $(form).attr('action'),
                        method: $(form).attr('method'),
                        data: $(form).serialize(),
                        success: function updateDiv(data) {
                            $('#city-list').prepend(
                                ` <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        ${ data.id }
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            ${ data.name }
                                        </div>
                                    </td>

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
