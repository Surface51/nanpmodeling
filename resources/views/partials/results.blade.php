<table class="table table-bordered">
    <thead>
    <tr id='table-rows'>
        <th>Abbreviations</th>
        <th>Name</th>
    </tr>
    </thead>
    @if (isset($results) && count($results) > 0)
        @foreach( $results as $abbr )
        <tr>
            <td>{{ $abbr->abbreviation }}</td>
            <td>{{ $abbr->name}}</td>
        </tr>
    @endforeach
    @endif
</table>

<table class="table table-bordered">
    <thead>
    <tr id='table-rows'>
        <th>Abbreviations</th>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    @include('partials.abbreviations')
    </tbody>
</table>
