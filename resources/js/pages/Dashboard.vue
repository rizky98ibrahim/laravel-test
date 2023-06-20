<template>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4 text-center">
            Total Jenis Kelamin Mahasiswa Per Jurusan
        </h2>

        <div id="chart" class="w-full h-80"></div>
    </div>
</template>

<script>
import ApexCharts from "apexcharts";
import axios from "axios";

export default {
    mounted() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            axios
                .get("http://127.0.0.1:8000/api/dashboard/")
                .then((response) => {
                    const data = response.data.data;
                    this.renderChart(data);
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        renderChart(data) {
            const totalLakiLaki = data.map((item) => item.total_laki_laki);
            const totalPerempuan = data.map((item) => item.total_perempuan);
            const categories = data.map((item) => item.jurusan);

            const options = {
                chart: {
                    type: "bar",
                    height: 350,
                },
                series: [
                    {
                        name: "Laki-laki",
                        data: totalLakiLaki,
                        color: "#2986CC",
                    },
                    {
                        name: "Perempuan",
                        data: totalPerempuan,
                        color: "#C90076",
                    },
                ],
                xaxis: {
                    categories: categories,
                },
            };

            const chart = new ApexCharts(
                document.querySelector("#chart"),
                options
            );
            chart.render();
        },
    },
};
</script>

<style>
#chart {
    width: 100%;
    height: 400px;
}
</style>
