<h1 class="text-xl font-bold mb-4 ">
    Publish New Post!
</h1>

<form method="POST" action="/admin/posts" enctype="multipart/form-data">
    @csrf

    <div class="mb-6">
        <lable class="block mb-2 uppercase font-bold text-xs text-gray-700"
               for="title"
        >
            Title

        </lable>

        <input class="border border-gray-400 p-2 w-full"
               type="text"
               name=title""
               id="title"
               value="{{old('title')}}"
               required
        >

        @error('title')
        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
        @enderror

    </div>
    <div class="mb-6">
        <lable class="block mb-2 uppercase font-bold text-xs text-gray-700"
               for="slug"
        >
            Slug

        </lable>

        <input class="border border-gray-400 p-2 w-full"
               type="text"
               name="slug"
               id="slug"
               value="{{old('slug')}}"
               required
        >

        @error('slug')
        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
        @enderror

    </div>

    <div class="mb-6">
        <lable class="block mb-2 uppercase font-bold text-xs text-gray-700"
               for="thumbnail"
        >
            Thumbnail

        </lable>

        <input class="border border-gray-400 p-2 w-full"
               type="file"
               name="thumbnail"
               id="thumbnail"
               value="{{old('slug')}}"
               required
        >

        @error('slug')
        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
        @enderror

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="excerpt"
            >
                Excerpt
            </label>

            <textarea class="border border-gray-400 p-2 w-full"
                      name="excerpt"
                      id="excerpt"
                      required
                      value="{{old('excerpt')}}">

                </textarea>

            @error('excerpt')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror


        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="body"
            >Body

            </label>
            <textarea class="border border-gray-400 p-2 w-full"
                      name="body"
                      id="body"
                      requerd
                      value="{{old('body')}}">

                </textarea>
            @error('body')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror

        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="category"
            >Category

            </label>
                <?php

                $categories = \App\Models\Category::all();


                ?>

            <select name="category" >
                @foreach($categories as $category)
                    <option value="{{$category->id}}"{{old('$category')==$category->id ? 'selected' : ''}}>{{ucwords($category->name)}}</option>
                @endforeach

            </select>

            @error('category')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror

        </div>

        <x-submit-button>Publish</x-submit-button>

    </div>
</form>
