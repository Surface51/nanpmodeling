@foreach($invitros as $invitro)
    <tr>
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
        <td>{{ $invitro->Day_Sample }}</td>
        <td>{{ $invitro->Time_Sample }}</td>
        <td>{{ $invitro->VarName }}</td>
        <td>{{ $invitro->Varvalue }}</td>
        <td>{{ $invitro->VarUnits }}</td>
        <td>{{ $invitro->N }}</td>
        <td>{{ $invitro->SE }}</td>
        <td>{{ $invitro->SD }}</td>
        <td>{{ $invitro->VarType }}</td>
    </tr>
@endforeach