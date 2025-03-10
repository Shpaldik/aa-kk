<template>
  <header>
    <div class="mobile-header">
        <button class="menu-toggle" @click="isMenuOpen = !isMenuOpen">
        <img src="/menu.svg" alt="menu" width="40">
        </button>
        <img src="/logo.svg" alt="logo" class="logo">
    </div>

    <nav :class="['nav', { 'nav-open': isMenuOpen }]">
      <button class="nav-button">
        <img src="/icons/home.svg" alt="home">
        <p>Главная</p>
      </button>

      <div class="nav-item">
        <img src="/icons/chartline.svg" alt="analytics">
        <a href="">Аналитика</a>
      </div>

      <div class="nav-item">
        <img src="/icons/history.svg" alt="history">
        <a href="">История</a>
      </div>

      <div class="nav-item">
        <img src="/icons/wallet.svg" alt="wallet">
        <a href="">Финансы</a>
      </div>

      <div class="nav-item">
        <img src="/icons/settings.svg" alt="settings">
        <a href="">Настройки</a>
      </div>
    </nav>

    <div class="user-controls">
      <button class="theme-toggle-btn" @click="toggleTheme">
        <i :class="['pi', isDark ? 'pi-moon' : 'pi-sun']"></i>
      </button>


      <img class="icon" src="/icons/notification.svg" alt="notification">
      <img class="icon" src="/icons/faq.svg" alt="faq">

      <button class="balance-button">
        <img src="/icons/money.svg" alt="money"> 
        <p>1 000 000 ₸</p>
      </button>
    </div>
  </header>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const isDark = ref(false)

onMounted(() => {
  isDark.value = localStorage.getItem('theme') === 'dark'
  applyTheme()
})

function toggleTheme() {
  isDark.value = !isDark.value
  localStorage.setItem('theme', isDark.value ? 'dark' : 'light')
  applyTheme()
}

function applyTheme() {
  const html = document.documentElement
  if (isDark.value) {
    html.classList.add('dark')
  } else {
    html.classList.remove('dark')
  }
}

</script>

<style scoped>
header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: white;
  position: relative;
}

.logo {
  width: 120px;
}


.menu-toggle {
  display: none;
  background: none;
  border: none;
  cursor: pointer;
}

.nav {
  display: flex;
  align-items: center;
  gap: 40px;
}

.nav-item {
  display: flex;
  align-items: center;
  gap: 8px;
  cursor: pointer;
}

.nav-item a {
  text-decoration: none;
  color: black;
  transition: color 0.3s;
}

.nav-item a:hover {
  color: purple;
}

.nav-button {
  display: flex;
  align-items: center;
  background-color: #492982;
  color: white;
  padding: 8px 16px;
  border-radius: 12px;
  border: none;
  cursor: pointer;
  gap: 8px;
  transition: background-color 0.3s;
}

.nav-button:hover {
  background-color: darkviolet;
}

.icon {
  cursor: pointer;
  width: 24px;
  height: 24px;
}


.user-controls {
  display: flex;
  align-items: center;
  gap: 24px;
}

.balance-button {
  display: flex;
  align-items: center;
  background-color: #F0EBF8;
  font-weight: bold;
  padding: 1px 12px;
  border-radius: 12px;
  border: none;
  cursor: pointer;
  gap: 8px;
  transition: background-color 0.3s;
}

.balance-button:hover {
  background-color: #b8a0ff;
}


.toggle-icon {
  transition: 0.3s;
}


.theme-toggle-btn {
  width: 35px;
  height: 35px;
  border-radius: 12px;
  background-color: transparent;
  border: 1px solid #492982;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s;

}

.theme-toggle-btn:hover {
  border-color: #492982;
}

.theme-toggle-btn i {
  font-size: 1.2rem;
}


@media (max-width: 1110px) {
  .mobile-header{
    display: flex;
    align-items: center;
  }
  .nav {
    display: none;
    flex-direction: column;
    position: absolute;
    top: 100%;
    left: 0;
    background: white;
    width: 100%;
    padding: 10px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
  }

  .nav.nav-open {
    display: flex;
  }

  .menu-toggle {
    display: block;
  }

  .user-controls {
    gap: 12px;
  }
}

</style>
