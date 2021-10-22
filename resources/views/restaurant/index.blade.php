<x-app-layout>
    @auth
    <div class="flex justify-end">
        <a href="{{url('/restaurant/'.$restaurant->id.'/edit')}}"
            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Editar</a>
    </div>
    <div class="max-w-full h-1/4 mx-auto rounded bg-white overflow-hidden shadow-lg my-2">
        <img src="{{asset('storage/'.$restaurant->front_image)}}" alt="{{$restaurant->name}}"
            class="xs:max-h-2/6 w-full xs:h-1/4 object-cover">
    </div>
    @endauth

    <div class="py-3">
        @foreach($categories as $category)
        <h2 class="text-2xl font-bold leading-loose"> - {{$category->name}} -</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1 my-2">
        @foreach($products as $product)
        @if($category->id == $product->category_id)
            <div class="w-full bg-white rounded-lg">
                <div class="grid grid-cols-3 gap-1">
                    <img src="{{asset('storage/'.$product->image)}}" alt="" class="w-full my-auto col-span-1 place-content-center">
                    <div class="col-span-2 p-2">
                        <p>{{$product->name}}</p>
                        <p class="text-green-600">$ {{$product->price}}</p>
                         @auth
                        @if($product->available)
                        <p class="text-sm text-green-600 text-xs">Disponible</p>
                        @else
                        <p class="text-sm text-red-600 text-xs">No disponible</p>
                        @endif
                        @endauth
                        <p class="text-sm text-gray-500">{{$product->description}}</p>
                        @guest
                        <div class="flex justify-end m-2">
                            <form action="{{url('/cart/'.$product->id)}}" method="post">
                                @csrf
                                <button type="submit" class="rounded-full p-2 bg-green-600 "><x-heroicon-o-shopping-cart class="w-5 text-white" /></button>
                            </form>
                        </div>
                        @endguest

                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        @endforeach
    </div>
</x-app-layout>