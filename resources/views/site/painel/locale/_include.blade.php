 <div class="btn-group dropleft">
  <button class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="flag-icon flag-icon-{{strtolower(app()->getLocale())}}"></span>
  </button>
  <div class="dropdown-menu">
   @foreach($locales as $k => $l)
 <a class="dropdown-item" href="{{ route('admin.locale',[strtolower($l->flag)]) }}" >
 	{!!$l->flagImage()!!} - {!!$l->title!!}
 </a>
 @endforeach
  </div>
</div>
