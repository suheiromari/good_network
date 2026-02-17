 <form action="{{ route('customers.visit.store', ['id' => $patient->id]) }}" method="POST">
   @csrf

   <h2>Create a New Visit</h2>

   <label>Patient Name:</label>
   <input type="text" value="{{ $patient->name }}" disabled>

   <input type="hidden" name="patient_id" value="{{ $patient->id }}">

   <label for="visit_date">Visit date:</label>
   <input
     type="date"
     id="visit_date"
     name="visit_date"
     required>
   <label for="diagnosis">diagnosis:</label>
   <input type="text" value="" name="diagnosis">

   <label for="notes">notes:</label>
   <input type="text" value="" name="notes">
   <br>
   <label for="prescription">Prescription:</label>
   <br>
   <textarea id="prescription" name="prescription" rows="10" cols="80" required></textarea>

   <br>

   <button type="submit" class="btn mt-4">Create Visit</button>


 </form>