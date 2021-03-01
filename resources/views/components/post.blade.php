<!-- component -->

<div class=" text-grey-200 w-full px-10 my-2 py-1 bg-white rounded-lg shadow-md">
    <div class="flex justify-between items-center">
        <div class="flex justify-between items-center">

        @if(is_null($post->user->image))
            <img alt="a" width="48" height="48" class="hidden lg:block rounded-full w-10 h-10 mr-4 shadow-lg" src="https://cdn1.iconfinder.com/data/icons/technology-devices-2/100/Profile-512.png">
        @else 
            <img alt="a" width="48" height="48" class="hidden lg:block rounded-full w-10 h-10 mr-4 shadow-lg" src="{{ route('user.avatar', ['filename'=>$post->user->image])}}">
        @endif
            
            <div class="flex flex-row">
                <h3 class="text-center w-36 px-2 py-1 bg-gray-200 text-gray-900 font-bold rounded ">{{$post->user->nick}}</h3>
            </div>

           
        </div>

        <div class="m-3">
            <a class="text-1xl font-bold hover:text-indigo-600" href="{{route('post.index', ['id'=>$post->id])}}">{{$post->title}}</a>
        </div>

        <div class="flex flex-row ">
        <!-- <span class="flex flex-row font-light mr-2 justify-content"><?php echo substr($post->created_at, 0, 10);?></span>     -->

            <div class="hidden lg:block">
                <span class="text-center w-36 px-2 py-1 bg-gray-900 text-gray-100 font-bold rounded">
                    @switch($post->category_id)
                        @case(1)
                            Criptomonedas
                            @break
                        @case(2)
                            Bolsa
                            @break
                        @case(3)
                            Banca
                            @break
                        @case(4)
                            Actualidad
                            @break
                        @case(5)
                            Inversion
                            @break
                        @default
                            Otro
                            @break    
                    @endswitch
                </span>
            </div>

            
        </div>
    </div>
</div>