
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    <div x-data="{show:false}" class="py-2" @click.away="show = false" >
        <button
            @click="show = ! show"
            class="py-2 pl-3 pr-9 text-sm font-semibold">Categories
        </button>
        {{isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories'}}

        <div x-show="show" style-display:none class="overflow-auto max-h-52" >
            @foreach($categories as $category)
                <a href="/categories/{{ $category->slug }}" class="block hover:bg-gray-300 " >
                    {{ ucwords($category->name) }} </a>

            @endforeach
        </div>
    </div>
