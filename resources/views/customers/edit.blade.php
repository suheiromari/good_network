<h2>Edit Patient</h2>

<form action="{{ route('customers.edit.store',[$patient->id] ) }}" method="POST">
    @csrf
     
    <label for="name">client Name:</label>
    <input type="text" name="name" value="{{ $patient->name }}">
    <label for="dob">dob</label>
    <input type="date" name="dob" value="{{ $patient->dob }}">
    <label for="phone">dob</label>
    <input type="text" name="phone" value="{{ $patient->phone }}">
    <label for="email">email</label>
    <input type="email" name="email" value="{{ $patient->email }}">
    

    <button type="submit">Update</button>
</form>
