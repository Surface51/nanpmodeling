@foreach($infusions as $infusion)
<tr>
    <td>{{ $infusion->DataSet }}</td>
    <td>{{ $infusion->PubID }}</td>
    <td>{{ $infusion->TrialID }}</td>
    <td>{{ $infusion->TrtID }}</td>
    <td>{{ $infusion->SubjectID }}</td>
    <td>{{ $infusion->InfusionLocation }}</td>
    <td>{{ $infusion->VarName }}</td>
    <td>{{ $infusion->VarValue }}</td>
    <td>{{ $infusion->VarUnits }}</td>
    <td>{{ $infusion->DayofPeriodStart }}</td>
    <td>{{ $infusion->DayofPeriodStop }}</td>
    <td>{{ $infusion->TimeofDayStart }}</td>
    <td>{{ $infusion->TimeofDayStop }}</td>
</tr>
@endforeach