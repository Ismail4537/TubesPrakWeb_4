<a {{ $attributes }}
 class="{{ $active ?  'bg-blue-600 text-white' : 'text-gray-400 hover:bg-slate-800 hover:text-white'}} 
 flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 group"
 aria-current="{{$active ? 'page' : false}}">{{$slot}}</a>


