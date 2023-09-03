<table class="default-table">
    <thead>
        <tr>
            <th>#</th>
            <th>CPF</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Status</th>
            <th>Permission</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user_list as $user)
        <tr>
            <td>
                @if($user)
                {{ $user->id }}
                @else
                N/A
                @endif
            </td>
            <td>{{$user->Formatted_cpf}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->Formatted_phone}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->status}}</td>
            <td>{{$user->permission}}</td>
            <td>
                {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'delete', 'class' => 'inline-form'] ) !!}
                {!! Form::submit('Remove', ['class' => 'delete-button']) !!}
                {!! Form::close() !!}
                <a href="{{ route('user.edit', $user->id) }}" class="edit-button">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>