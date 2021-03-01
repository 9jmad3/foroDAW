<!-- This is an example component -->
<!-- <div class="inline-flex items-center px-1 pt-1 border-b-2 border-purple-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-purple-700 transition duration-150 ease-in-out">
  <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
  <select class="inline-flex items-center  border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
    <option>Categorias</option>
    <a href="https://tailwindcomponents.com/component/dropdown-1">Criptomonedas</a>
    <option>Bolsa</option>
    <option>Banca</option>
    <option>Noticias</option>
  </select>
</div> -->

<div class="group inline-flex items-center px-1 pt-1 border-b-2 border-purple-600 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-purple-700 transition duration-150 ease-in-out">
  <button class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
    <span class="pr-1 font-semibold flex-1">Categorias</span>
    <span>
      <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
      </svg>
    </span>
  </button>
  <ul class="rounded-lg text-white p-2 -ml-4 bg-purple-600 border transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32" style="margin-top:230px;">
    <a href="{{route('cryptomonedas.index')}}" class="p-1"><li class="rounded-sm px-3 py-1 hover:bg-gray-100 hover:text-black">Criptomonedas</li></a>
    <a href="{{route('bolsa.index')}}" class="p-1"><li class="rounded-sm px-3 py-1 hover:bg-gray-100 hover:text-black">Bolsa</li></a>
    <a href="{{route('banca.index')}}" class="p-1"><li class="rounded-sm px-3 py-1 hover:bg-gray-100 hover:text-black">Banca</li></a>
    <a href="{{route('actualidad.index')}}" class="p-1"><li class="rounded-sm px-3 py-1 hover:bg-gray-100 hover:text-black">Actualidad</li></a>
    <a href="{{route('inversion.index')}}" class="p-1"><li class="rounded-sm px-3 py-1 hover:bg-gray-100 hover:text-black">Inversion</li></a>
    <!-- <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
      <button
        class="w-full text-left flex items-center outline-none focus:outline-none"
      >
        <span class="pr-1 flex-1">Langauges</span>
        <span class="mr-auto">
          <svg
            class="fill-current h-4 w-4
            transition duration-150 ease-in-out"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
          >
            <path
              d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
            />
          </svg>
        </span>
      </button>
      <ul class="bg-white border rounded-sm absolute top-0 right-0 transition duration-150 ease-in-out origin-top-left min-w-32">
        <li class="px-3 py-1 hover:bg-gray-100">Javascript</li>
        <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
          <button
            class="w-full text-left flex items-center outline-none focus:outline-none"
          >
            <span class="pr-1 flex-1">Python</span>
            <span class="mr-auto">
              <svg
                class="fill-current h-4 w-4
                transition duration-150 ease-in-out"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
              >
                <path
                  d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                />
              </svg>
            </span>
          </button>
          <ul
            class="bg-white border rounded-sm absolute top-0 right-0 
      transition duration-150 ease-in-out origin-top-left
      min-w-32
      "
          >
            <li class="px-3 py-1 hover:bg-gray-100">2.7</li>
            <li class="px-3 py-1 hover:bg-gray-100">3+</li>
          </ul>
        </li>
        <li class="px-3 py-1 hover:bg-gray-100">Go</li>
        <li class="px-3 py-1 hover:bg-gray-100">Rust</li>
      </ul>
    </li> -->
  </ul>
</div>

<style>
  /* since nested groupes are not supported we have to use 
     regular css for the nested dropdowns 
  */
  li>ul                 { transform: translatex(100%) scale(0) }
  li:hover>ul           { transform: translatex(101%) scale(1) }
  li > button svg       { transform: rotate(-90deg) }
  li:hover > button svg { transform: rotate(-270deg) }

  /* Below styles fake what can be achieved with the tailwind config
     you need to add the group-hover variant to scale and define your custom
     min width style.
  	 See https://codesandbox.io/s/tailwindcss-multilevel-dropdown-y91j7?file=/index.html
  	 for implementation with config file
  */
  .group:hover .group-hover\:scale-100 { transform: scale(1) }
  .group:hover .group-hover\:-rotate-180 { transform: rotate(180deg) }
  .scale-0 { transform: scale(0) }
  .min-w-32 { min-width: 8rem }
</style>