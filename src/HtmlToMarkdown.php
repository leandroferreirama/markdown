<?php

namespace LeandroFerreiraMa\Markdown;

class HtmlToMarkdown {
    public function convert($html) {
        $dom = new \DOMDocument();
        @$dom->loadHTML($html); // Suprimir avisos devido a possíveis diferenças de doctype
        $markdown = $this->processNode($dom->documentElement);
        return trim($markdown);
    }

    private function processNode($node) {
        $markdown = '';
        foreach ($node->childNodes as $child) {
            switch ($child->nodeName) {
                case 'h1':
                    $markdown .= '# ' . $this->processNode($child) . "\n\n";
                    break;
                case 'h2':
                    $markdown .= '## ' . $this->processNode($child) . "\n\n";
                    break;
                case 'h3':
                    $markdown .= '### ' . $this->processNode($child) . "\n\n";
                    break;
                case 'h4':
                    $markdown .= '#### ' . $this->processNode($child) . "\n\n";
                    break;
                case 'h5':
                    $markdown .= '##### ' . $this->processNode($child) . "\n\n";
                    break;
                case 'h6':
                    $markdown .= '###### ' . $this->processNode($child) . "\n\n";
                    break;
                case 'p':
                    $markdown .= $this->processNode($child) . "\n\n";
                    break;
                case 'strong':
                case 'b':
                    $markdown .= '**' . $this->processNode($child) . '**';
                    break;
                case 'em':
                case 'i':
                    $markdown .= '*' . $this->processNode($child) . '*';
                    break;
                case 'a':
                    $href = $child->getAttribute('href');
                    $markdown .= '[' . $this->processNode($child) . '](' . $href . ')';
                    break;
                case 'ul':
                    $markdown .= $this->processList($child, '*') . "\n";
                    break;
                case 'ol':
                    $markdown .= $this->processList($child, '1.') . "\n";
                    break;
                case 'li':
                    $markdown .= '- ' . $this->processNode($child) . "\n";
                    break;
                case 'br':
                    $markdown .= "  \n";
                    break;
                default:
                    if ($child->nodeType === XML_TEXT_NODE) {
                        $markdown .= $child->nodeValue;
                    } else {
                        $markdown .= $this->processNode($child);
                    }
                    break;
            }
        }
        return $markdown;
    }

    private function processList($node, $bullet) {
        $markdown = '';
        $counter = 1;
        foreach ($node->childNodes as $child) {
            if ($child->nodeName === 'li') {
                if ($bullet === '1.') {
                    $markdown .= $counter . '. ' . $this->processNode($child) . "\n";
                    $counter++;
                } else {
                    $markdown .= '* ' . $this->processNode($child) . "\n";
                }
            }
        }
        return $markdown;
    }
}
