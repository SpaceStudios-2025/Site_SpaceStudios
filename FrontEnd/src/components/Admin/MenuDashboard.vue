<template lang="">
    <div class="dashboard">
        <aside class="sidebar">
        <div class="sidebar-brand">
          <h1>Dashboard</h1>
        </div>
        <nav class="nav-links">
          <a href="#" class="nav-link">
            <svg class="icon" viewBox="0 0 24 24"><path d="M3 9.5L12 3l9 6.5V21a1 1 0 01-1 1h-5v-6H9v6H4a1 1 0 01-1-1V9.5z" fill="currentColor"/></svg>
            <span>Cursos</span>
          </a>
          <a href="#" class="nav-link">
            <svg class="icon" viewBox="0 0 24 24"><path d="M4 18h4v-8H4v8zm6 0h4v-12h-4v12zm6 0h4v-4h-4v4z" fill="currentColor"/></svg>
            <span>News</span>
          </a>
          <a href="#" class="nav-link">
            <svg class="icon" viewBox="0 0 24 24"><path d="M4 18h4v-8H4v8zm6 0h4v-12h-4v12zm6 0h4v-4h-4v4z" fill="currentColor"/></svg>
            <span>Admins</span>
          </a>
          <a href="#" class="nav-link">
            <svg class="icon" viewBox="0 0 24 24"><path d="M12 15.5a3.5 3.5 0 100-7 3.5 3.5 0 000 7zM19.43 12.98a7.074 7.074 0 000-1.95l2.11-1.65a.5.5 0 00.12-.62l-2-3.46a.5.5 0 00-.6-.23L16.5 6.37a7.06 7.06 0 00-1.66-.97l-.32-2.54a.5.5 0 00-.5-.43h-4a.5.5 0 00-.5.43l-.32 2.54a7.057 7.057 0 00-1.66.97L4.94 6.12a.5.5 0 00-.6.23l-2 3.46a.5.5 0 00.12.62l2.11 1.65a7.07 7.07 0 000 1.95l-2.11 1.65a.5.5 0 00-.12.62l2 3.46a.5.5 0 00.6.23l2.68-1.5a7.06 7.06 0 001.66.97l.32 2.54a.5.5 0 00.5.43h4a.5.5 0 00.5-.43l.32-2.54a7.06 7.06 0 001.66-.97l2.68 1.5a.5.5 0 00.6-.23l2-3.46a.5.5 0 00-.12-.62l-2.11-1.65z" fill="currentColor"/></svg>
            <span>Perfil</span>
          </a>

          <a href="/" class="nav-link">
            <span>Voltar</span>
          </a>
        </nav>
      </aside>
    </div>
</template>
<script>
export default {

}
</script>
<style scoped>
.dashboard {
    display: flex;
    height: 100vh;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
    background-color: #f4f7fc;
    overflow: hidden;

    position: fixed;
    left: 0;
    top: 0;
}

.sidebar {
    background-color: #1e293b;
    color: white;
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
    background-color: #334155;
    font-weight: 700;
    font-size: 1.5rem;
}

.collapse-btn {
    background: none;
    border: none;
    color: white;
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
}

.nav-link:hover,
.nav-link.active {
    background-color: #3b82f6;
    color: white;
}

.nav-link .icon {
    width: 24px;
    height: 24px;
    margin-right: 1rem;
    flex-shrink: 0;
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
    border-bottom: 1px solid #cbd5e1;
    padding-bottom: 1rem;
    margin-bottom: 1.5rem;
}

.header h2 {
    font-weight: 700;
    font-size: 1.75rem;
    color: #1e293b;
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
    color: #475569;
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
    color: #334155;
    font-weight: 600;
}

.avatar {
    width: 40px;
    height: 40px;
    border-radius: 9999px;
    object-fit: cover;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
</style>