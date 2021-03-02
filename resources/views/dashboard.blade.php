<x-app-layout>
    <x-slot name="header">

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="flex justify-end">
                <!-- Formulario para busqueda personalizada -->
                <form method="GET" class="form-inline" action="{{ route('post.customindex') }}">
                    @csrf
                    <input name="buscarportitulo" class="mt-1 mb-1 form-control rounded-lg border border-purple-600 w-36 h-11" type="search" placeholder="titulo" aria-label="Search">

                    <select name="categoria" class="mt-1 mb-1 form-control rounded-lg border border-purple-600 w-36 h-11" id="exampleFormControlSelect1">
                        <option value="0">Todo</option>
                        <option value="1">Cryptomonedas</option>
                        <option value="2">Bolsa</option>
                        <option value="3">Banca</option>
                        <option value="4">Actualidad</option>
                        <option value="5">Inversion</option>
                    </select>

                    <button class="mt-1 mb-1font-bold p-2 bg-purple-600 text-lg text-white shadow-md rounded-lg h-11" type="submit">Buscar</button>
                </form>
            </div>
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- Precios de criptomonedas -->
            <div id="" class="flex flex-nowrap pb-3 ">
            <div class="bg-white rounded overflow-x-hidden flex snap-x h-auto">     
                @isset($coins)
                    @foreach ($coins as $coin)
                        @include('components.coin')
                    @endforeach
                @endisset
            </div>
            </div>
        </h2>
        @isset($coins)
            <div class="flex justify-center">
                <a class="w-8 h-8 text-gray-700 rounded-full bg-white flex justify-center items-center m-1 mr-2" href="#slide-1"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Bitcoin.svg/1200px-Bitcoin.svg.png" alt=""></a>
                <a class="w-8 h-8 text-gray-700 rounded-full bg-white flex justify-center items-center m-1 mr-2" href="#slide-2"><img src="https://cryptologos.cc/logos/ethereum-eth-logo.png" alt=""></a>
                <a class="w-8 h-8 text-gray-700 rounded-full bg-white flex justify-center items-center m-1 mr-2" href="#slide-3"><img src="https://cryptologos.cc/logos/binance-coin-bnb-logo.png" alt=""></a>
                <a class="w-8 h-8 text-gray-700 rounded-full bg-white flex justify-center items-center m-1 mr-2" href="#slide-4"><img src="https://cryptologos.cc/logos/tether-usdt-logo.png" alt=""></a>
                <a class="w-8 h-8 text-gray-700 rounded-full bg-white flex justify-center items-center m-1 mr-2" href="#slide-5"><img src="https://cryptologos.cc/logos/polkadot-new-dot-logo.png" alt=""></a>
                <a class="w-8 h-8 text-gray-700 rounded-full bg-white flex justify-center items-center m-1 mr-2" href="#slide-6"><img src="https://cryptologos.cc/logos/cardano-ada-logo.png" alt=""></a>
                <a class="w-8 h-8 text-gray-700 rounded-full bg-white flex justify-center items-center m-1 mr-2" href="#slide-7"><img src="https://cryptologos.cc/logos/xrp-xrp-logo.png" alt=""></a>
                <a class="w-8 h-8 text-gray-700 rounded-full bg-white flex justify-center items-center m-1 mr-2" href="#slide-8"><img src="https://cryptologos.cc/logos/litecoin-ltc-logo.png" alt=""></a>
                <a class="w-8 h-8 text-gray-700 rounded-full bg-white flex justify-center items-center m-1 mr-2" href="#slide-9"><img src="https://cryptologos.cc/logos/chainlink-link-logo.png" alt=""></a>
                <a class="w-8 h-8 text-gray-700 rounded-full bg-white flex justify-center items-center m-1 mr-2" href="#slide-10"><img src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/1024/Bitcoin-Cash-BCH-icon.png" alt=""></a>
                <a class="w-8 h-8 text-gray-700 rounded-full bg-white flex justify-center items-center m-1 mr-2" href="#slide-11"><img src="https://upload.wikimedia.org/wikipedia/commons/5/56/Stellar_Symbol.png" alt=""></a>
                <a class="w-8 h-8 text-gray-700 rounded-full bg-white flex justify-center items-center m-1 mr-2" href="#slide-12"><img src="https://cryptologos.cc/logos/usd-coin-usdc-logo.png" alt=""></a>
                <a class="w-8 h-8 text-gray-700 rounded-full bg-white flex justify-center items-center m-1 mr-2" href="#slide-13"><img src="https://cryptologos.cc/logos/uniswap-uni-logo.png" alt=""></a>
                <a class="w-8 h-8 text-gray-700 rounded-full bg-white flex justify-center items-center m-1 mr-2" href="#slide-14"><img src="https://forum.saturn.network/uploads/default/original/2X/7/74087cd3c384192c699e9079bce16027981a80a4.png" alt=""></a>
            </div>
        @endisset
        
    </x-slot>
    
    @isset($status)       
        @include('components.message-status')
    @endisset
    
    <div> 
    
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">  
                    <div class="container my-6 mx-auto px-4 md:px-12">
                      <!-- Paginación -->
                        <!-- Mostramos los posts -->
                        <div class="flex justify-center flex-wrap -mx-1 lg:-mx-2">                                  
                            @isset($posts)
                                @foreach ($posts as $post)
                                    @include('components.post')
                                @endforeach
                            @endisset
                        </div>
                        <!-- Paginación -->
                        {{ $posts->appends(request()->all())->links() }}
                        
                    </div> 
                
           
        </div>
    </div>
</x-app-layout>
