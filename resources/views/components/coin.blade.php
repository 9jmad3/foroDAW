<div id="slide-{{$coin->id}}" class="snap-start w-full h-full flex items-center justify-center text-gray-800 text-xl flex-shrink-0 "><!--rounded-lg shadow-md mr-20 text-base min-w-max flex p-2 bg-purple-100 carousel-item-->
    <div class="flex p-2 rounded-lg shadow-2xl border-1 border-purple-200">    
        <!-- <div class="flex flex-row">
            <img alt="avatar" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-md" src="https://cdn1.iconfinder.com/data/icons/technology-devices-2/100/Profile-512.png">
        </div> -->
        <div class="mr-5">
            <span class="">{{$coin->name}}</span>
        </div>
        <div class="">
            <span class=""><?php echo round($coin->price,2);?>$</span>
        </div>
    </div>
</div>
