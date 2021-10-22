@if(isset($product->image))
    <img src="{{asset('storage/'.$product->image)}}" alt="" class="w-1/4 max-h-80">
@endif
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2"  for="name">Imagen</label>
    <input name="image" value="{{isset($product->image) ? $product->image : old('image')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file">
    @error('image')<small class="text-red-400 pl-2">{{$message}}</small>@enderror
</div>

<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2"  for="name">Nombre</label>
    <input name="name" value="{{isset($product->name) ? $product->name :  old('name')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
    @error('name')<small class="text-red-400 pl-2">{{$message}}</small>@enderror

</div>

<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2"  for="name">Descripción</label>
    <input name="description" value="{{isset($product->description) ? $product->description :  old('description')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
    @error('description')<small class="text-red-400 pl-2">{{$message}}</small>@enderror

</div>

<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2"  for="name">Precio</label>
    <input name="price" value="{{isset($product->price) ? $product->price :  old('price')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
    @error('price')<small class="text-red-400 pl-2">{{$message}}</small>@enderror

</div>

<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2 "  for="name">Categoria</label>
    <select name="category_id" class="block text-gray-700 text-sm font-bold mb-2 w-full">
        @if($categories->isNotEmpty())
            @foreach($categories as $category)
                <option value="{{$category->id}}" class="py-3">{{$category->name}}</option>
            @endforeach
            @else
            <option value="" class="py-3">¡No tienes categorias agregadas!</option>
        @endif
    </select>
    @error('category_id')<small class="text-red-400 pl-2">{{$message}}</small>@enderror
</div>

<div class="flex justify-center">
    <button class="xs:w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
      Guardar
    </button>
</div>