<a {{ $attributes }}
 class="{{ $active ?  'text-white' : 'text-gray-400 hover:text-white'}} 
 rounded-md px-3 py-2 text-md font-medium font-sans"
 aria-current="{{$active ? 'page' : false}}">{{$slot}}</a>