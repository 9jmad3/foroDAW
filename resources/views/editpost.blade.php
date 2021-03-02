<!-- VISTA DE EDICION DE UN POST -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('General') }}
        </h2>
    </x-slot>
    <div> 
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">  
            <div class="container my-6 mx-auto px-4 md:px-12">
                <!-- POST -->
                <form action="{{route('post.update', ['post'=>$post])}}" accept-charset="UTF-8" method="post">
                @csrf
                    <div class="">
                        <div class="overflow-hidden shadow-md">
                            <!-- card header -->
                            <div class="px-6 pt-4 bg-white border-gray-200 font-bold">
                            <input class="rounded-lg title bg-gray-100 border border-gray-200 p-2 mb-4 outline-none w-full" spellcheck="false" placeholder="Titulo" type="text" name="title" value="{{$post->title}}">
                            </div>

                            <!-- card body -->
                            <div class="pl-6 pr-6 pb-6  bg-white border-gray-200">
                            <textarea class="rounded-lg description bg-gray-100 sec p-3 h-60 border border-gray-200 outline-none w-full" spellcheck="false" placeholder="Contenido..." name="body">{{$post->body}}</textarea> 
                            </div>

                            
                            <div class="pl-6 pr-6 pb-6  bg-white border-b border-gray-200">
                                <select name="category_id" class="rounded-lg mt-2 title bg-gray-100 border border-gray-200 p-2 mb-4 outline-none w-full">
                                    <option value="1" {{ old('category_id', $post->category_id) == 1 ? ' selected' : '' }}>Criptomodenas</option>
                                    <option value="2" {{ old('category_id', $post->category_id) == 2 ? ' selected' : '' }}>Bolsa</option>
                                    <option value="3" {{ old('category_id', $post->category_id) == 3 ? ' selected' : '' }}>Banca</option>
                                    <option value="4" {{ old('category_id', $post->category_id) == 4 ? ' selected' : '' }}>Actualidad</option>
                                    <option value="5" {{ old('category_id', $post->category_id) == 5 ? ' selected' : '' }}>Inversion</option>
                                </select>
                            </div>
                            
                            <!-- card footer -->
                            <div class="p-6 bg-white border-gray-200 text-right">
                                
                                <div class="flex justify-end">
                                    <!-- Editar post -->
                                    
                                    <button class="font-bold py-2 px-4 w-full bg-purple-600 text-lg text-white shadow-md rounded-lg">Guardar</button>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</x-app-layout>
