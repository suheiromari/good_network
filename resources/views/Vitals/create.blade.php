<x-layout>

    <h2 class="text-2xl font-bold mb-4">Enter Vitals</h2>

    {{-- Patient / Visit Info --}}
    <div class="mb-4 p-4 bg-gray-100 rounded">
        <p><strong>Patient:</strong> {{ $visit->patient->name }}</p>
        <p><strong>Visit Date:</strong> {{ $visit->visit_date }}</p>
    </div>

    <form action="{{ route('vitals.store' , $visit->id) }}" method="POST" class="space-y-4">
        @csrf
        <input type="hidden" name="visit_id" value="{{ $visit->id }}">
        {{-- Temperature --}}
        <div>
            <label class="block">Temperature (°C)</label>
            <input type="number" step="0.1" name="temperature" class="input" required>
        </div>

        {{-- Blood Pressure --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block">Systolic (mmHg)</label>
                <input type="number" name="bp_systolic" class="input" required>
            </div>

            <div>
                <label class="block">Diastolic (mmHg)</label>
                <input type="number" name="bp_diastolic" class="input" required>
            </div>
        </div>

        {{-- Heart Rate --}}
        <div>
            <label class="block">Heart Rate (BPM)</label>
            <input type="number" name="heart_rate" class="input" required>
        </div>

        {{-- Respiratory Rate --}}
        <div>
            <label class="block">Respiratory Rate</label>
            <input type="number" name="respiratory_rate" class="input" required>
        </div>

        {{-- Oxygen Saturation --}}
        <div>
            <label class="block">Oxygen Saturation (%)</label>
            <input type="number" step="0.01" name="oxygen_saturation" class="input" required>
        </div>

        {{-- Weight --}}
        <div>
            <label class="block">Weight (kg)</label>
            <input type="number" step="0.01" name="weight" class="input" required>
        </div>

        {{-- Submit --}}
        <div class="pt-4">
            <button type="submit" class="btn">
                Save Vitals
            </button>
        </div>

    </form>

</x-layout>