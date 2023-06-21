<template>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Mahasiswa</h1>
                <p class="mt-2 text-sm text-gray-700">
                    List mahasiswa yang terdaftar
                </p>
            </div>

            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button
                    type="button"
                    class="ml-3 inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                    @click="exportExcel"
                >
                    Excel
                </button>
                <button
                    type="button"
                    class="ml-3 inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                    @click="exportPdf"
                >
                    PDF
                </button>
            </div>
        </div>
        <!-- Table -->
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div
                    class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8"
                >
                    <div
                        class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-t-lg"
                    >
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6"
                                    >
                                        Nama Lengkap
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                    >
                                        NIM
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                    >
                                        Jurusan
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                    >
                                        Jenis Kelamin
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                    >
                                        Tempat, Tanggal Lahir
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                    >
                                        Alamat
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr
                                    v-for="mahasiswa in data"
                                    :key="mahasiswa.id"
                                >
                                    <td
                                        class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6"
                                    >
                                        {{ mahasiswa.nama }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"
                                    >
                                        {{ mahasiswa.nim }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"
                                    >
                                        {{ mahasiswa.jurusan.jurusan }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"
                                    >
                                        {{ mahasiswa.jenis_kelamin }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"
                                    >
                                        {{ mahasiswa.tempat_lahir }},
                                        {{ mahasiswa.tanggal_lahir }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"
                                    >
                                        {{ mahasiswa.alamat }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <nav
            class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6 md:rounded-b-lg"
            aria-label="Pagination"
        >
            <div class="hidden sm:block">
                <p class="text-sm text-gray-700">
                    Showing
                    <span class="font-medium">{{ pagination.from }}</span>
                    to
                    <span class="font-medium">{{ pagination.to }}</span>
                    of
                    <span class="font-medium">{{ pagination.total }}</span>
                    results
                </p>
            </div>
            <div class="flex flex-1 justify-between sm:justify-end">
                <a
                    v-if="currentPage > 1"
                    @click="fetchData(pagination.prev_page_url)"
                    href="#"
                    class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                >
                    Previous
                </a>
                <a
                    v-if="currentPage < pagination.last_page"
                    @click="fetchData(pagination.next_page_url)"
                    href="#"
                    class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                >
                    Next
                </a>
            </div>
        </nav>
        <!-- Pagination -->
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const data = ref([]);
const pagination = ref({});
const currentPage = ref(1);

// Fetch data from the API
const fetchData = async (url) => {
    try {
        const response = await axios.get(url);
        data.value = response.data.data.data;
        pagination.value = response.data.data;
        currentPage.value = response.data.data.current_page;
    } catch (error) {
        console.error(error);
    }
};

// Export data to Excel
const exportExcel = () => {
    const limit = pagination.value.per_page;
    window.open(
        `http://127.0.0.1:8000/api/transaksi/export-excel?limit=${limit}`
    );
};

// Export data to PDF
const exportPdf = () => {
    const limit = pagination.value.per_page;
    window.open(
        `http://127.0.0.1:8000/api/transaksi/export-pdf?limit=${limit}`
    );
};

onMounted(() => {
    fetchData("http://127.0.0.1:8000/api/transaksi");
});
</script>
