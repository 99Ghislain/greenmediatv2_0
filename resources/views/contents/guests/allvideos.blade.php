@extends('layouts/guestLayout')
@section('layoutContent')

<style>
    /* Green Media TV : identité locale, sans modification des styles globaux. */
    .gm-tv-page {
        --gm-green: #127319;
        --gm-orange: #ffa000;
        --gm-ink: #14241d;
        --gm-muted: #65716b;
        --gm-soft: #f4f7f4;
        --gm-line: #e8eee9;
        color: var(--gm-ink);
    }
    .gm-tv-page a { text-decoration: none; }
    .gm-tv-page a:focus-visible {
        outline: 3px solid var(--gm-orange);
        outline-offset: 3px;
    }
    .gm-tv-breadcrumb {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 10px;
        padding: 0;
        margin: 0 0 22px;
        list-style: none;
        font-size: .82rem;
        font-weight: 700;
    }
    .gm-tv-breadcrumb a { color: var(--gm-green); }
    .gm-tv-breadcrumb span { color: #8a968e; }
    .gm-tv-masthead {
        position: relative;
        isolation: isolate;
        overflow: hidden;
        border-radius: 24px;
        background: radial-gradient(circle at 85% 20%, rgba(255,160,0,.16), transparent 33%),
                    linear-gradient(125deg, #08271b 0%, #0b3c26 54%, #126b37 100%);
        color: #fff;
        padding: clamp(18px, 2.4vw, 30px);
        margin-bottom: 38px;
        box-shadow: 0 24px 45px rgba(7,49,28,.13);
    }
    .gm-tv-masthead::after {
        content: '';
        position: absolute;
        width: 410px;
        height: 410px;
        border: 1px solid rgba(255,255,255,.13);
        border-radius: 50%;
        right: -115px;
        top: -190px;
        box-shadow: 0 0 0 70px rgba(255,255,255,.025), 0 0 0 140px rgba(255,255,255,.018);
        z-index: -1;
        pointer-events: none;
    }
    .gm-tv-eyebrow {
        display: inline-flex;
        gap: 9px;
        align-items: center;
        color: var(--gm-orange);
        font-size: .75rem;
        letter-spacing: .17em;
        text-transform: uppercase;
        font-weight: 900;
    }
    .gm-tv-eyebrow::before {
        content: '';
        width: 25px;
        height: 3px;
        background: currentColor;
        border-radius: 20px;
    }
    .gm-tv-masthead h1 {
        color: #fff;
        font-family: 'Montserrat', sans-serif;
        font-size: clamp(1.45rem, 2.9vw, 2.45rem);
        font-weight: 900;
        line-height: 1.12;
        letter-spacing: -.045em;
        margin: 8px 0 6px;
        max-width: 780px;
    }
    .gm-tv-masthead h1 span { color: var(--gm-orange); }
    .gm-tv-masthead p {
        color: rgba(255,255,255,.82);
        font-size: 1rem;
        line-height: 1.45;
        max-width: 640px;
        margin: 0;
    }
    .gm-tv-masthead-bottom {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        align-items: center;
        margin-top: 12px;
    }
    .gm-tv-count-pill {
        display: inline-flex;
        gap: 10px;
        align-items: center;
        background: rgba(255,255,255,.12);
        border: 1px solid rgba(255,255,255,.2);
        border-radius: 40px;
        padding: 9px 15px;
        color: #fff;
        font-size: .82rem;
        font-weight: 700;
    }
    .gm-tv-count-pill i { color: var(--gm-orange); }
    .gm-tv-section-heading {
        display: flex;
        align-items: end;
        justify-content: space-between;
        gap: 16px;
        margin: 0 0 22px;
        padding-bottom: 13px;
        border-bottom: 1px solid var(--gm-line);
    }
    .gm-tv-section-heading small {
        display: block;
        margin-bottom: 6px;
        color: var(--gm-green);
        font-weight: 900;
        font-size: .72rem;
        letter-spacing: .15em;
        text-transform: uppercase;
    }
    .gm-tv-section-heading h2 {
        font-family: 'Montserrat', sans-serif;
        font-size: clamp(1.35rem, 2.3vw, 1.85rem);
        font-weight: 900;
        line-height: 1.2;
        letter-spacing: -.035em;
        color: var(--gm-ink);
        margin: 0;
    }
    .gm-tv-section-heading .gm-tv-range {
        color: var(--gm-muted);
        font-size: .77rem;
        font-weight: 700;
        white-space: nowrap;
    }

    /* Une vidéo principale, trois sujets voisins, et des cartes éditoriales. */
    .gm-tv-spotlight { margin-bottom: 44px; }
    .gm-tv-lead {
        position: relative;
        isolation: isolate;
        height: 100%;
        min-height: 390px;
        overflow: hidden;
        border-radius: 21px;
        background: #10241b;
        box-shadow: 0 18px 40px rgba(8,29,16,.14);
    }
    .gm-tv-lead-image {
        display: block;
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
    }
    .gm-tv-lead-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .55s ease;
    }
    .gm-tv-lead:hover .gm-tv-lead-image img { transform: scale(1.045); }
    .gm-tv-lead::after {
        content: '';
        position: absolute;
        inset: 0;
        z-index: 0;
        pointer-events: none;
        background: linear-gradient(180deg, rgba(3,14,9,.07) 15%, rgba(3,14,9,.88) 100%);
    }
    .gm-tv-lead-label {
        position: absolute;
        z-index: 2;
        top: 22px;
        left: 22px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 14px;
        border-radius: 7px;
        background: var(--gm-orange);
        color: #151b0c;
        font-size: .72rem;
        font-weight: 900;
        letter-spacing: .08em;
        text-transform: uppercase;
    }
    .gm-tv-lead-copy {
        position: absolute;
        z-index: 2;
        left: 0;
        right: 0;
        bottom: 0;
        padding: clamp(22px, 3.5vw, 42px);
    }
    .gm-tv-lead-category {
        color: #ffc46a;
        font-size: .72rem;
        text-transform: uppercase;
        letter-spacing: .16em;
        font-weight: 900;
    }
    .gm-tv-lead-title {
        font-family: 'Montserrat', sans-serif;
        font-weight: 900;
        font-size: clamp(1.4rem, 2.35vw, 2.4rem);
        line-height: 1.24;
        margin: 10px 0 14px;
        max-width: 700px;
    }
    .gm-tv-lead-title a { color: #fff; }
    .gm-tv-lead-title a:hover { color: #ffca78; }
    .gm-tv-lead-meta { color: #f2f5ef; font-size: .83rem; font-weight: 650; }
    .gm-tv-lead-meta i { margin-right: 6px; color: var(--gm-orange); }
    .gm-tv-teasers {
        display: flex;
        flex-direction: column;
        gap: 12px;
        height: 100%;
    }
    .gm-tv-teaser {
        display: grid;
        grid-template-columns: 43% 1fr;
        gap: 13px;
        padding: 11px;
        border: 1px solid var(--gm-line);
        border-radius: 15px;
        background: #fff;
        min-height: 112px;
        flex: 1;
        box-shadow: 0 8px 24px rgba(17,52,29,.045);
        transition: transform .25s ease, box-shadow .25s ease;
    }
    .gm-tv-teaser:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(17,52,29,.1);
    }
    .gm-tv-teaser-thumb {
        display: block;
        position: relative;
        overflow: hidden;
        aspect-ratio: 16/10;
        border-radius: 9px;
        background: #14251b;
        height: 100%;
    }
    .gm-tv-teaser-thumb img { height: 100%; width: 100%; object-fit: cover; }
    .gm-tv-teaser-play {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        display: grid;
        place-items: center;
        width: 33px;
        height: 33px;
        border-radius: 50%;
        color: #fff;
        background: rgba(7,26,15,.7);
        border: 1px solid rgba(255,255,255,.65);
    }
    .gm-tv-teaser-body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-width: 0;
    }
    .gm-tv-teaser-type {
        text-transform: uppercase;
        letter-spacing: .1em;
        color: var(--gm-green);
        font-weight: 900;
        font-size: .65rem;
        margin-bottom: 5px;
    }
    .gm-tv-teaser-title {
        font-family: 'Montserrat', sans-serif;
        color: var(--gm-ink);
        font-weight: 800;
        font-size: .87rem;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .gm-tv-teaser-title:hover { color: var(--gm-green); }
    .gm-tv-teaser-date {
        color: var(--gm-muted);
        font-size: .7rem;
        margin-top: 8px;
    }

    .gm-tv-card {
        display: flex;
        flex-direction: column;
        height: 100%;
        overflow: hidden;
        border-radius: 16px;
        background: #fff;
        border: 1px solid var(--gm-line);
        box-shadow: 0 8px 25px rgba(12,47,27,.055);
        transition: transform .25s ease, box-shadow .25s ease;
    }
    .gm-tv-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 18px 36px rgba(12,47,27,.13);
    }
    .gm-tv-card-media {
        display: block;
        position: relative;
        aspect-ratio: 16 / 9;
        overflow: hidden;
        background: #14251b;
    }
    .gm-tv-card-media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .45s ease;
    }
    .gm-tv-card:hover .gm-tv-card-media img { transform: scale(1.06); }
    .gm-tv-card-play {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        display: grid;
        place-items: center;
        border: 1px solid rgba(255,255,255,.75);
        border-radius: 50%;
        height: 52px;
        width: 52px;
        color: #fff;
        background: rgba(11,31,19,.7);
        backdrop-filter: blur(5px);
        font-size: 1.1rem;
    }
    .gm-tv-card-tag {
        position: absolute;
        left: 12px;
        top: 12px;
        background: rgba(8,32,19,.83);
        color: #fff;
        border-radius: 5px;
        font-weight: 800;
        font-size: .62rem;
        letter-spacing: .07em;
        padding: 7px 10px;
        text-transform: uppercase;
    }
    .gm-tv-card-tag.is-live { background: #b83025; }
    .gm-tv-card-body {
        display: flex;
        flex-direction: column;
        gap: 12px;
        flex: 1;
        padding: 18px;
    }
    .gm-tv-card-title {
        color: var(--gm-ink);
        font-family: 'Montserrat', sans-serif;
        font-size: 1rem;
        font-weight: 850;
        line-height: 1.45;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .gm-tv-card-title:hover { color: var(--gm-green); }
    .gm-tv-card-footer {
        margin-top: auto;
        border-top: 1px solid var(--gm-line);
        padding-top: 12px;
        color: var(--gm-muted);
        font-size: .75rem;
        font-weight: 650;
        display: flex;
        align-items: center;
        gap: 7px;
    }
    .gm-tv-card-footer i { color: var(--gm-green); }
    .gm-tv-empty {
        padding: 50px 22px;
        border: 1px dashed #cedbce;
        border-radius: 20px;
        color: var(--gm-muted);
        text-align: center;
        background: #f8fbf8;
    }
    .gm-tv-empty i { display: block; font-size: 3rem; margin-bottom: 14px; color: #8ba48c; }
    .gm-tv-sidebar {
        position: sticky;
        top: 22px;
    }
    .gm-tv-sidebar .gm-quote-card {
        border-radius: 14px;
        background: #f8faf8;
        border: 1px solid var(--gm-line);
        border-left: 4px solid var(--gm-green);
        padding: 23px 20px 20px 27px;
        margin-bottom: 15px;
        position: relative;
    }
    .gm-tv-sidebar .gm-quote-icon {
        color: rgba(18,115,25,.15);
        font-size: 1.4rem;
        position: absolute;
        top: 10px;
        left: 7px;
    }
    .gm-tv-sidebar .gm-quote-text {
        color: #3e5045;
        font-family: Georgia, serif;
        font-size: .94rem;
        line-height: 1.65;
        font-style: italic;
        margin-bottom: 11px;
    }
    .gm-tv-sidebar .gm-quote-author {
        color: var(--gm-green);
        font-size: .72rem;
        font-weight: 800;
        text-transform: uppercase;
    }
    .gm-tv-sidebar .gm-sidebar-sticky { position: static; }
    .gm-tv-pagination {
        display: flex;
        justify-content: center;
        margin: 22px 0 46px;
    }
    .gm-tv-pagination .pagination { flex-wrap: wrap; justify-content: center; }
    @media (max-width: 1199px) {
        .gm-tv-lead { min-height: 330px; }
        .gm-tv-teaser { grid-template-columns: 40% 1fr; }
        .gm-tv-teaser-title { font-size: .78rem; }
    }
    @media (max-width: 991px) {
        .gm-tv-lead { min-height: 400px; }
        .gm-tv-teasers { margin-top: 15px; }
        .gm-tv-sidebar { position: static; margin-top: 14px; }
    }
    @media (max-width: 575px) {
        .gm-tv-masthead { padding: 18px 18px; border-radius: 17px; margin-bottom: 22px; }
        .gm-tv-lead { min-height: 360px; border-radius: 15px; }
        .gm-tv-lead-label { top: 14px; left: 14px; }
        .gm-tv-lead-copy { padding: 24px 18px; }
        .gm-tv-lead-title { font-size: 1.36rem; }
        .gm-tv-teaser { min-height: 110px; }
        .gm-tv-section-heading { align-items: start; flex-direction: column; }
    }
    @media (prefers-reduced-motion: reduce) {
        .gm-tv-page *, .gm-tv-page *::before, .gm-tv-page *::after {
            transition-duration: .01ms !important;
            animation-duration: .01ms !important;
        }
    }

    /* V2 — TITRES VISIBLEMENT SOUS LES REPORTAGES
       Correction exclusivement CSS : les titres Blade, liens et lecteurs sont inchangés. */
    .gm-tv-page .gm-tv-lead {
        display: flex;
        flex-direction: column;
        min-height: 0;
        height: 100%;
        background: #fff;
        border: 1px solid var(--gm-line);
    }
    .gm-tv-page .gm-tv-lead::after { display: none; }
    .gm-tv-page .gm-tv-lead-image {
        position: relative;
        inset: auto;
        aspect-ratio: 16 / 9;
        height: auto;
        flex: 0 0 auto;
    }
    .gm-tv-page .gm-tv-lead-copy {
        position: relative;
        left: auto;
        right: auto;
        bottom: auto;
        padding: 22px 25px 26px;
        background: #fff;
        flex-grow: 1;
    }
    .gm-tv-page .gm-tv-lead-category { color: var(--gm-green); }
    .gm-tv-page .gm-tv-lead-title {
        display: block;
        font-size: clamp(1.3rem, 2vw, 1.85rem);
        line-height: 1.35;
        margin: 9px 0 12px;
    }
    .gm-tv-page .gm-tv-lead-title a {
        display: block !important;
        color: var(--gm-ink) !important;
        opacity: 1 !important;
        visibility: visible !important;
    }
    .gm-tv-page .gm-tv-lead-title a:hover { color: var(--gm-green) !important; }
    .gm-tv-page .gm-tv-lead-meta { color: var(--gm-muted); }
    .gm-tv-page .gm-tv-lead-meta i { color: var(--gm-green); }

    /* Les reportages secondaires affichent aussi l'image au-dessus du titre. */
    .gm-tv-page .gm-tv-teaser {
        display: flex;
        flex-direction: column;
        gap: 0;
        padding: 0;
        min-height: 0;
        overflow: hidden;
    }
    .gm-tv-page .gm-tv-teaser-thumb {
        display: block;
        width: 100%;
        height: 130px;
        aspect-ratio: auto;
        flex: 0 0 auto;
        border-radius: 14px 14px 0 0;
    }
    .gm-tv-page .gm-tv-teaser-body {
        display: flex;
        flex-direction: column;
        align-items: stretch;
        justify-content: flex-start;
        padding: 12px 15px 15px;
        flex-grow: 1;
    }
    .gm-tv-page .gm-tv-teaser-title {
        display: -webkit-box !important;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        overflow: hidden;
        color: var(--gm-ink) !important;
        opacity: 1 !important;
        visibility: visible !important;
        font-size: .9rem;
        font-weight: 850;
        line-height: 1.4;
        margin: 2px 0 0;
    }
    .gm-tv-page .gm-tv-teaser-title:hover { color: var(--gm-green) !important; }
    .gm-tv-page .gm-tv-teaser-date { margin-top: auto; padding-top: 8px; }

    /* Confirmation du titre juste sous chaque miniature du catalogue. */
    .gm-tv-page .gm-tv-card-body { display: flex; flex-direction: column; }
    .gm-tv-page .gm-tv-card-title {
        display: -webkit-box !important;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
        color: var(--gm-ink) !important;
        visibility: visible !important;
        opacity: 1 !important;
        font-size: 1.05rem;
        font-weight: 850;
        line-height: 1.48;
        margin: 0 0 5px;
    }
    .gm-tv-page .gm-tv-card-title:hover { color: var(--gm-green) !important; }
    @media (max-width: 991px) {
        .gm-tv-page .gm-tv-teaser-thumb { height: auto; aspect-ratio: 16 / 9; }
        .gm-tv-page .gm-tv-lead-copy { padding: 20px; }
    }
    @media (max-width: 575px) {
        .gm-tv-page .gm-tv-lead-title { font-size: 1.28rem; }
        .gm-tv-page .gm-tv-teaser-title { font-size: .98rem; }
    }

    /* V3 - PRESENTATION LISTE HORIZONTALE, style reportage (ordinateur et mobile).
       Aucun changement des boucles Blade, des URLs, du PHP ou de la pagination. */

    /* Le catalogue utilise toute la largeur. La colonne éditoriale suit après la liste. */
    .gm-tv-page > .container > .row > main.col-lg-8,
    .gm-tv-page > .container > .row > aside.col-lg-4 {
        flex: 0 0 100% !important;
        max-width: 100% !important;
        width: 100% !important;
    }
    .gm-tv-page > .container > .row > aside.gm-tv-sidebar {
        position: static;
        margin-top: 35px;
        padding-top: 25px;
        border-top: 1px solid var(--gm-line);
    }
    .gm-tv-page .gm-tv-sidebar-original-content {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 16px;
        align-items: stretch;
    }
    .gm-tv-page .gm-tv-sidebar-original-content > .gm-quote-card {
        margin-bottom: 0;
    }
    .gm-tv-page .gm-tv-sidebar-original-content > div:last-child {
        grid-column: 1 / -1;
        margin-top: 4px !important;
    }

    /* Les quatre vidéos de la sélection apparaissent aussi en lignes. */
    .gm-tv-page .gm-tv-spotlight > .row > .col-lg-8,
    .gm-tv-page .gm-tv-spotlight > .row > .col-lg-4 {
        flex: 0 0 100% !important;
        max-width: 100% !important;
        width: 100% !important;
        margin-bottom: 0 !important;
    }
    .gm-tv-page .gm-tv-spotlight,
    .gm-tv-page .gm-tv-spotlight .gm-tv-teasers {
        margin-bottom: 25px;
    }
    .gm-tv-page .gm-tv-lead,
    .gm-tv-page .gm-tv-teaser,
    .gm-tv-page .gm-tv-card {
        display: grid !important;
        grid-template-columns: minmax(170px, 29%) minmax(0, 1fr) !important;
        align-items: start;
        gap: 0 !important;
        width: 100%;
        height: auto !important;
        min-height: 0 !important;
        padding: 14px 0 !important;
        border: 0 !important;
        border-bottom: 1px solid var(--gm-line) !important;
        border-radius: 0 !important;
        background: #fff !important;
        box-shadow: none !important;
        transform: none !important;
        overflow: visible;
    }
    .gm-tv-page .gm-tv-lead:hover,
    .gm-tv-page .gm-tv-teaser:hover,
    .gm-tv-page .gm-tv-card:hover {
        transform: none !important;
        box-shadow: none !important;
        background: #f9fbf9 !important;
    }

    /* Images à gauche, toujours au ratio YouTube 16:9. */
    .gm-tv-page .gm-tv-lead-image,
    .gm-tv-page .gm-tv-teaser-thumb,
    .gm-tv-page .gm-tv-card-media {
        display: block !important;
        position: relative !important;
        inset: auto !important;
        width: 100% !important;
        height: auto !important;
        min-height: 0 !important;
        aspect-ratio: 16 / 9 !important;
        overflow: hidden;
        border-radius: 11px !important;
        background: #12271b;
    }
    .gm-tv-page .gm-tv-lead-image img,
    .gm-tv-page .gm-tv-teaser-thumb img,
    .gm-tv-page .gm-tv-card-media img {
        display: block;
        width: 100% !important;
        height: 100% !important;
        object-fit: cover;
        border-radius: 11px;
    }
    .gm-tv-page .gm-tv-lead::after,
    .gm-tv-page .gm-tv-lead-label {
        display: none !important;
    }
    .gm-tv-page .gm-tv-teasers {
        display: block !important;
        height: auto !important;
        margin-top: 0 !important;
    }

    /* Titres et métadonnées occupent la colonne de droite. */
    .gm-tv-page .gm-tv-lead-copy,
    .gm-tv-page .gm-tv-teaser-body,
    .gm-tv-page .gm-tv-card-body {
        display: flex !important;
        flex-direction: column !important;
        justify-content: flex-start !important;
        align-items: stretch !important;
        position: static !important;
        min-width: 0;
        height: auto !important;
        background: transparent !important;
        padding: 5px 16px 4px 22px !important;
        gap: 7px !important;
    }
    .gm-tv-page .gm-tv-lead-category,
    .gm-tv-page .gm-tv-teaser-type {
        font-family: 'Montserrat', sans-serif;
        color: var(--gm-green) !important;
        font-size: .68rem !important;
        font-weight: 900 !important;
        letter-spacing: .08em !important;
        text-transform: uppercase;
        margin: 0;
    }
    .gm-tv-page .gm-tv-lead-title,
    .gm-tv-page .gm-tv-teaser-title,
    .gm-tv-page .gm-tv-card-title {
        display: -webkit-box !important;
        -webkit-box-orient: vertical !important;
        -webkit-line-clamp: 3;
        overflow: hidden;
        max-width: none !important;
        padding: 0 !important;
        margin: 0 !important;
        font-family: 'Montserrat', sans-serif !important;
        font-size: clamp(.96rem, 1.4vw, 1.2rem) !important;
        font-weight: 800 !important;
        line-height: 1.45 !important;
        color: #1b2a21 !important;
        visibility: visible !important;
        opacity: 1 !important;
        text-transform: none !important;
    }
    .gm-tv-page .gm-tv-lead-title a {
        display: inline !important;
        color: inherit !important;
        visibility: visible !important;
        opacity: 1 !important;
    }
    .gm-tv-page .gm-tv-lead-title a:hover,
    .gm-tv-page .gm-tv-teaser-title:hover,
    .gm-tv-page .gm-tv-card-title:hover {
        color: var(--gm-green) !important;
    }
    .gm-tv-page .gm-tv-lead-meta,
    .gm-tv-page .gm-tv-teaser-date,
    .gm-tv-page .gm-tv-card-footer {
        margin: 0 !important;
        padding: 0 !important;
        border: 0 !important;
        display: flex !important;
        gap: 7px;
        align-items: center;
        color: #758079 !important;
        font-size: .78rem !important;
        line-height: 1.4;
        font-weight: 500 !important;
    }
    .gm-tv-page .gm-tv-card-footer i,
    .gm-tv-page .gm-tv-lead-meta i { color: var(--gm-green) !important; }
    .gm-tv-page .gm-tv-card-tag {
        left: 9px;
        top: 9px;
        padding: 5px 8px;
        border-radius: 5px;
        font-size: .59rem;
    }
    .gm-tv-page .gm-tv-card-play {
        width: 42px;
        height: 42px;
        font-size: 1rem;
    }

    /* Une entrée = une ligne, y compris dans la grille existante de Bootstrap. */
    .gm-tv-page main > .row > .col-md-6 {
        flex: 0 0 100% !important;
        max-width: 100% !important;
        width: 100% !important;
        margin-bottom: 0 !important;
    }
    .gm-tv-page .gm-tv-section-heading {
        margin-bottom: 14px;
    }
    .gm-tv-page .gm-tv-pagination {
        margin-top: 28px;
    }

    /* Sur téléphone, la miniature reste à gauche comme dans la référence. */
    @media (max-width: 767px) {
        .gm-tv-page .gm-tv-lead,
        .gm-tv-page .gm-tv-teaser,
        .gm-tv-page .gm-tv-card {
            grid-template-columns: minmax(0, 41%) minmax(0, 1fr) !important;
            padding: 12px 0 !important;
            align-items: start !important;
        }
        .gm-tv-page .gm-tv-lead-copy,
        .gm-tv-page .gm-tv-teaser-body,
        .gm-tv-page .gm-tv-card-body {
            gap: 5px !important;
            padding: 0 0 0 13px !important;
        }
        .gm-tv-page .gm-tv-lead-title,
        .gm-tv-page .gm-tv-teaser-title,
        .gm-tv-page .gm-tv-card-title {
            -webkit-line-clamp: 2 !important;
            font-size: clamp(.79rem, 3.45vw, .98rem) !important;
            line-height: 1.35 !important;
        }
        .gm-tv-page .gm-tv-lead-category,
        .gm-tv-page .gm-tv-teaser-type {
            font-size: .58rem !important;
            letter-spacing: .04em !important;
        }
        .gm-tv-page .gm-tv-lead-meta,
        .gm-tv-page .gm-tv-teaser-date,
        .gm-tv-page .gm-tv-card-footer {
            font-size: .68rem !important;
        }
        .gm-tv-page .gm-tv-card-tag {
            font-size: .53rem;
            padding: 4px 6px;
            top: 6px;
            left: 6px;
        }
        .gm-tv-page .gm-tv-card-play,
        .gm-tv-page .gm-tv-teaser-play {
            width: 29px;
            height: 29px;
            font-size: .8rem;
        }
        .gm-tv-page .gm-tv-sidebar-original-content {
            display: block !important;
        }
        .gm-tv-page .gm-tv-sidebar-original-content > .gm-quote-card {
            margin-bottom: 14px;
        }
    }
    @media (max-width: 360px) {
        .gm-tv-page .gm-tv-lead,
        .gm-tv-page .gm-tv-teaser,
        .gm-tv-page .gm-tv-card {
            grid-template-columns: minmax(0, 39%) minmax(0, 1fr) !important;
        }
        .gm-tv-page .gm-tv-lead-copy,
        .gm-tv-page .gm-tv-teaser-body,
        .gm-tv-page .gm-tv-card-body {
            padding-left: 10px !important;
        }
        .gm-tv-page .gm-tv-lead-title,
        .gm-tv-page .gm-tv-teaser-title,
        .gm-tv-page .gm-tv-card-title {
            font-size: .77rem !important;
        }
    }


    /* Slider publicitaire unique - visuels de toutes proportions, non recadrés. */
    .gm-tv-advertising {
        margin: 0 0 42px;
        border: 1px solid var(--gm-line);
        border-radius: 20px;
        background: #fff;
        overflow: hidden;
        box-shadow: 0 12px 28px rgba(14, 50, 28, .065);
    }
    .gm-tv-ad-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
        padding: 15px 22px;
        border-bottom: 1px solid var(--gm-line);
    }
    .gm-tv-ad-header h2 {
        font: 800 .78rem 'Montserrat', sans-serif;
        letter-spacing: .11em;
        text-transform: uppercase;
        color: #52665b;
        margin: 0;
    }
    .gm-tv-ad-counter { color: var(--gm-muted); font-size: .8rem; font-weight: 700; }
    .gm-tv-ad-stage {
        height: clamp(230px, 35vw, 455px);
        position: relative;
        background: linear-gradient(135deg,#f8faf7,#edf5ef);
        overflow: hidden;
    }
    .gm-tv-ad-slide {
        display: none;
        height: 100%;
        width: 100%;
        justify-content: center;
        align-items: center;
        padding: 16px 25px;
    }
    .gm-tv-ad-slide.is-active { display: flex; }
    .gm-tv-ad-link,
    .gm-tv-ad-media {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
    }
    .gm-tv-ad-link:focus-visible {
        outline: 3px solid var(--gm-orange);
        outline-offset: -3px;
    }
    .gm-tv-ad-image {
        display: block;
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
        object-fit: contain;
        border-radius: 8px;
    }
    .gm-tv-ad-controls {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 16px;
        padding: 13px 20px;
        background: #fff;
    }
    .gm-tv-ad-arrow {
        width: 35px;
        height: 35px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #d8e6dc;
        border-radius: 50%;
        background: #fff;
        color: var(--gm-green);
        cursor: pointer;
        font-size: 1.2rem;
        transition: background .18s ease, color .18s ease;
    }
    .gm-tv-ad-arrow:hover,
    .gm-tv-ad-arrow:focus-visible { background: var(--gm-green); color: #fff; }
    .gm-tv-ad-dots { display: flex; gap: 9px; align-items: center; }
    .gm-tv-ad-dot {
        padding: 0;
        width: 9px;
        height: 9px;
        border: 0;
        border-radius: 50%;
        background: #c2d5c7;
        cursor: pointer;
    }
    .gm-tv-ad-dot.is-active {
        background: var(--gm-green);
        width: 22px;
        border-radius: 999px;
    }
    @media (max-width: 575px) {
        .gm-tv-advertising { border-radius: 14px; margin-bottom: 28px; }
        .gm-tv-ad-header { padding: 12px 15px; }
        .gm-tv-ad-stage { height: 270px; }
        .gm-tv-ad-slide { padding: 11px; }
        .gm-tv-ad-controls { gap: 14px; }
    }
    @media (prefers-reduced-motion: reduce) {
        .gm-tv-ad-arrow, .gm-tv-ad-dot { transition: none !important; }
    }

</style>

@php
    /* Les quatre premières vidéos forment une sélection éditoriale sur la page 1.
       La liste et la pagination existantes restent basées sur le même paginator. */
    $gmFeaturedPage = $hcvds->currentPage() === 1 && $hcvds->count() > 0;
    $gmLead = $gmFeaturedPage ? $hcvds->first() : null;
    $gmTeasers = $gmFeaturedPage ? $hcvds->getCollection()->slice(1, 3) : collect();
    $gmCatalogue = $gmFeaturedPage ? $hcvds->getCollection()->slice(4) : $hcvds->getCollection();
    $gmToday = today();
@endphp

<section class="home gm-tv-page" style="margin-top: 20px; padding: 0;">
    <div class="container">
        <nav aria-label="Fil d'Ariane">
            <ol class="gm-tv-breadcrumb">
                <li><a href="{{ url('/') }}"><i class="ion-ios-home" aria-hidden="true"></i> Accueil</a></li>
                <li aria-hidden="true">/</li>
                <li><span aria-current="page">Green Media TV</span></li>
            </ol>
        </nav>

        <header class="gm-tv-masthead">
            <span class="gm-tv-eyebrow">La chaîne Green Media Africa</span>
            <h1>Regardez. Découvrez.<br><span>Comprenez.</span></h1>
            <p>Reportages, émissions et directs : retrouvez les vidéos de Green Media TV au même endroit.</p>
            <div class="gm-tv-masthead-bottom">
                <span class="gm-tv-count-pill"><i class="ion-ios-videocam" aria-hidden="true"></i> {{ $hnbvds }} vidéos disponibles</span>
                <span class="gm-tv-count-pill"><i class="ion-ios-play" aria-hidden="true"></i> Green Media TV</span>
            </div>
        </header>


        {{-- Publicités déjà diffusées sur index : un seul emplacement sur la page TV. --}}
        @php
            $gmTvAds = collect([
                $pubs_i2[0] ?? null,
                $pubs_i3[0] ?? null,
                $pubs_i4[0] ?? null,
                $pubs_i5[0] ?? null,
            ])->filter(fn ($ad) => $ad && !empty($ad->image_pub))->values();
        @endphp

        @if($gmTvAds->isNotEmpty())
            <section class="gm-tv-advertising" id="gm-tv-ads-slider" aria-label="Annonces publicitaires">
                <div class="gm-tv-ad-header">
                    <h2>Publicités · Nos partenaires</h2>
                    @if($gmTvAds->count() > 1)
                        <span class="gm-tv-ad-counter" aria-live="off">
                            <span class="gm-tv-ad-current">1</span> / {{ $gmTvAds->count() }}
                        </span>
                    @endif
                </div>
                <div class="gm-tv-ad-stage">
                    @foreach($gmTvAds as $gmAd)
                        <div class="gm-tv-ad-slide {{ $loop->first ? 'is-active' : '' }}"
                             aria-hidden="{{ $loop->first ? 'false' : 'true' }}"
                             role="group"
                             aria-roledescription="diapositive"
                             aria-label="Publicité {{ $loop->iteration }} sur {{ $gmTvAds->count() }}">
                            @if(!empty($gmAd->linkdest_pub))
                                <a class="gm-tv-ad-link"
                                   href="{{ $gmAd->linkdest_pub }}"
                                   target="_blank"
                                   rel="noopener noreferrer sponsored"
                                   tabindex="{{ $loop->first ? '0' : '-1' }}">
                                    <img class="gm-tv-ad-image"
                                         src="{{ url('hphx/img/'.$gmAd->image_pub) }}"
                                         alt="Bannière publicitaire Green Media Africa"
                                         loading="{{ $loop->first ? 'eager' : 'lazy' }}">
                                </a>
                            @else
                                <div class="gm-tv-ad-media">
                                    <img class="gm-tv-ad-image"
                                         src="{{ url('hphx/img/'.$gmAd->image_pub) }}"
                                         alt="Bannière publicitaire Green Media Africa"
                                         loading="{{ $loop->first ? 'eager' : 'lazy' }}">
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                @if($gmTvAds->count() > 1)
                    <div class="gm-tv-ad-controls" aria-label="Commandes du carrousel publicitaire">
                        <button type="button" class="gm-tv-ad-arrow gm-tv-ad-previous" aria-label="Publicité précédente">
                            <i class="ion-ios-arrow-back" aria-hidden="true"></i>
                        </button>
                        <div class="gm-tv-ad-dots" role="group" aria-label="Choisir une publicité">
                            @foreach($gmTvAds as $gmAd)
                                <button type="button"
                                        class="gm-tv-ad-dot {{ $loop->first ? 'is-active' : '' }}"
                                        aria-label="Afficher la publicité {{ $loop->iteration }}"
                                        aria-pressed="{{ $loop->first ? 'true' : 'false' }}"
                                        data-ad-index="{{ $loop->index }}"></button>
                            @endforeach
                        </div>
                        <button type="button" class="gm-tv-ad-arrow gm-tv-ad-next" aria-label="Publicité suivante">
                            <i class="ion-ios-arrow-forward" aria-hidden="true"></i>
                        </button>
                    </div>
                @endif
            </section>
        @endif

        @if($gmLead)
            <section class="gm-tv-spotlight" aria-labelledby="gm-tv-spotlight-title">
                <div class="gm-tv-section-heading">
                    <div>
                        <small>Notre sélection</small>
                        <h2 id="gm-tv-spotlight-title">À la une sur Green Media TV</h2>
                    </div>
                    <span class="gm-tv-range">Dernières publications</span>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-12" style="margin-bottom: 16px;">
                        <article class="gm-tv-lead">
                            <a class="gm-tv-lead-image" href="{{ route('visitors.showvideo', ['id' => $gmLead->id_video]) }}" aria-label="Voir la vidéo : {{ $gmLead->title_video }}">
                                <img src="{{ url('hphx/img/'.$gmLead->image_video) }}" alt="{{ $gmLead->title_video }}" fetchpriority="high">
                            </a>
                            <span class="gm-tv-lead-label"><i class="ion-play" aria-hidden="true"></i> À découvrir</span>
                            <div class="gm-tv-lead-copy">
                                <div class="gm-tv-lead-category">
                                    {{ (isset($gmLead->typevideo_id) && $gmLead->typevideo_id == 2) ? 'Replay live' : 'Vidéo TV' }}
                                </div>
                                <h3 class="gm-tv-lead-title">
                                    <a class="vdsplayer" href="{{ url('https://www.youtube.com/embed/'.getYoutubeId($gmLead->linkyoutube_video).'?showinfo=0&autoplay=1') }}" data-autoplay="true" data-vbtype="video" data-gall="myGallery">{{ formatTitle($gmLead->title_video) }}</a>
                                </h3>
                                <div class="gm-tv-lead-meta">
                                    <i class="ion-android-calendar" aria-hidden="true"></i>
                                    @if(!empty($gmLead->datepub_video))
                                        {{ phxdtformat(date_create($gmLead->datepub_video)) }}
                                    @else
                                        {{ phxdtformat($gmToday) }}
                                    @endif
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-12" style="margin-bottom: 16px;">
                        <div class="gm-tv-teasers">
                            @foreach($gmTeasers as $gmTeaser)
                                <article class="gm-tv-teaser">
                                    <a class="gm-tv-teaser-thumb" href="{{ route('visitors.showvideo', ['id' => $gmTeaser->id_video]) }}" aria-label="Voir la vidéo : {{ $gmTeaser->title_video }}">
                                        <img src="{{ url('hphx/img/'.$gmTeaser->image_video) }}" alt="{{ $gmTeaser->title_video }}" loading="lazy">
                                        <span class="gm-tv-teaser-play" aria-hidden="true"><i class="ion-play"></i></span>
                                    </a>
                                    <div class="gm-tv-teaser-body">
                                        <span class="gm-tv-teaser-type">{{ (isset($gmTeaser->typevideo_id) && $gmTeaser->typevideo_id == 2) ? 'Replay live' : 'Vidéo TV' }}</span>
                                        <a class="vdsplayer gm-tv-teaser-title" href="{{ url('https://www.youtube.com/embed/'.getYoutubeId($gmTeaser->linkyoutube_video).'?showinfo=0&autoplay=1') }}" data-autoplay="true" data-vbtype="video" data-gall="myGallery">{{ formatTitle($gmTeaser->title_video) }}</a>
                                        <span class="gm-tv-teaser-date">
                                            @if(!empty($gmTeaser->datepub_video))
                                                {{ phxdtformat(date_create($gmTeaser->datepub_video)) }}
                                            @else
                                                {{ phxdtformat($gmToday) }}
                                            @endif
                                        </span>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <div class="row">
            <main class="col-lg-8 col-md-12">
                <div class="gm-tv-section-heading">
                    <div>
                        <small>Explorer le catalogue</small>
                        <h2>{{ $hcvds->currentPage() === 1 ? 'Les autres reportages' : 'Tous les reportages' }}</h2>
                    </div>
                    @if($hcvds->count() > 0)
                        <span class="gm-tv-range">{{ $hcvds->firstItem() }}–{{ $hcvds->lastItem() }} sur {{ $hcvds->total() }}</span>
                    @endif
                </div>

                @if($hcvds->count() > 0)
                    @if($gmCatalogue->isNotEmpty())
                        <div class="row">
                            @foreach($gmCatalogue as $alvd)
                                <div class="col-md-6 col-sm-12" style="margin-bottom: 24px;">
                                    <article class="gm-tv-card">
                                        <a class="gm-tv-card-media" href="{{ route('visitors.showvideo', ['id' => $alvd->id_video]) }}" aria-label="Voir la vidéo : {{ $alvd->title_video }}">
                                            <img src="{{ url('hphx/img/'.$alvd->image_video) }}" alt="{{ $alvd->title_video }}" loading="lazy">
                                            <span class="gm-tv-card-tag {{ (isset($alvd->typevideo_id) && $alvd->typevideo_id == 2) ? 'is-live' : '' }}">
                                                {{ (isset($alvd->typevideo_id) && $alvd->typevideo_id == 2) ? 'Replay live' : 'Vidéo TV' }}
                                            </span>
                                            <span class="gm-tv-card-play" aria-hidden="true"><i class="ion-play"></i></span>
                                        </a>
                                        <div class="gm-tv-card-body">
                                            <a class="vdsplayer gm-tv-card-title" href="{{ url('https://www.youtube.com/embed/'.getYoutubeId($alvd->linkyoutube_video).'?showinfo=0&autoplay=1') }}" data-autoplay="true" data-vbtype="video" data-gall="myGallery">{{ formatTitle($alvd->title_video) }}</a>
                                            <div class="gm-tv-card-footer">
                                                <i class="ion-android-calendar" aria-hidden="true"></i>
                                                @if(!empty($alvd->datepub_video))
                                                    {{ phxdtformat(date_create($alvd->datepub_video)) }}
                                                @else
                                                    {{ phxdtformat($gmToday) }}
                                                @endif
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div class="gm-tv-pagination">
                        {{ $hcvds->links('contents.guests.templates.blockpagination') }}
                    </div>
                @else
                    <div class="gm-tv-empty">
                        <i class="ion-ios-videocam" aria-hidden="true"></i>
                        <h3>Aucune vidéo disponible</h3>
                        <p>Notre catalogue vidéo est en cours de mise à jour. Revenez bientôt !</p>
                    </div>
                @endif
            </main>

            <aside class="gm-tv-sidebar col-lg-4 col-md-12" aria-label="L'esprit Green Media">
                <div class="gm-sidebar-sticky">
                    <div style="margin-bottom: 20px; font-family: 'Montserrat', sans-serif; font-size: 1.2rem; font-weight: 800; text-transform: uppercase; color: #222; border-bottom: 2px solid #f0f0f0; padding-bottom: 10px;">
                        <span style="color: #127319;"><i class="ion-leaf"></i> L'esprit</span> Green Media
                    </div>
                    <div class="gm-tv-sidebar-original-content">
                    <!-- Citation 1 : Écologie Générale -->
                    <div class="gm-quote-card">
                        <i class="ion-quote gm-quote-icon"></i>
                        <div class="gm-quote-text">
                            "La Terre ne nous appartient pas, nous l'empruntons à nos enfants. Chaque arbre planté est une promesse d'avenir."
                        </div>
                        <div class="gm-quote-author">Proverbe Amérindien</div>
                    </div>

                    <!-- Citation 2 : Protection Animale -->
                    <div class="gm-quote-card">
                        <i class="ion-quote gm-quote-icon"></i>
                        <div class="gm-quote-text">
                            "On peut juger de la grandeur d'une nation par la façon dont les animaux y sont traités."
                        </div>
                        <div class="gm-quote-author">Mahatma Gandhi</div>
                    </div>

                    <!-- Citation 3 : Action / Environnement -->
                    <div class="gm-quote-card">
                        <i class="ion-quote gm-quote-icon"></i>
                        <div class="gm-quote-text">
                            "La nature n'est pas un endroit à visiter. C'est chez nous. Ce que nous lui faisons, nous nous le faisons à nous-mêmes."
                        </div>
                        <div class="gm-quote-author">Gary Snyder</div>
                    </div>

                    <!-- Petit encart promotionnel discret pour s'abonner (Optionnel) -->
                    <div style="background: #f9f9f9; padding: 25px; border-radius: 8px; text-align: center; border: 1px solid #eaeaea; margin-top: 30px;">
                        <i class="ion-android-globe" style="font-size: 3rem; color: #ffa000; margin-bottom: 10px;"></i>
                        <h4 style="font-size: 1.1rem; font-weight: 800; color: #333; font-family: 'Montserrat', sans-serif;">Rejoignez le mouvement</h4>
                        <p style="font-size: 0.9rem; color: #666; margin-bottom: 15px;">Informez-vous pour mieux agir en faveur de notre planète et de sa biodiversité.</p>
                        <a href="{{url('/')}}" style="display: inline-block; background: #127319; color: #fff; padding: 8px 20px; border-radius: 30px; font-weight: 600; text-decoration: none; font-size: 0.9rem;">
                            Lire nos articles
                        </a>
                    </div>


                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.getElementById('gm-tv-ads-slider');
    if (!carousel) return;

    const slides = Array.from(carousel.querySelectorAll('.gm-tv-ad-slide'));
    const dots = Array.from(carousel.querySelectorAll('.gm-tv-ad-dot'));
    const countLabel = carousel.querySelector('.gm-tv-ad-current');
    const previous = carousel.querySelector('.gm-tv-ad-previous');
    const next = carousel.querySelector('.gm-tv-ad-next');
    if (slides.length < 2) return;

    const intervalMs = 30000;
    let current = 0;
    let timer = null;

    function displaySlide(index) {
        current = (index + slides.length) % slides.length;
        slides.forEach(function (slide, i) {
            const active = i === current;
            slide.classList.toggle('is-active', active);
            slide.setAttribute('aria-hidden', active ? 'false' : 'true');
            const link = slide.querySelector('a');
            if (link) link.tabIndex = active ? 0 : -1;
        });
        dots.forEach(function (dot, i) {
            const active = i === current;
            dot.classList.toggle('is-active', active);
            dot.setAttribute('aria-pressed', active ? 'true' : 'false');
        });
        if (countLabel) countLabel.textContent = String(current + 1);
    }

    function pause() {
        if (timer !== null) {
            window.clearInterval(timer);
            timer = null;
        }
    }

    function resume() {
        pause();
        if (document.hidden || carousel.matches(':hover') || carousel.matches(':focus-within')) return;
        timer = window.setInterval(function () {
            displaySlide(current + 1);
        }, intervalMs);
    }

    if (previous) previous.addEventListener('click', function () {
        displaySlide(current - 1);
        resume();
    });
    if (next) next.addEventListener('click', function () {
        displaySlide(current + 1);
        resume();
    });
    dots.forEach(function (dot) {
        dot.addEventListener('click', function () {
            displaySlide(Number(dot.getAttribute('data-ad-index')));
            resume();
        });
    });

    carousel.addEventListener('mouseenter', pause);
    carousel.addEventListener('mouseleave', resume);
    carousel.addEventListener('focusin', pause);
    carousel.addEventListener('focusout', function () {
        window.setTimeout(resume, 0);
    });
    document.addEventListener('visibilitychange', function () {
        if (document.hidden) pause();
        else resume();
    });

    displaySlide(0);
    resume();
});
</script>

@stop
