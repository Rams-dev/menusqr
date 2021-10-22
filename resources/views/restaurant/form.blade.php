@if(isset($restaurant->logo))
    <img src="{{asset('storage/'.$restaurant->logo)}}" alt="" class="w-1/4 max-h-80">
@endif
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2"  for="name">Logo</label>
    <input name="logo" value="{{isset($restaurant->logo) ? $restaurant->logo : old('logo')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file">
    @error('logo')<small class="text-red-400 pl-2">{{$message}}</small>@enderror
</div>
@if($restaurant->front_image)
    <img src="{{asset('storage/'.$restaurant->front_image)}}" alt="" class="w-1/4 max-h-80">
@endif
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2"  for="front_image">Portada</label>
    <input name="front_image" value="{{old('front_image')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file">
    @error('front_image')<small class="text-red-400 pl-2">{{$message}}</small>@enderror

</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2"  for="name">Nombre</label>
    <input name="name" value="{{isset($restaurant->name) ? $restaurant->name :  old('name')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
    @error('name')<small class="text-red-400 pl-2">{{$message}}</small>@enderror

</div>

<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2"  for="name">Nombre corto</label>
    <input name="shortName" value="{{isset($restaurant->shortName) ? $restaurant->shortName :  old('shortName')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
    @error('shortName')<small class="text-red-400 pl-2">{{$message}}</small>@enderror

</div>           
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2"  for="name">Teléfono</label>
    <input name="phone" value="{{isset($restaurant->phone) ? $restaurant->phone : old('phone')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
    @error('phone')<small class="text-red-400 pl-2">{{$message}}</small>@enderror

</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2"  for="name">Dirección</label>
    <input name="address" value="{{isset($restaurant->address) ? $restaurant->address :  old('address')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
    @error('address')<small class="text-red-400 pl-2">{{$message}}</small>@enderror

</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2"  for="name">Ciudad</label>
    <input name="city" value="{{isset($restaurant->city) ? $restaurant->city : old('city')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
    @error('city')<small class="text-red-400 pl-2">{{$message}}</small>@enderror

</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2"  for="name">Estado</label>
    <input name="state" value="{{isset($restaurant->state) ? $restaurant->state :  old('state')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
    @error('state')<small class="text-red-400 pl-2">{{$message}}</small>@enderror
</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Eslogan</label>
    <textarea name="slogan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >{{isset($restaurant->slogan) ? $restaurant->slogan : old('slogan')}}</textarea>
    @error('slogan')<small class="text-red-400 pl-2">{{$message}}</small>@enderror
</div>

<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Descripción</label>
    <textarea name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >{{isset($restaurant->description) ? $restaurant->description : old('description')}}</textarea>
    @error('description')<small class="text-red-400 pl-2">{{$message}}</small>@enderror

</div>

<div class="flex justify-center">
    <button class="xs:w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
      Guardar
    </button>
</div>