<x-layout>
  <form action="{{ route('customers.store')}}" method="POST">
    @csrf
    <h2>Create a New patient</h2>

    <!-- patient Name -->
    <label for="name">Patient Name:</label>
    <input
      type="text"
      id="name"
      name="name"
      value="{{ old('name') }}"
      required>

    <!-- patient info -->
    <label for="dob"> Date of Birth:</label>
    <input
      type="date"
      id="dob"
      name="dob"
      required>


    <label for="phone">phone:</label>
    <input type="string" id="phone" name="phone" required>

    <label for="email">email:</label>
    <input type="string" id="email" name="email" required>


    </select>

    <button type="submit" class="btn mt-4">Create patient</button>

    <!-- validation errors -->

  </form>

</x-layout>