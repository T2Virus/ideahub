<div class="list-group" >
    <a href="{{route('home')}}" class="list-group-item"><i class="fa fa-server" aria-hidden="true"></i>&nbsp; Home</a>
    @if(!Auth::guard('investor')->check())
    <a href="{{route('idea.create')}}" class="list-group-item"><i class="fa fa-check-square" aria-hidden="true"></i>&nbsp; Create Idea</a>
    @endif
    <a href="{{route('idea.own')}}" class="list-group-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> &nbsp; My @if(Auth::guard('investor')->check()) Invested @endif Ideas</a>
    {{-- <a href="{{route('idea.search')}}" class="list-group-item"><i class="fa fa-search" aria-hidden="true"></i>&nbsp; Search Idea</a> --}}
</div>