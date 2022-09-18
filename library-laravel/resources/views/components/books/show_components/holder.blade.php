<style>
    .wrapper .active { 
        color: #2196f3;
        border-bottom: 2px solid #2196f3;
        padding-bottom: 18px;
    }
    .tab_item { display: none; }
    .tab_item:first-child { display: block; }
    .tab {
        cursor: pointer
    }

    </style>

    <div class="py-5 mt-4 text-gray-500 pl-[30px]">
    <div class="wrapper">
  
        <div class="tabs">
            <a class="inline tab hover:text-blue-800">
                Osnovni detalji
            </a>
            <a class="tab inline ml-[70px] hover:text-blue-800 
          
            ">
                Specifikacija 
                
            </a>
            <a class="tab inline ml-[70px] hover:text-blue-800
            ">
                Multimedija
            </a>      
        </div>
        
        <div class="tab_content">

        <div class="tab_item">
        <x-books.show_components.show_info :book="$book"></x-books.show_components.show_info>
        </div>

        <div class="tab_item">
        <x-books.show_components.show_specification :book="$book"></x-books.show_components.show_specification>
        </div>
        
        <div class="tab_item">
        <x-books.show_components.show_multimedia :book="$book"></x-books.show_components.show_multimedia>
        </div>
        
        </div>
        
    </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script>
        $(".wrapper .tab").click(function() {
        $(".wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
        $(".tab_item").hide().eq($(this).index()).fadeIn()
    }).eq(0).addClass("active");
    </script>

