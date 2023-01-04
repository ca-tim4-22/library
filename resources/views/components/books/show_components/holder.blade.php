<div class="py-5 mt-4 text-gray-500 pl-[30px]">
    <div class="wrapper">

        <div class="tabs">
            <a class="inline tab">
                {{__('Osnovni detalji')}}
            </a>
            <a class="tab inline ml-[70px]">
                {{__('Specifikacija')}}
            </a>
            <a class="tab inline ml-[70px]">
                {{__('Multimedija')}}
            </a>
            <a class="tab inline ml-[70px]">
                {{__('Istorija iznajmljivanja')}}
            </a>
        </div>

        <div class="tab_content">

            <div class="tab_item">
                <x-books.show_components.show_info
                        :book="$book"></x-books.show_components.show_info>
            </div>

            <div class="tab_item">
                <x-books.show_components.show_specification
                        :book="$book"></x-books.show_components.show_specification>
            </div>

            <div class="tab_item">
                <x-books.show_components.show_multimedia
                        :book="$book"></x-books.show_components.show_multimedia>
            </div>

            <div class="tab_item">
                <x-books.show_components.show_history :book="$book"
                                                      :rents="$rents"></x-books.show_components.show_history>
            </div>

        </div>

    </div>
</div>
 
