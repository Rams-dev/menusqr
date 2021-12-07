<div class="rounded overflow-hidden shadow-lg bg-white hover:scale-105">
    <div class="flex justify-between align-center m-1">
        <a class="my-6">
            <h3 class="text-xl pl-2 py-3">{{$category->name}}</h3>
        </a>
        <div class="p-2">
            <a href="{{url('/category/'.$category->id.'/edit')}}"
                class="bg-yellow-500 text-white hover:bg-yellow-700 rounded px-2 py-2 text-sm mr-1 m-2"><i
                    class="fa fa-edit"></i></a>
            <form action="{{'/category/'.$category->id}}" method="post" class="">
                @csrf
                {{method_field('delete')}}
                <button class="bg-red-500 text-white hover:bg-red-700 rounded px-2 py-2 text-sm m-2"><i
                        class="fa fa-trash"></i></button>
            </form>
        </div>
    </div>

</div>