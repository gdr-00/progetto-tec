# Regole e contrasti

For usability and accessibility, links should be underlined by default. Otherwise, [link text must have at least 3:1 contrast with surrounding body text](https://webaim.org/articles/contrast/#only), and must present a non-color indicator (typically underline) on mouse hover and keyboard focus. (abbiamo abbastanza contrasto per non mettere la sottolineatura)

In addition, both links and body text must have at least 4.5:1 contrast with the background (3:1 for large text) to meet WCAG 2 Level AA.

![link-nero](link-nero.png)
*link color nero*
![link-bianco](link-bianco.png)
*link color bianco*

Link visited contrast
![link-visited-nero](link-visited-nero.png)
*link visited color nero*
![link-visited-bianco](link-visited-bianco.png)
*link visited color bianco*

Hover menu
![menu-hover-nero](menu-hover-nero.png)
*menu hover color nero*
![menu-hover-bianco](menu-hover-bianco.png)
*menu hover color bianco*

## Norme

Norme menù:
    - Normal: Colore del testo uguale al colore del link, no padding background.
    - Visited: Colore del link come colore del link visitato, no padding background.
    - Active: Colore testo come background e colore padding come colore link.
    - Hover: Colore testo come background e padding il suo complementare. (in questo modo ho contrasto completo tra testo che è del colore opposto e padding che ha colore opposto al background e contrastante con il colore del testo)

Norme bottoni:
    - Colore testo: Come il colore del testo nel body
    - Hover: Colore dei link.

Norme Cards:
    - Card background: poco più chiaro per il tema scuro e come il body per il tema chiaro
    - Contrasto tra cardbg e sfondo non valutato in quanto che si veda la card fisica o no non influisce in modo bloccante sull'esperienza utente.
![card-bg-nero](text-card-contrast-nero.png)
*text-card-contrast nero*
![card-bg-nero](text-card-contrast-bianco.png)
*text-card-contrast bianco*

Norme link:
    - Per superare il test Drue Miller si è optato di tenere i link sottolineati.
    - Colore in contrasto come da immagine *link color nero* *link color bianco* *link visited color nero* *link visited color bianco*

Tabella:

Contrasti thead:
![thead-bg-txt-bianco](thead-bg-text-bianco.png)
![thead-bg-txt-nero](thead-bg-text-nero.png)

Contrasti tbody:
Il colore bianco e bianco su nero come background e colore del testo, gia controllato.
![tbody-bg-txt-nero](tbody-bg-text-nero.png)
