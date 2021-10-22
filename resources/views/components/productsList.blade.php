<div class="rounded overflow-hidden shadow-lg bg-white hover:scale-105">
    <div class="flex justify-end m-1">
        <a href="{{url('/product/'.$product->id.'/edit')}}" class="bg-yellow-500 text-white hover:bg-yellow-700 rounded px-2 py-2 text-sm mr-1"><i class="fa fa-edit"></i></a>
        <form action="{{'/product/'.$product->id}}" method="post" class="">
        @csrf
        {{method_field('delete')}}
        <button class="bg-red-500 hover:bg-red-700 rounded px-2 py-2 text-sm text-white"><i class="fa fa-trash"></i></button>
        </form>
    </div>

    <a class="my-6 xs:flex " >
        <img src="{{asset('storage/'.$product->image)}}" alt="" class="max-w-full">
        <div class="p-2">
            <div class="flex justify-between">
                <h3 class="text-lg ">{{$product->name}}</h3>
                <h3 class="text-sm text-green-500 ">$ {{$product->price}}</h3>
            </div>
            <p class=" ">{{$product->description}}</p>
        </div>
        <div class="flex align-center justify-end p-2"> 
            @if($product->available) 
            <p class="text-sm text-green-500 mr-2">Disponible</p>
            @else
            <p class="text-sm text-red-500 mr-2">No disponible</p>
            @endif

            @if($product->available) 
            <label class="switch p-2">
                <input type="checkbox" name="available" id="{{$product->id}}" checked class="tooglebtn">
                  <span class="slider round"></span>
              </label>
            @else
            <label class="switch p-2">
                <input type="checkbox" name="available" id="{{$product->id}}" class="tooglebtn">
                  <span class="slider round"></span>
              </label>
            @endif
            
            </div>
    </a>
</div>