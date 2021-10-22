<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nombre</label>
    <input name="name" value="{{isset($category->name) ? $category->name :  old('name')}}"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        type="text">
    @error('name')<small class="text-red-400 pl-2">{{$message}}</small>@enderror
</div>
<button
    class="xs:w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
    type="submit">
    Guardar
</button>