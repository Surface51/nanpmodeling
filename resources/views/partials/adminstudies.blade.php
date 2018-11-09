@foreach($stdys as $stdy)
    <tr>
        <td><a href="/administrators-dashboard/study-descriptors/edit/{{$stdy->id}}">Edit</a>
            |
            <a href="/administrators-dashboard/study-descriptors/remove/{{$stdy->id}}">Delete</a></td>
        <td>{{ $stdy->DataSet }}</td>
        <td>{{ $stdy->PubID }}</td>
        <td>{{ $stdy->TrialID }}</td>
        <td>{{ $stdy->VarName }}</td>
        <td>{{ $stdy->VarValue }}</td>
        <td>{{ $stdy->VarUnits }}</td>
    </tr>
@endforeach