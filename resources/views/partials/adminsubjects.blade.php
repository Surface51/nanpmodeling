@foreach($subjects as $subject)
    <tr>
        <td><a href="/administrators-dashboard/subjects/edit/{{$subject->id}}">Edit</a>
            |
            <a href="/administrators-dashboard/subjects/remove/{{$subject->id}}">Delete</a></td>
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