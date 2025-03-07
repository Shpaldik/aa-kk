<script setup>
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';

import axios from 'axios';

import { ref, onMounted } from 'vue';
const menuOpen = ref(null);

const toggleMenu = (menu) => {
  menuOpen.value = menuOpen.value === menu ? null : menu;
};

onMounted(async () => {
    const response = await axios.get('http://127.0.0.1:8000/customers');
    customers.value = response.data;
});


const customers = ref([]);

const selectedCustomers = ref([]); 
</script>

<template>
  <section class="custom-table">
      <div class="table-header">
          <div class="table-title">
            <h1>Диалоги</h1>
            <img src="/icons/warning.svg" alt="warning">
          </div>
        <div class="table-actions">
        <img src="/columns.svg" alt="columns">
        <img src="/filter.svg" alt="filter">
      </div>
    </div>
    <DataTable 
    v-model:selection="selectedCustomers" 
    :value="customers" 
    paginator 
    :rows="9" 
    sortField="price" 
    :sortOrder="-1" 
    :rowsPerPageOptions="[5, 10, 20, 50]" 

    dataKey="id" 
    tableStyle="min-width: 50rem"
  > 
    
    <Column selectionMode="multiple" headerStyle="width: 3rem"></Column>
    <Column field="id" header="ID" sortable style="width: 25%"></Column>
    <Column field="operator" header="Оператор" sortable style="width: 25%"></Column>
    <Column field="client.number" header="Клиент" style="width: 25%"></Column>
    <Column field="date" header="Дата" sortable style="width: 25%"></Column>
    <Column field="duration" header="Длит-тб" sortable style="width: 25%"></Column>
    <Column field="scenario" header="Сцен-й" style="width: 25%"></Column>
    <Column field="marker" header="Маркер" style="width: 25%"></Column>
    <Column field="rating" header="Оценка" sortable style="width: 25%"></Column>
    <Column field="language" header="Язык" style="width: 25%"></Column>
    <Column field="loyalty" header="Лоял" sortable style="width: 25%"></Column>
    <Column field="beacon" header="Маяк" style="width: 25%"></Column>
    <Column field="interruptions" header="Переб-я" style="width: 25%"></Column>
    <Column field="price" header="Цена" sortable style="width: 25%"></Column>
    <Column field="actions" header="Действия" style="width: 25%">
      <template #body="{ data }">
        <div class="actions-container">
          <div class="action-buttons">
            <img src="/icons/play.svg" alt="play">
            <div class="divider"></div>
            <img src="/icons/link.svg" alt="settings">
          </div>
          <img src="/menu.svg" alt="menu" class="menu-icon">
          
        </div>
    </template>
    </Column>
  </DataTable>
  </section>
</template>

<style scoped>

.custom-table {
  border: 1px solid #D9D9D9;
  border-radius: 16px;
  padding: 4px;
}

.table-header {
  display: flex;
  align-items: center;
  justify-content: space-between;

}

.table-title {
  display: flex;
  align-items: center;

  gap: 5px;
  margin-left: 15px;
}

.table-actions{
  display: flex;
  align-items: center;
  gap: 5px;
  margin-right: 15px;
}

.actions-container {
  display: flex;
  align-items: center;
  gap: 20px; 
}

.action-buttons {
  display: flex;
  align-items: center;
  border: 1px solid #d1d5db; 
  border-radius: 8px; 
  background-color: white;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
  padding: 5px 10px; 
}


.divider {
  width: 1px;
  height: 20px;
  background-color: #d1d5db; 
  margin: 0 8px;
}


.menu-icon {
  cursor: pointer;
}


.table-actions {
  position: relative;
  display: flex;
  gap: 10px;
  cursor: pointer;
}


.menu {
  position: absolute;
  background: white;
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease-in-out;
  z-index: 99;
}

.menu-columns {
  bottom: -100px;
  left: 0;
}

/* Меню для filter */
.menu-filter {
  bottom: -100px;
  right: 0;
}

.menu ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.menu li {
  padding: 8px 12px;
  cursor: pointer;
}

.menu li:hover {
  background: #f0f0f0;
}
</style>