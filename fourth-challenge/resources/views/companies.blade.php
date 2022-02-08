{{-- <x-layout>

    <section>
        <div method = "POST" action="/manage/companies" id="add-company-form">
            @csrf
    
            <input type="text" placeholder="Company Name" name="name" id="company-name-input">
    
            <button id="button-add-company" onclick="process();" type="submit">
                Register new Company
            </button>
        </div>
    </section>

    @foreach ($companies as $company)
    {{ $company->name }}
    <br>
    @endforeach

    @push('scripts')
    <script>
        document.querySelector("#button-add-company").addEventListener('click', process()); 
        function process(){
            let obj = {
                name: document.querySelector('#company-name-input').value
            };
            const res = fetch('/manage/companies'), {
            headers:{
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            },
            mehtod: 'POST',
            body: JSON.stringify(obj)
            });

            const data = await res.json()
            console.log(data)
        }
    </script>
    @endpush
</x-layout> --}}

<x-layout>
    <div class="container p-4">
        <div class="card border-info">
           <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"/>
           <div class="card-body">
            <input
               type = "text"
               class = "form-control mb-2"
               placeholder = "Name.." 
               id = "name"
            />
            <button 
                onclick="addCompany()"
                class ="btn btn-info"
              >aceptar
            </button>
           </div>
        </div>               
   </div>
   <table>
       <thead>
           <tr>
               <th>Company Id </th>
               <th>Name</th>
           </tr>
       </thead>
       <tbody id="companies-list">
           @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                </tr>
            @endforeach
       </tbody>
   </table>
  

<!-- JavaScript-->

    <script>
        let name =  document.getElementById('name');
        
        async function addCompany(){
            console.log('click')
        
            let obj = { name:name.value };
            const res = await fetch('/manage/companies/', {
                method:'POST',
                mode: 'cors',
                headers:{
                    'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                },
                body:JSON.stringify(obj),      
            })
        
            let data = await res.json();
            console.log(data.id)
            await clearInput();
            document.querySelector('#companies-list').appendChild(
                `
                    <tr>
                        <td>${data.id}</td>
                        <td>${data.name}</td>
                    </tr>
                `
            )
        }
       

        function clearInput(){
            name.value = ""
        }

       

    </script>
</x-layout>