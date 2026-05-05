# 🎨 Meu Portfólio - Vinicius Siqueira

> **👉 [VER DEMO AO VIVO](https://vininhosts.github.io/portfolio/)**

Bem-vindo ao meu portfólio! Este repositório contains meus projetos como freelancer.

---

## 🌐 **DEMO AO VIVO**

**Clique no link abaixo para ver o painel de projetos:**
🔗 **[https://vininhosts.github.io/portfolio/](https://vininhosts.github.io/portfolio/)**

Seus clientes verão uma página com todos os seus projetos e poderão clicar para ver cada um.

---

## 📁 **Estrutura do Projeto**

```
portfolio/
├── README.md                 # Este arquivo
├── docs/                     # 🌐 GitHub Pages (DEMO AO VIVO)
│   └── index.html           # Painel de seleção de projetos
├── html-css/                 # 📂 Projeto 1: Site Estático
│   ├── index.html
│   ├── styles.css
│   └── script.js
└── wordpress-theme/          # 📂 Projeto 2: Tema WordPress
    ├── style.css
    ├── functions.php
    ├── header.php
    ├── footer.php
    ├── index.php
    ├── js/
    │   └── main.js
    └── template-parts/
        ├── hero.php
        ├── services.php
        ├── about.php
        ├── portfolio.php
        └── contact.php
```

---

## ⚡ **Ativar Demo ao Vivo (GitHub Pages)**

**Passo único necessário:**

1. **Vá até:** [https://github.com/vininhosts/portfolio/settings/pages](https://github.com/vininhosts/portfolio/settings/pages)
2. **Selecione:**
   - **Source:** `Deploy from a branch`
   - **Branch:** `main`
   - **Folder:** `/docs`
3. **Clique em:** `Save`
4. **Espere 1-2 minutos**
5. **Seu site estará ao vivo em:** [https://vininhosts.github.io/portfolio/](https://vininhosts.github.io/portfolio/)

---

## 📌 **Como Adicionar Seus Projetos**

### Opção 1: Projeto Estático (HTML/CSS/JS)

1. **Crie uma pasta para seu projeto:**
   ```bash
   mkdir -p docs/nome-do-projeto
   ```

2. **Adicione seus arquivos:**
   ```bash
   # Exemplo:
   touch docs/nome-do-projeto/index.html
   touch docs/nome-do-projeto/styles.css
   touch docs/nome-do-projeto/script.js
   ```

3. **Adicione o card no painel de projetos:**
   Edite `docs/index.html` e adicione:
   ```html
   <div class="project-card">
       <div class="project-icon">💻</div>
       <h3>Nome do Projeto</h3>
       <p>Descrição breve do projeto.</p>
       <div>
           <span class="project-tag">HTML</span>
           <span class="project-tag">CSS</span>
           <span class="project-tag">JavaScript</span>
       </div>
       <a href="nome-do-projeto/index.html" class="btn">Ver Projeto</a>
   </div>
   ```

4. **Commit e push:**
   ```bash
   git add docs/
   git commit -m "Adiciona nome-do-projeto"
   git push origin main
   ```

5. **Link ao vivo:** `https://vininhosts.github.io/portfolio/nome-do-projeto/`

---

### Opção 2: Link Externo (Site hospedado em outro lugar)

Se seu projeto já está hospedado:
```html
<div class="project-card">
    <div class="project-icon">🌐</div>
    <h3>Site do Cliente</h3>
    <p>E-commerce para loja de roupas.</p>
    <div>
        <span class="project-tag">WordPress</span>
        <span class="project-tag">WooCommerce</span>
    </div>
    <a href="https://cliente.com.br" class="btn">Visitar Site</a>
</div>
```

---

### Opção 3: Link para GitHub (Código fonte)

Para mostrar o código:
```html
<div class="project-card">
    <div class="project-icon">📦</div>
    <h3>Biblioteca JavaScript</h3>
    <p>Funções utilitárias para projetos web.</p>
    <div>
        <span class="project-tag">JavaScript</span>
        <span class="project-tag">Open Source</span>
    </div>
    <a href="https://github.com/vininhosts/nome-do-repo" class="btn">Ver Código</a>
</div>
```

---

## 🎯 **Template para Novos Cards**

Copie este template e cole dentro de `<div class="projects-grid">`:

```html
<div class="project-card">
    <div class="project-icon">EMOJI</div>
    <h3>NOME DO PROJETO</h3>
    <p>Descrição breve do que o projeto faz.</p>
    <div>
        <span class="project-tag">TAG1</span>
        <span class="project-tag">TAG2</span>
        <span class="project-tag">TAG3</span>
    </div>
    <a href="LINK" class="btn">TEXTO DO BOTÃO</a>
</div>
```

---

## 📊 **Personalização**

### Mudar o nome e informações:
Edite `docs/index.html` e procure por:
- `<a href="./" class="logo">Vinicius<span>Portfólio</span></a>` → Mude para seu nome
- `<h1>Bem-vindo ao meu <span>Portfólio</span></h1>` → Mude o texto
- `<p>Freelancer especializado...</p>` → Mude a descrição
- Footer → Mude as informações de contato

### Mudar as cores:
Edite as variáveis CSS no `<style>`:
```css
:root {
    --primary: #4361ee;      /* Cor principal */
    --primary-dark: #3a56d4;
    --bg: #f8f9fa;          /* Fundo */
    --dark: #212529;        /* Texto escuro */
    --gray: #6c757d;        /* Texto cinza */
    --light: #e9ecef;       /* Fundo claro */
}
```

---

## 🚀 **Dicas para Freelancers**

✅ **Menos é mais** - Mostre seus 3-5 melhores projetos   
✅ **Imagens chamativas** - Adicione screenshots dos projetos   
✅ **Descrições claras** - Explique o que cada projeto faz   
✅ **Tags relevantes** - Use tecnologias que você domina   
✅ **Links funcionando** - Teste todos os links antes de enviar   

---

## 📋 **Checklist Antes de Compartilhar**

- [ ] GitHub Pages está ativado (Settings → Pages → /docs)
- [ ] Todos os links dos projetos funcionam
- [ ] Informações de contato estão corretas
- [ ] Sem texto placeholder (ex: "Novo Projeto")
- [ ] Testado no mobile
- [ ] Sem erros no console (F12 → Console)

---

## 🎨 **Emojis Sugeridos para Ícones**

| Tipo | Emoji | Tipo | Emoji |
|------|-------|------|-------|
| Web | 💻 | Mobile | 📱 |
| Design | 🎨 | E-commerce | 🛒 |
| WordPress | 💼 | API | 📦 |
| Blog | 📝 | Dashboard | 📊 |
| App | 📲 | Game | 🎮 |
| Open Source | 📦 | Database | 🗃️ |

---

## 📝 **Licença**

Este projeto é de código aberto sob a licença **MIT**. Sinta-se à vontade para usar, modificar e compartilhar.

---

**Feito para freelancers impressionarem seus clientes! 🚀**
