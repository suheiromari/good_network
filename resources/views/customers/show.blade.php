<x-layout>

  <h1> {{ $patient->name   }} </h1>
  <h1> age: {{ $patient->age }} </h1>



  {{-- more info --}}
  <div class="border-2 border-dashed bg-white px-4 pb-4 my-4 rounded">
    <h3>more Information</h3>
    <p><strong>date of birth:</strong> {{ $patient->dob }}</p>
    <p><strong>phone:</strong> {{ $patient->phone }}</p>
    <p><strong>email:</strong>{{ $patient->email }}</p>

  </div>


  {{-- delete button --}}

  <form action="{{ route('customers.destroy',  $patient->id  ) }}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn my-4 btnred">Delete Patient</button>
  </form>
</x-layout>