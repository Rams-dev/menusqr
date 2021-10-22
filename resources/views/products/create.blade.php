<x-app-layout>
    <div class="max-w-full mx-auto rounded bg-white overflow-hidden shadow-lg my-2">
        <x-h3>Nuevo producto</x-h3>
        <form action="{{url('product')}}" method="post" class="xs:w-full p-4 md-w-4/6 md:p-12" enctype="multipart/form-data">
            @csrf
            @include('products.form')
        </form>
    </div>
</x-app-layout>