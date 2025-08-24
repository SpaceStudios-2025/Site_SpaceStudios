<template>
  <div class="dashboard">
    <aside class="sidebar">
      <div class="sidebar-brand">
        <h1>Dashboard</h1>
      </div>
      <nav class="nav-links">
        <router-link to="/dashboard/" class="nav-link">
          <svg class="icon" viewBox="0 0 24 24" fill="currentColor">
            <path d="M19 2H5c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 18H5V4h14v16zM7 6h10v2H7V6zm0 4h10v2H7v-2zm0 4h6v2H7v-2z"/>
            </svg>
          <span>Cursos</span>
        </router-link>
        <router-link to="/dashboard/noticias" class="nav-link">
          <svg class="icon" viewBox="0 0 24 24"><path d="M4 18h4v-8H4v8zm6 0h4v-12h-4v12zm6 0h4v-4h-4v4z" fill="currentColor"/></svg>
          <span>News</span>
        </router-link>
        <router-link to="/dashboard/jogos" class="nav-link">
          <svg class="icon" viewBox="0 0 24 24" fill="currentColor">
            <path d="M21 10.5V13c0 3.31-2.69 6-6 6h-6c-3.31 0-6-2.69-6-6v-2.5C3 7.57 5.57 5 9 5h6c3.43 0 6 2.57 6 5.5zM9 11H7v2H5v2h2v2h2v-2h2v-2H9v-2zm8 0h-2v2h2v-2z"/>
            </svg>
          <span>Games</span>
        </router-link>
        <router-link to="/" class="nav-link">
          <span>Voltar</span>
        </router-link>
      </nav>
    </aside>
  </div>
</template>

<style scoped>
.dashboard {
  display: flex;
  height: 100vh;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: #e2e8f0;
  background-color: #121212;
  overflow: hidden;
  position: fixed;
  left: 0;
  top: 0;
  z-index: 9999;
}

.sidebar {
  background-color: #0e0e0e;
  color: #e2e8f0;
  width: 220px;
  display: flex;
  flex-direction: column;
  transition: width 0.3s ease;
  overflow: hidden;
}

.sidebar-collapsed {
  width: 64px;
}

.sidebar-brand {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem;
  background-color: #000000;
  font-weight: 700;
  font-size: 1.5rem;
  color: #f1f5f9;
}

.collapse-btn {
  background: none;
  border: none;
  color: #f1f5f9;
  font-size: 1.2rem;
  cursor: pointer;
  transition: transform 0.3s ease;
  user-select: none;
}

.nav-links {
  flex-grow: 1;
  display: flex;
  flex-direction: column;
  margin-top: 1rem;
}

.nav-link {
  display: flex;
  align-items: center;
  padding: 1rem;
  color: #cbd5e1;
  text-decoration: none;
  transition: background-color 0.3s ease, color 0.3s ease;
  cursor: pointer;
  user-select: none;
  border-radius: 0.375rem;
  margin: 0 0.5rem;
}

.nav-link:hover,
.nav-link.active {
  background-color: #374151;
  color: #ffffff;
}

.nav-link .icon {
  width: 24px;
  height: 24px;
  margin-right: 1rem;
  flex-shrink: 0;
  color: #cbd5e1;
}

.sidebar-collapsed .nav-link span {
  display: none;
}

/* Main content area */
.main-content {
  flex-grow: 1;
  display: flex;
  flex-direction: column;
  padding: 1.5rem 2rem;
  overflow-y: auto;
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid #2c2c2c;
  padding-bottom: 1rem;
  margin-bottom: 1.5rem;
}

.header h2 {
  font-weight: 700;
  font-size: 1.75rem;
  color: #f1f5f9;
}

.header-right {
  display: flex;
  align-items: center;
}

.notification-btn {
  position: relative;
  background: none;
  border: none;
  cursor: pointer;
  margin-right: 1.5rem;
  color: #94a3b8;
}

.notification-btn .icon {
  width: 24px;
  height: 24px;
}

.notif-count {
  position: absolute;
  top: -6px;
  right: -6px;
  background-color: #ef4444;
  color: white;
  font-size: 0.7rem;
  font-weight: 700;
  border-radius: 50%;
  padding: 2px 6px;
  min-width: 18px;
  text-align: center;
  user-select: none;
}

.profile {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  color: #94a3b8;
  font-weight: 600;
}

.avatar {
  width: 40px;
  height: 40px;
  border-radius: 9999px;
  object-fit: cover;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.4);
}
</style>
