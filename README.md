# 🎨 Meu Portfólio - Agência Criativa Digital

> **👉 [VER DEMO AO VIVO](https://vininhosts.github.io/portfolio/)**

Bem-vindo ao meu portfólio! Este repositório contém dois exemplos de websites em português para demonstrar minhas habilidades como freelancer.

---

## 🌐 **DEMO AO VIVO**

**Clique no link abaixo para ver o site funcionando:**
🔗 **[https://vininhosts.github.io/portfolio/](https://vininhosts.github.io/portfolio/)**

*Se não estiver funcionando, veja as instruções de ativação abaixo.*

---

## 📁 Estrutura do Projeto

```
portfolio/
├── README.md                 # Este arquivo
├── docs/                     # 🌐 DEMO AO VIVO (GitHub Pages)
│   ├── index.html            # Página principal
│   ├── styles.css            # Estilos CSS
│   └── script.js             # JavaScript do site
├── html-css/                 # 📂 Versão HTML/CSS estático
│   ├── index.html            # Página principal
│   ├── styles.css            # Estilos CSS
│   └── script.js             # JavaScript do site
└── wordpress-theme/          # 📂 Tema WordPress
    ├── style.css             # Estilos do tema
    ├── functions.php          # Funções do tema
    ├── header.php            # Cabeçalho do tema
    ├── footer.php            # Rodapé do tema
    ├── index.php             # Template principal
    ├── js/                   # JavaScript do tema
    │   └── main.js           # Scripts jQuery
    └── template-parts/       # Partes reutilizáveis
        ├── hero.php         # Seção Hero
        ├── services.php     # Seção de Serviços
        ├── about.php        # Seção Sobre
        ├── portfolio.php    # Seção Portifólio
        └── contact.php      # Seção Contato
```

---

## ⚡ Ativar Demo ao Vivo (GitHub Pages)

**Para que seus clientes vejam o site funcionando:**

1. **Vá até seu repositório no GitHub:**
   → [https://github.com/vininhosts/portfolio](https://github.com/vininhosts/portfolio)

2. **Clique em Settings (Configurações) → Pages**

3. **Configurações do GitHub Pages:**
   - **Source (Fonte):** `Deploy from a branch`
   - **Branch:** `main`
   - **Folder (Pasta):** `/docs`
   - Clique em **Save (Salvar)**

4. **Espere 1-2 minutos** e seu site estará disponível em:
   🔗 **https://vininhosts.github.io/portfolio/**

5. **Compartilhe este link com seus clientes!**

---

## 📱 Versão HTML/CSS Estático

### Para testar localmente:
```bash
# Navegue até a pasta
cd portfolio/html-css/

# Abra o arquivo no navegador
open index.html
```

**Recursos:**
- ✅ Design moderno e responsivo
- ✅ 6 seções: Hero, Serviços, Sobre, Portifólio, Contato, Rodapé
- ✅ Animações CSS e JavaScript
- ✅ Menu mobile (hamburger)
- ✅ Formulário de contato com validação
- ✅ Contador animado de estatísticas
- ✅ Botão "Voltar ao topo"
- ✅ Totalmente em português

### Personalizar:
- Edite `index.html` para mudar o conteúdo
- Edite `styles.css` para mudar as cores e estilos
- Edite `script.js` para mudar comportamentos

---

## 💼 Tema WordPress

### Para instalar:

**Método 1 - Download e Upload:**
```bash
# Compacte a pasta do tema
cd portfolio
zip -r criativa-digital.zip wordpress-theme/
```
1. No WordPress, vá em **Aparência → Temas → Adicionar Novo → Enviar Tema**
2. Selecione o arquivo `criativa-digital.zip`
3. Ative o tema

**Método 2 - Clone direto:**
```bash
cd /caminho/para/wp-content/themes/
git clone https://github.com/vininhosts/portfolio criativa-digital
```

### Configurar no WordPress:
1. **Criar Menu:**
   - Vá em **Aparência → Menus**
   - Crie novo menu com links: `#inicio`, `#servicos`, `#sobre`, `#portifolio`, `#contato`
   - Atribua ao "Menu Principal"

2. **Personalizar:**
   - Vá em **Aparência → Personalizar**
   - Configure textos, imagens e cores

---

## 🛠️ Como Freelancer

### O que seus clientes verão:
- **Design profissional** - Layout moderno e limpo
- **Portifólio completo** - 6 projetos de exemplo
- **Serviços listados** - Desenvolvimento Web, Design UI/UX, Marketing Digital, etc.
- **Informações de contato** - Formulário e dados para contato
- **Responsivo** - Funciona em mobile, tablet e desktop

### Dicas:
1. **Adicione seus projetos reais** na seção Portifólio
2. **Atualize as informações de contato** com seus dados
3. **Mude as imagens** para fotos reais do seu trabalho
4. **Personalize as cores** para combinar com sua marca

---

## 📊 Tecnologias Utilizadas

| Versão | Tecnologias |
|--------|-------------|
| HTML/CSS | HTML5, CSS3 (Flexbox, Grid), JavaScript ES6+ |
| WordPress | PHP 7.4+, WordPress 5.0+, jQuery, Customizer API |

---

## 📝 Licença

Este projeto é de código aberto sob a licença **GPL-2.0-or-later**.

---

**Feito para freelancers que querem impressionar seus clientes! 🚀**

*Precisa de ajuda? Abra uma Issue neste repositório.*
