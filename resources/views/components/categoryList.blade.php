<div class="rounded overflow-hidden shadow-lg bg-white hover:scale-105">
    <div class="flex justify-end align-center m-1">
        <a href="{{url('/category/'.$category->id.'/edit')}}"
            class="bg-yellow-500 text-white hover:bg-yellow-700 rounded px-2 py-2 text-sm mr-1"><i
                class="fa fa-edit"></i></a>
        <form action="{{'/category/'.$category->id}}" method="post" class="">
            @csrf
            {{method_field('delete')}}
            <button class="bg-red-500 text-white hover:bg-red-700 rounded px-2 py-2 text-sm"><i class="fa fa-trash"></i></button>
        </form>
    </div>
    <a class="my-6">
        <h3 class="text-center text-xl py-6">{{$category->name}}</h3>
    </a>
</div>