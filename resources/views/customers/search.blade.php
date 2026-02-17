<div class="container">

    <h4>Search results for: "{{ $query }}"</h4>

    @if ($patients->count() > 0)
        <table class="table table-bordered mt-3">
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>

            @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->phone }}</td>
                    <td>{{ $patient->email }}</td>
                    <td>
                        <a href="{{ route('customers.meetings', $patient->id) }}" class="btn btn-sm btn-info">
                            Meetings
                        </a>
                    </td>
                </tr>
            @endforeach

        </table>
    @else
        <div class="alert alert-warning mt-3">
            No patients found.
        </div>
    @endif

</div>
