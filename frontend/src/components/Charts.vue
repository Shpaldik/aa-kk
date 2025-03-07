<script setup>
import { ref, onMounted } from "vue";
import Chart from "primevue/chart";
import axios from "axios";

const chartData1 = ref(null);
const chartData2 = ref(null);
const chartData3 = ref(null);

const chartOptions = ref({
  responsive: true,
  maintainAspectRatio: false,
  plugins: {
    legend: {
      display: false,
    },
    tooltip: {
      callbacks: {
        label: function (context) {
          return `${context.raw.toLocaleString()}`;
        },
      },
    },
  },
  scales: {
    x: {
      ticks: { color: "#777" },
      grid: { display: false },
    },
    y: {
      ticks: { color: "#777" },
      grid: { display: false }, 
    },
  },
});

onMounted(async () => {
  try {
    const response = await axios.get("http://127.0.0.1:8000/customers");
    const customers = response.data;

    const labels = customers.map((c) => c.date);
    const data1 = customers.map((c) => c.price);
    const data2 = customers.map((c) => c.duration);
    const data3 = customers.map((c) => c.rating);

    chartData1.value = {
      labels,
      datasets: [{ label: "Количество диалогов", data: data1, borderColor: "#673AB7", backgroundColor: "#D0C2E9", fill: true }],
    };

    chartData2.value = {
      labels,
      datasets: [{ label: "Длительность диалогов", data: data2, borderColor: "#673AB7", backgroundColor: "#D0C2E9", fill: true }],
    };

    chartData3.value = {
      labels,
      datasets: [{ label: "График расходов", data: data3, borderColor: "#673AB7", backgroundColor: "#D0C2E9", fill: true }],
    };
  } catch (error) {
    console.error("Ошибка загрузки данных:", error);
  }
});
</script>

<template>
  <div class="user-info">
    <h1>aigerimmukina@gmail.com <span>(Bitrix)</span></h1>
    <button class="dashboard-btn"><img src="/dashboard.svg" alt=""><p>Перейти в дашборд</p></button>
  </div>

  <div class="charts-container">
    <div class="chart-card">
      <h3>Количество диалогов</h3>
      <Chart v-if="chartData1" type="line" :data="chartData1" :options="chartOptions" class="chart" />
    </div>

    <div class="chart-card">
      <h3>Длительность диалогов</h3>
      <Chart v-if="chartData2" type="line" :data="chartData2" :options="chartOptions" class="chart" />
    </div>

    <div class="chart-card">
      <h3>График расходов</h3>
      <Chart v-if="chartData3" type="line" :data="chartData3" :options="chartOptions" class="chart" />
    </div>
  </div>

  <div class="stats-container">
    <div class="stats-card">
      <h2>Всего</h2>
      <p class="stats-value">10 000</p>
    </div>

    <div class="stats-card">
      <h2>Оценено</h2>
      <p class="stats-value">40</p>
    </div>

    <div class="stats-card">
      <h2>В очереди</h2>
      <p class="stats-value">40</p>
    </div>

    <div class="stats-card">
      <h2>Отменено</h2>
      <p class="stats-value">40</p>
    </div>

    <div class="stats-card">
      <h2>Пропущено</h2>
      <p class="stats-value">40</p>
    </div>

    <div class="stats-card">
      <h2>Ошибка</h2>
      <p class="stats-value">40</p>
    </div>
  </div>
</template>

<style scoped>
h1 {
  font-size: 32px;
  font-weight: 600;
}

span {
  color: #707070;
}

h3 {
  font-size: 16px;
  font-weight: 500;
  color: #4A4A4A;
  margin-bottom: 8px;
}


.charts-container {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: space-between;
}

.chart-card {
  flex: 1 1 calc(33.333% - 20px);
  background-color: white;
  padding: 20px;
  border-radius: 16px; 
  min-width: 300px;
  height: 300px; 
  background: #F0EBF8; 
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05); 
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.user-info{
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 20px;
}


.chart {
  width: 100%;
  height: 100%;
}

.dashboard-btn {
  display: flex;
  align-items: center;
  background-color: #492982;
  color: white;
  padding: 2px 20px;
  border-radius: 12px;
  border: none;
  cursor: pointer;
  gap: 8px;
  transition: background-color 0.3s;
  white-space: nowrap;
}

.stats-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  gap: 5px;
  margin-top: 20px;
}

.stats-card {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  text-align: left;
  background-color: #FCFCFC;
  border: 2px solid #EBEBEB;
  border-radius: 12px;
  padding: 10px 5px;
  width: 100%;
  max-width: 200px;
}

.stats-card h2{
    color: #707070;
    font-size: 1rem;
    font-weight: 100;
}

.stats-card h2,
.stats-card p {
  margin: 5px; 
}

.stats-value {
  font-size: 2rem;
  font-weight: 500;
}

@media (max-width: 1024px) {
  .chart-card {
    flex: 1 1 calc(50% - 20px);
  }
}

@media (max-width: 768px) {
  .chart-card {
    flex: 1 1 100%;
  }
  .dashboard-btn p{
    display: none;
    padding: 2px;
  }
}

</style>