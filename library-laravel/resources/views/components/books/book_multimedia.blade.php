 <!-- Space for content -->
 <div class="scroll height-content section-content">
    <form class="text-gray-700">

        <div class="w-9/12 mx-auto bg-white rounded p7 mt-[40px] mb-[150px]">
            <div x-data="dataFileDnD()"
                class="relative flex flex-col p-4 text-gray-400 border border-gray-200 rounded">
                <div x-ref="dnd"
                    class="relative flex flex-col text-gray-400 border border-gray-200 border-dashed rounded cursor-pointer">
                    <input accept="*" type="file" multiple
                        class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer"
                        @change="addFiles($event)"
                        @dragover="$refs.dnd.classList.add('border-blue-400'); $refs.dnd.classList.add('ring-4'); $refs.dnd.classList.add('ring-inset');"
                        @dragleave="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                        @drop="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                        title="" />

                    <div class="flex flex-col items-center justify-center py-10 text-center">
                        <svg class="w-6 h-6 mr-1 text-current-50" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="m-0">Prebacite vaše fajlove.</p>
                    </div>
                </div>

                <template x-if="files.length > 0">
                    <div class="grid grid-cols-4 gap-4 mt-4" @drop.prevent="drop($event)"
                        @dragover.prevent="$event.dataTransfer.dropEffect = 'move'">
                        <template x-for="(_, index) in Array.from({ length: files.length })">
                            <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none"
                                style="padding-top: 100%;" @dragstart="dragstart($event)"
                                @dragend="fileDragging = null"
                                :class="{'border-blue-600': fileDragging == index}" draggable="true"
                                :data-index="index">
                                <!-- Checkbox -->
                                <input
                                    class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none"
                                    type="radio" name="chosen_image" />
                                <!-- End checkbox -->
                                <button
                                    class="absolute bottom-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none"
                                    type="button" @click="remove(index)">
                                    <svg class="w-[25px] h-[25px] text-gray-700"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" nviewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                                <template x-if="files[index].type.includes('audio/')">
                                    <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                    </svg>
                                </template>
                                <template
                                    x-if="files[index].type.includes('application/') || files[index].type === ''">
                                    <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </template>
                                <template x-if="files[index].type.includes('image/')">
                                    <img class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white preview"
                                        x-bind:src="loadFile(files[index])" />
                                </template>
                                <template x-if="files[index].type.includes('video/')">
                                    <video
                                        class="absolute inset-0 object-cover w-full h-full border-4 border-white pointer-events-none preview">
                                        <fileDragging x-bind:src="loadFile(files[index])" type="video/mp4">
                                    </video>
                                </template>

                                <div
                                    class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                                    <span class="w-full font-bold text-gray-900 truncate"
                                        x-text="files[index].name">Učitavanje..</span>
                                    <span class="text-xs text-gray-900"
                                        x-text="humanFileSize(files[index].size)">...</span>
                                </div>

                                <div class="absolute inset-0 z-40 transition-colors duration-300"
                                    @dragenter="dragenter($event)" @dragleave="fileDropping = null"
                                    :class="{'bg-blue-200 bg-opacity-80': fileDropping == index && fileDragging != index}">
                                </div>
                            </div>
                        </template>
                    </div>
                </template>
            </div>
            <div class="absolute bottom-0 w-full">
            <div class="flex flex-row">
                <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                    <button type="button"
                        class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                        Poništi <i class="fas fa-times ml-[4px]"></i>
                    </button>
                    <button style="margin-right: 30px" id="sacuvajSpecifikaciju" type="submit"
                            class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="validacijaSpecifikacija()">
                            Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                        </button>
                </div>
            </div>
        </div>
        </div>
        cao
        <div class="absolute bottom-0 w-full">
            <div class="flex flex-row">
                <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                    <button type="button"
                        class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                        Poništi <i class="fas fa-times ml-[4px]"></i>
                    </button>
                    <button style="margin-right: 30px" id="sacuvajSpecifikaciju" type="submit"
                            class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="validacijaSpecifikacija()">
                            Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                        </button>
                </div>
            </div>
        </div>
    </form>
</div>
</section>
<!-- End Content -->