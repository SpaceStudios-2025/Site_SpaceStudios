<template>
  <!-- Seção principal de contato -->
  <section class="escopo" id="contato">
    <!-- Cabeçalho -->
    <header>
      <h1 class="title">Contato</h1>
      <h4 class="subtitle">Fale Conosco</h4>
    </header>

    <!-- Cards de informações -->
    <section class="info-cards">
      <article class="card">
        <h5>Email</h5>
        <a href="mailto:spacestudios@gmail.com">spacestudios@gmail.com</a>
      </article>
      <article class="card">
        <h5>Telefone</h5>
        <p>+55 15 99999-9999</p>
      </article>
      <article class="card">
        <h5>Itch.io</h5>
        <p>space-studios-oficial.itch.io/</p>
      </article>
    </section>

    <!-- Formulário de contato -->
    <form class="contact-form">
      <input type="text" placeholder="Seu Nome" required />
      <input type="email" placeholder="Seu Email" required />
      <textarea placeholder="Sua Mensagem" rows="5" required></textarea>
      <button type="submit">Enviar Mensagem</button>
    </form>

    <!-- Redes sociais -->
    <footer class="redes">
      <h4 class="redes-title">Nossas Redes</h4>
      <nav class="container-redes" aria-label="Redes sociais">
        <a href="#" aria-label="Facebook" class="btn-social">
          <img src="@/assets/img/Icones/facebook.png" alt="Facebook" />
        </a>
        <a href="#" aria-label="Instagram" class="btn-social">
          <img src="@/assets/img/Icones/instagram.png" alt="Instagram" />
        </a>
        <a href="#" aria-label="X (Twitter)" class="btn-social">
          <img src="@/assets/img/Icones/x.png" alt="X (Twitter)" />
        </a>
        <a href="#" aria-label="YouTube" class="btn-social">
          <img src="@/assets/img/Icones/youtube.png" alt="YouTube" />
        </a>
      </nav>
    </footer>
  </section>
</template>

<script>
export default {
  name: "ContatoPage",
};
</script>

<style scoped>
/* ===== Estrutura principal ===== */
.escopo {
  width: 100%;
  min-height: 100vh;
  background: linear-gradient(135deg, #ffffff, #e0ebff);
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  color: #222;
  padding: 40px 20px;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}

/* ===== Títulos ===== */
.title {
  font-size: 3rem;
  font-weight: bold;
  color: #1e3a8a;
  margin-bottom: 0.5rem;
}

.subtitle {
  font-size: 1.3rem;
  font-weight: 500;
  color: #4b5563;
  margin-bottom: 2rem;
}

/* ===== Cards de informações ===== */
.info-cards {
  display: flex;
  gap: 20px;
  flex-wrap: wrap;
  justify-content: center;
  margin-bottom: 40px;
}

.card {
  background: #ffffffcc;
  padding: 20px 30px;
  border-radius: 15px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.1);
  width: 220px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;

  cursor: pointer;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 25px rgba(0,0,0,0.15);
}

.card h5 {
  font-size: 1rem;
  margin-bottom: 10px;
  color: #2563eb;
}

.card a, .card p {
  font-size: 0.9rem;
  color: #333;
  text-decoration: none;
}

/* ===== Formulário ===== */
.contact-form {
  display: flex;
  flex-direction: column;
  gap: 15px;
  max-width: 500px;
  width: 100%;
  margin-bottom: 50px;
}

.contact-form input,
.contact-form textarea {
  padding: 15px;
  border-radius: 12px;
  border: 1px solid #ccc;
  font-size: 1rem;
  transition: all 0.3s ease;
}

.contact-form input:focus,
.contact-form textarea:focus {
  outline: none;
  border-color: #2563eb;
  box-shadow: 0 0 10px rgba(37, 99, 235, 0.3);
}

.contact-form button {
  padding: 15px;
  background: #2563eb;
  color: white;
  font-weight: bold;
  border: none;
  border-radius: 12px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.contact-form button:hover {
  background: #1e40af;
  transform: translateY(-3px);
  box-shadow: 0 6px 15px rgba(37, 99, 235, 0.4);
}

/* ===== Redes sociais ===== */
.redes-title {
  font-size: 1rem;
  font-weight: 600;
  color: #333;
  margin-bottom: 15px;
}

.container-redes {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 25px;
  flex-wrap: wrap;
}

.btn-social {
  display: flex;
  align-items: center;
  justify-content: center;
  background: #f3f4f6;
  border-radius: 12px;
  padding: 10px;
  transition: all 0.3s ease;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.btn-social img {
  width: 50px;
  height: 50px;
  object-fit: contain;
}

.btn-social:hover {
  transform: scale(1.15);
  background: #afc8ff;
}

/* ===== Responsividade ===== */
@media (max-width: 768px) {
  .title { font-size: 2.5rem; }
  .subtitle { font-size: 1.1rem; }
  .card { width: 180px; }
  .contact-form { max-width: 400px; }
  .btn-social img { width: 45px; height: 45px; }
}

@media (max-width: 480px) {
  .title { font-size: 2rem; }
  .subtitle { font-size: 1rem; }
  .info-cards { flex-direction: column; gap: 15px; }
  .card { width: 100%; }
  .contact-form { max-width: 100%; }
  .btn-social img { width: 40px; height: 40px; }
}
</style>
