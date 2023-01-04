<!-- Space for content -->
<div class="section mt-[19px]">
    <div class="flex flex-row justify-between">
        <div class="mr-[30px]">
            <div class="mt-[20px]">
                <span class="text-gray-500 text-[14px]">Broj strana</span>
                <p class="font-medium">{{$book->page_count}}</p>
            </div>
            <div class="mt-[40px]">
                <span class="text-gray-500 text-[14px]">Pismo</span>
                <p class="font-medium">{{$book->letter->name}}</p>
            </div>
            <div class="mt-[40px]">
                <span class="text-gray-500 text-[14px]">Jezik</span>
                <p class="font-medium">{{$book->language->name}}</p>
            </div>
            <div class="mt-[40px]">
                <span class="text-gray-500 text-[14px]">Povez</span>
                <p class="font-medium">{{$book->binding->name}}</p>
            </div>
            <div class="mt-[40px]">
                <span class="text-gray-500 text-[14px]">Format</span>
                <p class="font-medium">{{$book->format->name}}</p>
            </div>
            <div class="mt-[40px]">
                <span class="text-gray-500 text-[14px]">Međunarodni standardni broj knjige</span>
                <p class="font-medium">ISBN: {{$book->ISBN}}</p>
            </div>
        </div>
    </div>
</div>