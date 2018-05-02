@foreach($stdys as $stdy)
    <tr>
        <td>{{ $stdy->DataSet }}</td>
        <td>{{ $stdy->PubID }}</td>
        <td>{{ $stdy->TrialID }}</td>
        <td>{{ $stdy->VarName }}</td>
        <td>{{ $stdy->VarValue }}</td>
        <td>{{ $stdy->VarUnits }}</td>
    </tr>
@endforeach