<table class="default-table">
    <thead>
        <tr>
            <td>#</td>
            <td>CPF</td>
            <td>Name</td>
            <td>Phone</td>
            <td>Birthdate</td>
            <td>Email</td>
            <td>Status</td>
            <td>Permission</td>
            <td>Options</td>
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
            <td>{{$user->id}}</td>
            <td>{{$user->Formatted_cpf}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->Formatted_phone}}</td>
            <td>{{$user->Formatted_birth}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->status}}</td>
            <td>{{$user->permission}}</td>
            <td>
                {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'delete']) !!}
                {!! Form::submit('Remove', ['class' => 'delete-button']) !!}
                {!! Form::close() !!}
                <br>
                <a href="{{ route('user.edit', $user->id) }}" class="edit-button">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>