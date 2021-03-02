<div id="slide-{{$coin->id}}" class="snap-start w-full h-full flex items-center justify-center text-gray-800 text-xl flex-shrink-0 ">
    <div class="flex p-2 rounded-lg shadow-2xl border-1 border-purple-200">    
        <div class="mr-5">
            <span class="">{{$coin->name}}</span>
        </div>
        <div class="">
            <span class=""><?php echo round($coin->price,2);?>$</span>
        </div>
    </div>
</div>
