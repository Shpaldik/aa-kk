<template>
  <section>
    <div class="header">
      <Header />
    </div>
    <div class="charts">
      <Charts/>
    </div>
    <div class="table">
      <Table/>
    </div>
    <div class="footer">
      <Footer/>
    </div>

  </section>
</template>

<script setup>
import Header from './components/Header.vue';
import Charts from './components/Charts.vue';
import Table from './components/Table.vue';
import Footer from './components/Footer.vue';


</script>

<style scoped>
.charts {
  margin-top: 20px;
}

.table {
  margin-top: 70px;
}

.footer{
  margin-top: 30px;
}
</style>
