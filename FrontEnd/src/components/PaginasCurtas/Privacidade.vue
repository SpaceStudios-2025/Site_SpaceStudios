<template>
  <main class="privacy-page">
    <header class="privacy-header">
      <h1>Política de Privacidade</h1>
      <p>Última atualização: 17 de Agosto de 2025</p>
    </header>

    <section class="privacy-content">
      <p>
        Sua privacidade é importante para nós. Esta Política de Privacidade descreve como coletamos, usamos, protegemos e compartilhamos suas informações quando você utiliza nosso site.
      </p>

      <h2>1. Informações que coletamos</h2>
      <p>
        Podemos coletar informações pessoais como nome, e-mail, dados de contato, informações de pagamento, além de dados de navegação para melhorar a experiência do usuário.
      </p>

      <h2>2. Como usamos suas informações</h2>
      <p>
        As informações coletadas são usadas para personalizar sua experiência, melhorar nossos serviços, processar pagamentos e enviar atualizações sobre nossos produtos e serviços.
      </p>

      <h2>3. Compartilhamento de informações</h2>
      <p>
        Não compartilhamos suas informações pessoais com terceiros, exceto quando necessário para cumprir obrigações legais ou fornecer serviços essenciais ao site.
      </p>

      <h2>4. Segurança dos dados</h2>
      <p>
        Implementamos medidas de segurança para proteger suas informações contra acesso não autorizado, alteração, divulgação ou destruição.
      </p>

      <h2>5. Seus direitos</h2>
      <p>
        Você pode solicitar acesso, correção ou exclusão dos seus dados pessoais a qualquer momento entrando em contato conosco.
      </p>

      <h2>6. Alterações nesta política</h2>
      <p>
        Podemos atualizar esta política periodicamente. Recomendamos que você reveja esta página regularmente para se manter informado sobre quaisquer alterações.
      </p>

      <p>Se tiver dúvidas sobre esta política, entre em contato conosco.</p>
    </section>
  </main>
</template>

<script setup>
// Nenhum script especial necessário por enquanto
</script>

<style scoped>
:root {
  --bg-color: #121212;
  --text-color: #f0f0f0;
  --accent-color: #ff6f61;
  --header-bg: #1e1e1e;
  --section-bg: #1a1a1a;
  --border-color: #333;
}

.privacy-page {
  background-color: var(--bg-color);
  color: var(--text-color);
  min-height: 100vh;
  padding: 2rem;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.privacy-header {
  background-color: var(--header-bg);
  padding: 2rem;
  border-radius: 10px;
  text-align: center;
  margin-bottom: 2rem;
  box-shadow: 0 4px 6px rgba(0,0,0,0.4);
}

.privacy-header h1 {
  color: var(--accent-color);
  margin-bottom: 0.5rem;
}

.privacy-header p {
  color: #bbb;
}

.privacy-content {
  background-color: var(--section-bg);
  padding: 2rem;
  border-radius: 10px;
  line-height: 1.6;
  box-shadow: 0 4px 6px rgba(0,0,0,0.3);
}

.privacy-content h2 {
  color: var(--accent-color);
  margin-top: 1.5rem;
}

.privacy-content p {
  margin-top: 0.8rem;
}
</style>
