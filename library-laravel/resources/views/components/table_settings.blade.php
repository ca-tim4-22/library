<div class="flex flex-row items-center justify-end my-2">
    <div>
        <p class="inline text-md">
            Broj redova po strani:
        </p>
        <select
            class=" text-gray-700 bg-white rounded-md w-[46px] focus:outline-none focus:ring-primary-500 focus:border-primary-500 text-md"
            name="ucenici">
            <option value="5">
                5
            </option>
            <option value="10">
                10
            </option>
            <option value="15">
                15
            </option>
            <option value="20">
                20
            </option>
            <option value="50">
                50
            </option>
        </select>
    </div>

    <div>
        <nav class="relative z-0 inline-flex">
            <div>
                <a href="#"
                    class="relative inline-flex items-center px-4 py-2 -ml-px font-medium leading-5 transition duration-150 ease-in-out bg-white text-md focus:z-10 focus:outline-none">
                    1 od 1
                </a>
            </div>
            <div>
                <a href="#"
                    class="relative inline-flex items-center px-2 py-2 font-medium leading-5 text-gray-500 transition duration-150 ease-in-out bg-white text-md rounded-l-md hover:text-gray-400 focus:z-10 focus:outline-none"
                    aria-label="Previous"
                    v-on:click.prevent="changePage(pagination.current_page - 1)">
                    <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            <div v-if="pagination.current_page < pagination.last_page">
                <a href="#"
                    class="relative inline-flex items-center px-2 py-2 -ml-px font-medium leading-5 text-gray-500 transition duration-150 ease-in-out bg-white text-md rounded-r-md hover:text-gray-400 focus:z-10 focus:outline-none"
                    aria-label="Next">
                    <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </nav>
    </div>