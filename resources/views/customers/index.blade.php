 <x-layout>
     <h1>Patients</h1>

     <form action="{{ route('customers.index') }}" method="GET" class="d-flex mb-3 border-style: dashed">
         <input type="text" name="search" value="{{ request('search') }}" class="form-control me-2 bg-orange-400 border-2"
             placeholder="Search patient...">
         <button type="submit" class="btn btn-primary">Search</button>
     </form>

     @if (session('success'))
     <div class="p-4 text-center bg-orange text-green-500 font-bold  ">
         {{session('success')}}
     </div>
     @endif
     <ul>
         @foreach ($patients as $patient)
         <li>
             <x-card editvar="{{ route('customers.edit.store', $patient->id) }}"
                  
                 viewvar="{{ route('customers.show', $patient->id) }}"
                 visitvar="/customers/{{ $patient->id }}/visit"
                 meetings="/customers/{{ $patient->id }}/meetings"
                 :highlight="$patient['age'] > 50">

                 <h3>{{ $patient->name }}</h3>

             </x-card>
         </li>
         @endforeach
     </ul>
     {{ $patients->links() }}

 </x-layout>