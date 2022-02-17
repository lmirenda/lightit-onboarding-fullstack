<x-layout>
    <div class="container flex justify-center mx-auto my-3">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b border-gray-200 shadow">
                    <div class="container p-4">
                        <section class="">
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" />
                            <div class="card-body">
                                <input type="text" class="form-control mb-2" placeholder="Name.." id="name" />
                                <button onclick="addCompany()"
                                    class="w-full text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-8 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Register new Company
                                </button>
                            </div>
                        </section>
                    </div>
                    <table>
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    ID
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Company Name
                                </th>

                            </tr>
                        </thead>
                        <tbody class="bg-white" id="companies-list">
                            @foreach ($companies as $company)
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-2 text-sm text-gray-500">
                                        {{ $company->id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{ $company->name }}
                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="align-center">
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        let name = document.getElementById('name');

        async function addCompany() {

            let obj = {
                name: name.value
            };
            const res = await fetch('/manage/companies/', {
                method: 'POST',
                mode: 'cors',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(obj),
            })

            let data = await res.json();
            clearInput();
            createTableRule(data);
        }

        function createTableRule(data) {
            let row =
                `
                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-2 text-sm text-gray-500">
                                        ${data.id }
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            ${data.name }
                                        </div>
                                    </td>

                                </tr>
                `

            const table = document.getElementById('companies-list').innerHTML += row;
        }

        function clearInput() {
            name.value = ""
        }
    </script>
</x-layout>
