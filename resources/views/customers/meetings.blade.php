  @csrf
  <h2>Meetings / Visits for {{ $patient->name }}</h2>

  @forelse ($patient->visits as $visit)
  <div class="card mb-3 p-3">
      <p><strong>Prescription:</strong> {{ $visit->prescription }}</p>
      <p><strong>Date:</strong> {{ $visit->visit_date }}</p>


      {{-- VITALS --}}
      @if ($visit->vital)
      <hr>
      <p><strong>Temperature:</strong> {{ $visit->vital->temperature }} °C</p>
      <p><strong>Blood Pressure:</strong>
          {{ $visit->vital->bp_systolic }}/{{ $visit->vital->bp_diastolic }} mmHg
      </p>
      <p><strong>Heart Rate:</strong> {{ $visit->vital->heart_rate }} bpm</p>
      <p><strong>Respiratory Rate:</strong> {{ $visit->vital->respiratory_rate }} /min</p>
      <p><strong>Oxygen Saturation:</strong> {{ $visit->vital->oxygen_saturation }} %</p>
      <p><strong>Weight:</strong> {{ $visit->vital->weight }} kg</p>
      <hr>
      @else
      <hr>
      <p class="text-warning"><strong>No vitals recorded.</strong></p>

      <a href="{{ route('vitals.create', $visit->id) }}" class="btn btn-sm btn-primary">
          Add Vitals
      </a>
      @endif
  </div>
  @empty
  <p>No visits yet.</p>
  @endforelse