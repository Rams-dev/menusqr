<x-app-layout>
<div class="max-w-full mx-auto rounded bg-white overflow-hidden shadow-lg my-2">

<div class="py-4">
    <h2 class="text-lg text-center">Crear categoría</h2>
    <form action="{{url('/category')}}" method="post" class="xs:w-full p-4 md-w-4/6 md:p-12">
        @csrf
      @include('categories.form')
    </form>
</div>
</div>
</x-app-layout>