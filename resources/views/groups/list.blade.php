<table class="default-table">
    <thead>
        <tr>
            <td>Group Name</td>
            <td>Institution</td>
            <td>User Adm</td>
            <td>Options</td>
        </tr>
    </thead>
    <tbody>
        @foreach($group_list as $group)
        <tr>
            <td>{{$group->name}}</td>
            <td>{{$group->institution->name}}</td>
            <td>{{$group->user->name}}</td> 
            <td>
                {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'delete']) !!}
                {!! Form::submit('Remove', ['class' => 'delete-button']) !!}
                {!! Form::close() !!}
                <br>
            <a href="{{ route('group.show', $group->id) }}" class="details-button">Details</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>