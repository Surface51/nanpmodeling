@foreach($performances as $performance)
    <tr>
        <td><a href="/administrators-dashboard/performance-data/edit/{{$performance->id}}">Edit</a>
            |
            <a href="/administrators-dashboard/dietary-nutrients/remove/{{$performance->id}}">Delete</a></td>
        <td>{{ $performance->DataSet }}</td>
        <td>{{ $performance->PubID }}</td>
        <td>{{ $performance->TrialID }}</td>
        <td>{{ $performance->TrtID }}</td>
        <td>{{ $performance->SubjectID }}</td>
        <td>{{ $performance->Site_Sample }}</td>
        <td>{{ $performance->Day_Sample }}</td>
        <td>{{ $performance->Time_Sample }}</td>
        <td>{{ $performance->VarName }}</td>
        <td>{{ $performance->VarValue }}</td>
        <td>{{ $performance->VarUnits }}</td>
        <td>{{ $performance->N }}</td>
        <td>{{ $performance->SEM }}</td>
        <td>{{ $performance->SED }}</td>
        <td>{{ $performance->VarType }}</td>
    </tr>
@endforeach