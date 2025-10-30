document.addEventListener("DOMContentLoaded", function () {
    // 🔹 Inisialisasi Flatpickr
    initFlatpickr();

    // 🔹 Inisialisasi Grafik Harga Kabupaten (4 Kabupaten)
    initPriceCharts();

    initializeCharts();
    
    const datePicker = document.querySelector("#datePicker");

    if (datePicker) {
        datePicker.addEventListener("change", function () {
            updateData(this.value);
        });
    }

    // 🔹 Update grafik saat komoditas atau tanggal berubah
    $("#variant, #dateGraph").on("change", updateAllCharts);
});

/**
 * 🔹 Inisialisasi Flatpickr untuk pemilihan tanggal
 */
function initFlatpickr() {
    flatpickr("#datePicker", {
        dateFormat: "Y-m-d",
        altInput: true,
        altFormat: "F j, Y",
        minDate: "2024-01-01",
        defaultDate: new Date(new Date().setDate(new Date().getDate() - 1))
    });
}

function updateData(date) {
    // Frontend-only mode: hanya memicu re-render grafik lokal (tanpa fetch PHP views)
    initializeCharts();
}


function initializeCharts() {
    document.querySelectorAll(".chart").forEach(chartElem => {
        const ctx = chartElem.getContext("2d");
        const hargaData = JSON.parse(chartElem.getAttribute("data-harga"));
        const tanggalData = JSON.parse(chartElem.getAttribute("data-tanggal"));
        const borderColor = chartElem.getAttribute("data-color");

        new Chart(ctx, {
            type: "line",
            data: {
                labels: tanggalData,
                datasets: [{
                    data: hargaData,
                    borderColor: borderColor,
                    borderWidth: 2,
                    pointRadius: 4,
                    pointBackgroundColor: borderColor,
                    fill: false,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: { ticks: { font: { size: 10 }, autoSkip: false } },
                    y: {
                        beginAtZero: false,
                        ticks: {
                            font: { size: 10 },
                            callback: function(value) { return "Rp" + value.toLocaleString("id-ID"); }
                        }
                    }
                },
                plugins: { legend: { display: false } }
            }
        });
    });
}

/**
 * 🔹 Inisialisasi Grafik Harga Kabupaten
 */
let charts = {}; // Menyimpan instance grafik agar bisa diperbarui

function initPriceCharts() {
    const chartIds = ["chartPamekasan", "chartBangkalan", "chartSumenep", "chartSampang"];
    
    chartIds.forEach(id => {
        if (!document.getElementById(id)) {
            return;
        }
    });

    updateAllCharts();
}

/**
 * 🔹 Fungsi untuk memperbarui semua grafik dengan data terbaru
 */
function updateAllCharts() {
    let selectedVariant = $("#variant").val();
    let selectedDate = $("#datePicker").val();

    // Frontend-only mode: backend API dihapus. Tampilkan placeholder jika kanvas ada.
    renderPlaceholderChart("chartPamekasan", "Harga Harian – data offline");
    renderPlaceholderChart("chartMadura", "Harga Harian Madura – data offline");
    renderPlaceholderChart("priceChart", "Harga Tahunan – data offline");
}

function fetchChartDataRegion(chartId, variantId, selectedDate, apiEndpoint) {
    // Backend dihapus – fungsi ini tidak lagi mem-fetch data
    renderPlaceholderChart(chartId, "Harga Harian – data offline");
}

function fetchChartDataMadura(chartId, variantId, selectedDate, apiEndpoint) {
    // Backend dihapus – fungsi ini tidak lagi mem-fetch data
    renderPlaceholderChart(chartId, "Harga Harian Madura – data offline");
}


/**
 * 🔹 Fungsi untuk mengambil data harga dan memperbarui grafik
 */
function fetchChartData(chartId, variantId, selectedDate, apiEndpoint) {
    // Backend dihapus – fungsi ini tidak lagi mem-fetch data
    renderPlaceholderChart(chartId, "Harga Tahunan – data offline");
}

// Utility: render placeholder chart with simple dummy data
function renderPlaceholderChart(chartId, title) {
    const canvas = document.getElementById(chartId);
    if (!canvas) return;
    const ctx = canvas.getContext("2d");

    if (charts[chartId]) charts[chartId].destroy();

    const labels = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"]; 
    const data = labels.map((_, i) => 10000 + Math.round(Math.sin(i/2) * 1000) + i * 150);

    charts[chartId] = new Chart(ctx, {
        type: "line",
        data: {
            labels,
            datasets: [
                {
                    label: "Contoh Data",
                    data,
                    borderColor: "#2D6AE3",
                    backgroundColor: "#2D6AE320",
                    fill: false,
                    tension: 0.3
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: "top" },
                title: { display: true, text: title }
            },
            scales: {
                y: {
                    ticks: { callback: (v) => `Rp${v.toLocaleString("id-ID")}` }
                }
            }
        }
    });
}







/**
 * 🔹 Fungsi untuk memperbarui tampilan harga dan persentase perubahan
 */
function updatePriceChangeDisplay(priceChange, percentageChange) {
    const displayElement = document.getElementById("priceChangeDisplay");

    if (!displayElement) return;

    // Format angka ke Rupiah
    let formattedPriceChange = new Intl.NumberFormat("id-ID").format(Math.abs(priceChange));
    let formattedPercentage = percentageChange.toFixed(2) + "%";

    // Tentukan warna dan simbol perubahan
    let changeSymbol = priceChange >= 0 ? "▲" : "▼";
    let changeColor = priceChange >= 0 ? "green" : "red";

    // Update tampilan harga dan perubahan
    displayElement.innerHTML = `Rp ${formattedPriceChange} <span class="change ${changeColor}">${changeSymbol} ${formattedPercentage}</span>`;
}


/**
 * 🔹 Fungsi untuk menangani filter kategori scroll
 */
