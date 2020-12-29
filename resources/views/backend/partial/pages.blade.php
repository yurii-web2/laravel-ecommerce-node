<table class="table table-hover">
    <thead class="">
    <tr>
        <th>Title</th>
        <th>URI</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody class="">
    @forelse($pages as $page)
        <tr class="">
            <td>{{ $page->title }}</td>
            <td><a href="{{ route('pages.show',$page->id ) }}">{{ $page->slug }}</a></td>

            @can('edit-page')
                <td><a href="{{ route('pages.edit',$page->id) }}"><i class="fa fa-edit"></i></a></td>
            @endcan

            <td>
                <form method="post" action="{{ route('pages.destroy',$page->id) }}" id="page-delete-{{ $page->id }}">
                    @csrf
                    @method('DELETE')
                    @can('delete-page')
                        <button type="submit" class="btn btn-link" onclick="if (confirm('Are You sure to Delete This Page?')) { document.getElementById('page-delete-{{ $page->id }}').submit(); } else { return false; }">
                            <i class="fa fa-trash text-danger"></i>
                        </button>
                    @endcan
                </form>
            </td>
        </tr>
        <tr>
            @empty
                <td colspan="4" class="text-center">No pages found.</td>
        </tr>
    @endforelse
    </tbody>
</table>
