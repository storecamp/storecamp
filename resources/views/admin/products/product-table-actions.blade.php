<td align="center">
    <a class="btn btn-default edit" href="{{ route('admin::products::edit', $product->unique_id) }}"
       title="Edit">
        <em class="fa fa-pencil"></em></a>
    <a class="btn btn-danger delete text-warning"
       href="{{ route('admin::products::get::delete', $product->unique_id) }}"
       title="Are you sure you want to delete?"><em class="fa fa-trash"></em></a>
</td>