@foreach($invitros as $invitro)
    <tr>
        <td><a href="/administrators-dashboard/invitros/edit/{{$invitro->id}}">Edit</a>
            |
            <a href="/administrators-dashboard/invitros/remove/{{$invitro->id}}">Delete</a></td>
        <td>{{ $invitro->DataSet }}</td>
        <td>{{ $invitro->PubID }}</td>
        <td>{{ $invitro->TrialID }}</td>
        <td>{{ $invitro->TrtID }}</td>
        <td>{{ $invitro->SubjectID }}</td>
        <td>{{ $invitro->PlateID }}</td>
        <td>{{ $invitro->WellID }}</td>
        <td>{{ $invitro->SubTrtID }}</td>
        <td>{{ $invitro->Site_sample }}</td>
        <td>{{ $invitro->Cell_Type }}</td>
        <td>{{ $invitro->DaySampleofPeriod_InVivo }}</td>
        <td>{{ $invitro->DaySampleofPeriod_InVitro }}</td>
        <td>{{ $invitro->TimeSampleofPeriod_InVivo }}</td>
        <td>{{ $invitro->TimeSampleofPeriod_InVitro }}</td>
        <td>{{ $invitro->VarName }}</td>
        <td>{{ $invitro->VarValue }}</td>
        <td>{{ $invitro->VarUnits }}</td>
        <td>{{ $invitro->N }}</td>
        <td>{{ $invitro->SE }}</td>
        <td>{{ $invitro->SD }}</td>
        <td>{{ $invitro->VarType }}</td>
    </tr>
@endforeach