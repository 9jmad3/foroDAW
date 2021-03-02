<!-- VISTA PRINCIPAL DE UN POST DONDE CARGAMOS EL POST, LOS COMENTARIOS Y EL FORMULARIO PARA COMENTAR EN EL -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('General') }}
        </h2>
    </x-slot>

    @isset($status)   
        @include('components.message-status')
    @endisset

    <div> 
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">  
            <div class="container my-6 mx-auto px-4 md:px-12">

                <!-- POST -->
                    <div class="">
                        <div class="overflow-hidden shadow-md">
                            <!-- card header -->
                            <div class="flex px-6 py-4 bg-white border-b border-gray-200 font-bold uppercase justify-between align-middle">
                                {{$post->title}}

                                @if(is_null($post->user->image))
                                    <img alt="a" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-1" src="https://cdn1.iconfinder.com/data/icons/technology-devices-2/100/Profile-512.png">
                                @else 
                                    <img alt="a" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-1" src="{{ route('user.avatar', ['filename'=>$post->user->image])}}">
                                @endif
                            </div>

                            <!-- card body -->
                            <div class="p-6 bg-white border-b border-gray-200">
                                <!-- content goes here -->
                                {{$post->body}}
                            </div>

                            <!-- card footer -->
                            <div class="p-6 bg-white border-gray-200 text-right">

                            @if(Auth::user()->id == $post->user_id || Auth::user()->id == 0)
                                
                                <div class="flex justify-end">
                                    <!-- Editar post -->
                                    
                                    <a class="font-bold py-2 px-4 w-50 bg-purple-600 text-white rounded-lg ml-1 mr-1" href="{{route('post.edit', ['post'=>$post])}}">Editar post</a>
                                
                                    <!-- Borrar post -->
                                    <form action="{{route('post.delete')}}" method="post">
                                        @csrf
                                        <input type="text" value="{{$post->id}}" name="post_id" hidden>
                                        <button class="font-bold py-2 px-4 w-50 bg-purple-600 text-white rounded-lg ml-1">Borrar post</button>    
                                    </form>
                                   
                                </div>
                                
                            @endif
                                <!-- button link -->
                                <!-- <a class="bg-blue-500 shadow-md text-sm text-white font-bold py-3 md:px-8 px-4 hover:bg-blue-400 rounded uppercase" 
                                    href="#">Comentar</a> -->
                            </div>
                        </div>
                    </div>

                    <!-- divider -->
                    <hr class="my-6"> 

                    <div>

                    <!-- COMENTARIOS -->
                    @isset($post->comments)
                        @foreach ($post->comments as $comment)
                            @include('components.comment')
                        @endforeach
                    @endisset
                    <!-- FIN COMENTARIOS -->

                        <section class="rounded-b-lg  mt-4 ">

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        
                        <!-- CAJA COMENTARIO -->
                        <form action="{{route('comment.store')}}" accept-charset="UTF-8" method="post"><input type="hidden" >
                        @csrf
                            <textarea name="idPost" id="idPost" cols="30" rows="10" hidden>{{$post->id}}</textarea>
                            <textarea class="w-full shadow-inner p-4 border-0 mb-4 rounded-lg focus:shadow-outline" cols="6" rows="3" id="comment_body" name="comment_body" spellcheck="false"></textarea>
                            <button class="font-bold py-2 px-4 w-full bg-purple-600 text-lg text-white shadow-md rounded-lg ">Comentar</button>
                        </form>

                        </section>
                </div>
            </div> 
        </div>
    </div>
</x-app-layout>
