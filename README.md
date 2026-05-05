# Portfolio - Agência Criativa Digital

Bem-vindo ao meu portfólio! Este repositório contém dois exemplos de websites em português para uma agência digital:

1. **Versão HTML/CSS Puro** - Site estático completo
2. **Versão WordPress** - Tema WordPress personalizado

## Estrutura do Projeto

```
portfolio/
├── README.md                 # Este arquivo
├── html-css/                 # Versão HTML/CSS estático
│   ├── index.html            # Página principal
│   ├── styles.css            # Estilos CSS
│   └── script.js             # JavaScript do site
└── wordpress-theme/          # Tema WordPress
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

## Versão HTML/CSS Estático

### Como usar:
1. Navegue até a pasta `html-css/`
2. Abra o arquivo `index.html` em qualquer navegador
3. O site estará funcional com:
   - Navegação responsiva
   - Animações suaves
   - Menu mobile
   - Formulário de contato (simulado)
   - Seções animadas ao rolar

### Recursos:
- Design moderno e responsivo
- 6 seções: Hero, Serviços, Sobre, Portifólio, Contato, Rodapé
- Animações CSS e JavaScript
- Suporta mobile, tablet e desktop
- Cores personalizáveis via variáveis CSS

## Versão WordPress

### Como instalar o tema:

#### Método 1: Upload via Admin WordPress
1. Zip a pasta `wordpress-theme/` para criar `wordpress-theme.zip`
2. No WordPress admin, vá em **Aparência > Temas > Adicionar Novo**
3. Clique em **Enviar Tema** e selecione o arquivo ZIP
4. Ative o tema "Agência Criativa Digital"

#### Método 2: Upload via FTP
1. Renomeie a pasta `wordpress-theme/` para `criativa-digital` (opcional)
2. Envie via FTP para `/wp-content/themes/`
3. No WordPress admin, vá em **Aparência > Temas** e ative

#### Método 3: Git Clone
```bash
cd /caminho/para/wp-content/themes/
git clone https://github.com/vininhosts/portfolio criativa-digital
```

### Configuração do tema:

1. **Menu de Navegação:**
   - Vá em **Aparência > Menus**
   - Crie um novo menu e adicione os links: #inicio, #servicos, #sobre, #portifolio, #contato
   - Atribua ao "Menu Principal"

2. **Personalização:**
   - Vá em **Aparência > Personalizar**
   - Você encontrará opções para:
     - Configurar texto e imagens do Hero
     - Alterar títulos e conteúdos das seções
     - Modificar cores do tema
     - Configurar informações de contato

3. **Widgets:**
   - Vä em **Aparência > Widgets**
   - Adicione widgets à "Barra Lateral" e "Área do Rodapé"

### Recursos do Tema WordPress:
- Tema completamente responsivo
- Personalizador WordPress integrado
- Suporta logotipo customizado
- Suporta menus customizados
- Suporta widgets
- Suporta imagens destacadas
- Animações suaves
- Design moderno com CSS Grid e Flexbox

## Tecnologias Utilizadas

### HTML/CSS Version:
- HTML5
- CSS3 (Flexbox, Grid, Variáveis CSS)
- Vanilla JavaScript (ES6+)
- Google Fonts (Poppins)
- Unsplash (imagens de exemplo)

### WordPress Version:
- PHP 7.4+
- WordPress 5.0+
- jQuery
- WordPress Customizer API
- Theme Mods API

## Personalização

### Para a versão HTML/CSS:
1. Edite `index.html` para modificar o conteúdo
2. Edite `styles.css` para modificar estilos
3. Edite `script.js` para modificar comportamentos

### Para a versão WordPress:
1. Use o Personalizador WordPress (**Aparência > Personalizar**)
2. Edite arquivos do tema conforme necessário
3. Crie um child theme para modificações seguras

## Configuração do GitHub

Para enviar este projeto para o seu repositório GitHub `portfolio`:

```bash
# Navegue até a pasta do projeto
cd ~/Projects/portfolio

# Inicialize o repositório git (se não tiver)
git init

# Adicione todos os arquivos
git add .

# Faça o commit
git commit -m "Adiciona website exemplo em HTML/CSS e WordPress"

# Adicione o remote do seu GitHub
git remote add origin https://github.com/vininhosts/portfolio.git

# Envie para o GitHub
git branch -M main
git push -u origin main
```

## Problems ou Dúvidas

Se você encontrar algum problema ou tiver dúvidas sobre como usar este tema, abra uma **Issue** no repositório GitHub.

## Licença

Este projeto é de código aberto e está disponível sob a licença **GPL-2.0-or-later**.

---

Feito com carinho para a comunidade WordPress e de desenvolvimento web. 🚀
