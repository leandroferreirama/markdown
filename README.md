
# HTML to Markdown Converter

Este é um pacote PHP simples que converte HTML em Markdown. Ele é ideal para transformar conteúdo HTML em um formato mais simples e legível, como Markdown.

## Instalação

Você pode instalar o pacote via [Composer](https://getcomposer.org):

```bash
composer require leandroferreirama/markdown
```

## Uso

```php
<?php

require 'vendor/autoload.php';

use LeandroFerreiraMa\Markdown\HtmlToMarkdown;

$converter = new HtmlToMarkdown();

$html = '<h1>Título</h1><p>Este é um <strong>parágrafo</strong> com <em>ênfase</em> e um <a href="http://exemplo.com">link</a>.</p>';
$markdown = $converter->convert($html);

echo $markdown;
```

Um exemplo de uso completo também está disponível na pasta `example`, no arquivo `index.php`:

```php
<?php

require '../vendor/autoload.php';

use LeandroFerreiraMa\Markdown\HtmlToMarkdown;

$converter = new HtmlToMarkdown();

$html = '<h1>Título de Exemplo</h1><p>Este é um <strong>exemplo de parágrafo</strong> com <em>ênfase</em> e um <a href="http://exemplo.com">link de exemplo</a>.</p>';
$markdown = $converter->convert($html);

echo $markdown;
```

## Funcionalidades

- Conversão de títulos (`h1` a `h6`) para Markdown usando `#`.
- Conversão de parágrafos (`p`) para blocos de texto com quebras de linha.
- Conversão de negrito (`strong` e `b`) e itálico (`em` e `i`) para `**` e `*` no Markdown.
- Suporte a links (`a`) com o formato `[Texto](URL)`.
- Suporte a listas ordenadas (`ol`) e não ordenadas (`ul`).

## Contribuição

Contribuições são bem-vindas! Se você encontrar algum problema ou quiser sugerir melhorias, sinta-se à vontade para abrir uma _issue_ ou enviar um _pull request_.

## Licença

Este pacote está licenciado sob a licença MIT. Consulte o arquivo [LICENSE](LICENSE) para mais detalhes.
