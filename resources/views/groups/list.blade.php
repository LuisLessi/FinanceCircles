<table class="default-table">
    <thead>
        <tr>
            <td>Group Name</td>
            <td>Value</td>
            <td>Institution</td>
            <td>User Adm</td>
            <td>Options</td>
        </tr>
    </thead>
    <tbody>
        @foreach($group_list as $group)
        <tr>
            <td>{{$group->name}}</td>
            <td>$ {{ number_format($group->totalValue, 2, ',', '.') }}</td>
            <td>{{$group->institution->name}}</td>
            <td>{{$group->user->name}}</td> 
            <td>
                {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'delete', 'class' => 'inline-form']) !!}
                {!! Form::submit('Remove', ['class' => 'delete-button']) !!}
                {!! Form::close() !!}
            <a href="{{ route('group.show', $group->id) }}" class="details-button">Details</a>
            <a href="{{ route('group.edit', $group->id) }}" class="edit-button">Edit</a>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>