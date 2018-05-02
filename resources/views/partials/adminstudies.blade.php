@foreach($stdys as $stdy)
    <tr>
        <td><a href="/administrators-dashboard/study-descriptors/edit/{{$stdy->DataSet . $stdy->PubID . $stdy->TrialID}}">Edit</a>
            |
            <a href="/administrators-dashboard/study-descriptors/remove/{{$stdy->DataSet . $stdy->PubID . $stdy->TrialID}}">Delete</a></td>
        <td>{{ $stdy->DataSet }}</td>
        <td>{{ $stdy->PubID }}</td>
        <td>{{ $stdy->TrialID }}</td>
        <td>{{ $stdy->VarName }}</td>
        <td>{{ $stdy->VarValue }}</td>
        <td>{{ $stdy->VarUnits }}</td>
    </tr>
@endforeach