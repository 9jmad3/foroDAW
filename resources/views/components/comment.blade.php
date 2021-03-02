<div class="bg-white rounded-lg p-3  flex flex-col justify-center items-center md:items-start shadow-lg mb-4">
    <div class="flex flex-row justify-center mr-2">
        
        @if(is_null($comment->user->image))
            <img alt="a" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-1" src="https://cdn1.iconfinder.com/data/icons/technology-devices-2/100/Profile-512.png">
        @else 
            <img alt="a" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-1" src="{{ route('user.avatar', ['filename'=>$comment->user->image])}}">
        @endif
        
        <h3 class="text-purple-600 font-semibold text-lg text-center md:text-left ">{{$comment->user->nick}}</h3>
    </div>

    <p style="width: 90%" class="text-gray-600 text-lg text-center md:text-left ">{{$comment->body}}</p>
    <p style="width: 100%" class="text-gray-600 text-lg md:text-right ">{{$comment->created_at}}</p>

    <!--    falta alinear el boton a la derecha -->
    <!-- Si el comentario es del usuario logeado o el usuario logeado es un administrador, se muestra el boton para borrar el comentario. ACTUALMENTE NO ESTA IMPLANTADO
    EL ROL DE ADMINISTRADOR-->
    @if(Auth::user()->id == $comment->user->id || Auth::user()->role == 0)
        
            <form action="{{route('comment.delete')}}" method="post">
            @csrf
                <input type="text" value="{{$comment->id}}" name="comment_id" hidden>
                <input type="text" value="{{$post->id}}" name="post_id" hidden>
                
                    <button class="font-bold py-2 px-4 w-20 bg-purple-600 text-white rounded-lg">Borrar</button>    

            </form>
        
    @endif
</div>