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
                class="px-2 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700"
              >Register new Company
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
  

    <script>
        let name =  document.getElementById('name');
        
        async function addCompany(){
        
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
            clearInput();
            createTableRule(data);
        }

        function createTableRule(data) {
            let row = 
                `
                    <tr>
                        <td>${data.id}</td>
                        <td>${data.name}</td>
                    </tr>
                `

            const table = document.getElementById('companies-list').innerHTML += row;
        }

        function clearInput(){
            name.value = ""
        }

    </script>
</x-layout>