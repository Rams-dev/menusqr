<x-app-layout>
    <div class="flex justify-end my-6">
        <a href="{{url('/category/create')}}" class="xs:w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          <i class="fa fa-plus"></i> Agregar
        </a>
    </div>

    <div class="py-3">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1">
            @foreach($categories as $category)
            @include('components.categoryList')
            @endforeach
        </div>
    </div>

</x-app-layout>