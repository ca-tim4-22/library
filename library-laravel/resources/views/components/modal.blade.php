<!-- Modal - Delete librarian -->
<div
style="z-index: 111"
class="fixed top-0 left-0 flex items-center justify-center hidden w-full h-screen bg-black bg-opacity-50 izbrisi-modal">
<!-- Modal -->
<div class="w-[500px] bg-white rounded shadow-lg md:w-1/3">
    <!-- Modal Header -->
    <div class="flex items-center justify-between px-[30px] py-[20px] border-b">
        <h3>Da li ste sigurni da želite da izbrišete bibliotekara?
        </h3>
    </div>
    <!-- Modal Body -->
    <div class="flex items-center justify-end px-[30px] py-[20px] border-t w-100 text-white">
        <button type="button"
            class="close-modal shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
            Otkaži <i class="fas fa-times ml-[4px]"></i>
        </button>

        <form action="{{route('destroy-librarian', $librarian->username)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
            class="shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]">
            Potvrdi <i class="fas fa-check ml-[4px]"></i>
        </button>
           
        </form>

    </div>
</div>
</div> 

