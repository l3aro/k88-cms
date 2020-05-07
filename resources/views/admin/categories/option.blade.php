@forelse ($categories as $item)
<option value="{{ $item->id }}"
    {{ isset($category)&&$category->parent_id===$item->id ? 'selected' : '' }}>
    @for ($i = 0; $i < $level; $i++)
    --|
    @endfor
    {{ $item->name }}
</option>
@includeWhen($item->sub->count(), 'admin.categories.option', [
    'level' => $level + 1,
    'categories' => $item->sub
])
@empty
@endforelse
