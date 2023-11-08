<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="display: flex; justify-content: space-between;">
            {{ __('User List') }}
            <span class="text-sm text-gray-600">Total Users: {{ count($users) }}</span>
        </h2>
    </x-slot>
    <head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
        <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>User #</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date Created</th>
                </tr>
            </thead>
            <tbody>
            @php
                $i = 1
            @endphp
                @foreach($users as $user)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @php
                        $currentDateTime = now(); // Current time
                        $createdAtDateTime = \Carbon\Carbon::parse($user->created_at); // Timestamp from the variable

                        $interval = $currentDateTime->diff($createdAtDateTime);

                        $timeElapsed = '';

                        if ($interval->d > 0) {
                            $timeElapsed .= $interval->d . ' day' . ($interval->d > 1 ? 's' : '') . ' ';
                        }

                        if ($interval->h > 0) {
                            $timeElapsed .= $interval->h . ' hour' . ($interval->h > 1 ? 's' : '') . ' ';
                        }

                        if ($interval->i > 0) {
                            $timeElapsed .= $interval->i . ' minute' . ($interval->i > 1 ? 's' : '') . ' ';
                        }

                        if ($interval->s > 0) {
                            $timeElapsed .= $interval->s . ' second' . ($interval->s > 1 ? 's' : '') . ' ';
                        }
                    @endphp
                    <td>{{ $timeElapsed }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
