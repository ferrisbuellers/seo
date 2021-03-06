<div class="row">
    <div class="col-md-12">
        <table class="table table-responsive table-hover">
            <thead>
            <th>URL</th>
            <th>
                <a href="{{ route('seo-tools.index', [
                                                    'errors-sort' => 'hits',
                                                    'errors-sort-dir' => Request::get('errors-sort-dir') == 'asc' || !Request::get('errors-sort-dir') ? 'desc' : 'asc'
                                                    ]) }}"
                >
                    Amount of errors
                </a>
            </th>
            <th>
                <a href="{{ route('seo-tools.index', [
                                                    'errors-sort' => 'last_hit',
                                                    'errors-sort-dir' => Request::get('errors-sort-dir') == 'asc' || !Request::get('errors-sort-dir') ? 'desc' : 'asc'
                                                    ]) }}"
                >
                    Last error
                </a>
            </th>
            <th>
                <a href="{{ route('seo-tools.index', [
                                                    'errors-sort' => 'created_at',
                                                    'errors-sort-dir' => Request::get('errors-sort-dir') == 'asc' || !Request::get('errors-sort-dir') ? 'desc' : 'asc'
                                                    ]) }}"
                >
                    First reported
                </a>
            </th>
            <th>View requests</th>
            <th>Manage</th>
            </thead>
            <tbody>
            @foreach($errors as $error)
                <tr>
                    <td><a href="{{ url('/') }}/{{ $error->path }}">{{ url('/') }}/{{ $error->path }}</a></td>
                    <td>{{ $error->hits }}</td>
                    <td>{{ $error->last_hit->diffForHumans() }}</td>
                    <td>{{ $error->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('seo-tools.error.view', [$error->id]) }}" class="btn btn-xs btn-default">View requests</a>
                    </td>
                    <td>
                        @if ($error->redirect)
                            <a href="{{ route('seo-tools.error.edit', [$error->id]) }}" class="btn btn-xs btn-success">Manage redirect</a>
                        @else
                            <a href="{{ route('seo-tools.error.edit', [$error->id]) }}" class="btn btn-xs btn-primary">Add redirect</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $errors->render() !!}
    </div>
</div>