
<ol class="dd-list">
  @foreach ($menus[$menu->id] as $level)
  <li class="dd-item" data-id="{{ $level->id }}">
    <div class="dd-handle">
      {!! $level->title !!}
      <span class="float-right dd-nodrag">
        <a class="menu-edit-btn" href="{{route('admin.menu.edit',['id'=>$level->id])}}"><i class="fa fa-edit fa-edit"></i></a>
        &nbsp; 
        <a class="menu-delete-btn" data-id="{{ $level->id }}" class="remove_menu"><i class="fa fa-trash fa-edit"></i></a>
      </span>
    </div>
    @if (isset($menus[$level->id]) && count($menus[$level->id]))
          @include('setting::menu.includes.submenuListing',['menu'=>$menu])

    @endif
  </li>
  @endforeach
</ol>
