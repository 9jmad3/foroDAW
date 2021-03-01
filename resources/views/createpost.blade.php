<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear tema') }}
        </h2>
    </x-slot>
    <div> 
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">  
            <div class="container my-6 mx-auto px-4 md:px-12">
            <form action="{{route('post.store')}}" accept-charset="UTF-8" method="post">
            @csrf
                <div class="bg-white rounded-lg p-3  flex flex-col justify-center items-center md:items-start shadow-lg mb-4">
                    <input class="rounded-lg title bg-gray-100 border border-gray-200 p-2 mb-4 outline-none w-full" spellcheck="false" placeholder="Titulo" type="text" name="title">
                    <textarea class="rounded-lg description bg-gray-100 sec p-3 h-60 border border-gray-200 outline-none w-full" spellcheck="false" placeholder="Contenido..." name="body"></textarea>

                    <select name="category_id" class="rounded-lg mt-2 title bg-gray-100 border border-gray-200 p-2 mb-4 outline-none w-full">
                        <option value="1" selected>Criptomodenas</option>
                        <option value="2">Bolsa</option>
                        <option value="3">Banca</option>
                        <option value="4">Actualidad</option>
                        <option value="5">Inversion</option>
                    </select>

                    <button class="font-bold py-2 px-4 w-full bg-purple-600 text-lg text-white shadow-md rounded-lg">Crear</button>

                </div>
            </form>
                    
                
            </div> 
        </div>
    </div>
</x-app-layout>
