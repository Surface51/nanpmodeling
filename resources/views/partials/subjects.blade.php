@foreach($subjects as $subject)
    <tr>
        <td>{{ $subject->DataSet }}</td>
        <td>{{ $subject->PubID }}</td>
        <td>{{ $subject->TrialID }}</td>
        <td>{{ $subject->TrtID }}</td>
        <td>{{ $subject->SubjectID }}</td>
        <td>{{ $subject->VarName }}</td>
        <td>{{ $subject->Varvalue }}</td>
        <td>{{ $subject->VarUnits }}</td>
        <td>{{ $subject->N }}</td>
        <td>{{ $subject->SE }}</td>
        <td>{{ $subject->SD }}</td>
    </tr>
@endforeach