@foreach($performances as $performance)
    <tr>
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
        <td>{{ $performance->SE }}</td>
        <td>{{ $performance->SD }}</td>
        <td>{{ $performance->VarType }}</td>
    </tr>
@endforeach