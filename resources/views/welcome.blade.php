<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SIPANTAU | Sistem Pelaporan Lingkungan</title>

        @fonts
        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */ @layer properties{@supports (((-webkit-hyphens:none)) and (not (margin-trim:inline))) or ((-moz-orient:inline) and (not (color:rgb(from red r g b)))){*,:before,:after,::backdrop{--tw-translate-x:0;--tw-translate-y:0;--tw-translate-z:0;--tw-rotate-x:initial;--tw-rotate-y:initial;--tw-rotate-z:initial;--tw-skew-x:initial;--tw-skew-y:initial;--tw-space-x-reverse:0;--tw-border-style:solid;--tw-leading:initial;--tw-font-weight:initial;--tw-tracking:initial;--tw-shadow:0 0 #0000;--tw-shadow-color:initial;--tw-shadow-alpha:100%;--tw-inset-shadow:0 0 #0000;--tw-inset-shadow-color:initial;--tw-inset-shadow-alpha:100%;--tw-ring-color:initial;--tw-ring-shadow:0 0 #0000;--tw-inset-ring-color:initial;--tw-inset-ring-shadow:0 0 #0000;--tw-ring-inset:initial;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-offset-shadow:0 0 #0000;--tw-blur:initial;--tw-brightness:initial;--tw-contrast:initial;--tw-grayscale:initial;--tw-hue-rotate:initial;--tw-invert:initial;--tw-opacity:initial;--tw-saturate:initial;--tw-sepia:initial;--tw-drop-shadow:initial;--tw-drop-shadow-color:initial;--tw-drop-shadow-alpha:100%;--tw-drop-shadow-size:initial;--tw-duration:initial;--tw-ease:initial;--tw-content:""}}}@layer theme{:root,:host{--font-sans:"Instrument Sans", ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";--font-serif:ui-serif, Georgia, Cambria, "Times New Roman", Times, serif;--font-mono:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;--color-red-50:oklch(97.1% .013 17.38);--color-red-100:oklch(93.6% .032 17.717);--color-red-200:oklch(88.5% .062 18.334);--color-red-300:oklch(80.8% .114 19.571);--color-red-400:oklch(70.4% .191 22.216);--color-red-500:oklch(63.7% .237 25.331);--color-red-600:oklch(57.7% .245 27.325);--color-red-700:oklch(50.5% .213 27.518);--color-red-800:oklch(44.4% .177 26.899);--color-red-900:oklch(39.6% .141 25.723);--color-red-950:oklch(25.8% .092 26.042);--color-orange-50:oklch(98% .016 73.684);--color-orange-100:oklch(95.4% .038 75.164);--color-orange-200:oklch(90.1% .076 70.697);--color-orange-300:oklch(83.7% .128 66.29);--color-orange-400:oklch(75% .183 55.934);--color-orange-500:oklch(70.5% .213 47.604);--color-orange-600:oklch(64.6% .222 41.116);--color-orange-700:oklch(55.3% .195 38.402);--color-orange-800:oklch(47% .157 37.304);--color-orange-900:oklch(40.8% .123 38.172);--color-orange-950:oklch(26.6% .079 36.259);--color-amber-50:oklch(98.7% .022 95.277);--color-amber-100:oklch(96.2% .059 95.617);--color-amber-200:oklch(92.4% .12 95.746);--color-amber-300:oklch(87.9% .169 91.605);--color-amber-400:oklch(82.8% .189 84.429);--color-amber-500:oklch(76.9% .188 70.08);--color-amber-600:oklch(66.6% .179 58.318);--color-amber-700:oklch(55.5% .163 48.998);--color-amber-800:oklch(47.3% .137 46.201);--color-amber-900:oklch(41.4% .112 45.904);--color-amber-950:oklch(27.9% .077 45.635);--color-lime-50:oklch(98.6% .031 120.757);--color-lime-100:oklch(96.7% .067 122.328);--color-lime-200:oklch(93.8% .127 124.321);--color-lime-300:oklch(89.7% .196 126.665);--color-lime-400:oklch(84.1% .238 128.85);--color-lime-500:oklch(76.8% .233 130.85);--color-lime-600:oklch(64.8% .2 131.684);--color-lime-700:oklch(53.2% .157 131.589);--color-lime-800:oklch(45.3% .124 130.933);--color-lime-900:oklch(40.5% .101 131.063);--color-lime-950:oklch(27.4% .072 132.109);--color-green-50:oklch(98.2% .018 155.826);--color-green-100:oklch(96.2% .044 156.743);--color-green-200:oklch(92.5% .084 155.995);--color-green-300:oklch(87.1% .15 154.449);--color-green-400:oklch(79.2% .209 151.711);--color-green-500:oklch(72.3% .219 149.579);--color-green-600:oklch(62.7% .194 149.214);--color-green-700:oklch(52.7% .154 150.069);--color-green-800:oklch(44.8% .119 151.328);--color-green-900:oklch(39.3% .095 152.535);--color-green-950:oklch(26.6% .065 152.934);--color-emerald-50:oklch(97.9% .021 166.113);--color-emerald-100:oklch(95% .052 163.051);--color-emerald-200:oklch(90.5% .093 164.15);--color-emerald-300:oklch(84.5% .143 164.978);--color-emerald-400:oklch(76.5% .177 163.223);--color-emerald-500:oklch(69.6% .17 162.48);--color-emerald-600:oklch(59.6% .145 163.225);--color-emerald-700:oklch(50.8% .118 165.612);--color-emerald-800:oklch(43.2% .095 166.913);--color-emerald-900:oklch(37.8% .077 168.94);--color-emerald-950:oklch(26.2% .051 172.552);--color-teal-50:oklch(98.4% .014 180.72);--color-teal-100:oklch(95.3% .051 180.801);--color-teal-200:oklch(91% .096 180.426);--color-teal-300:oklch(85.5% .138 181.071);--color-teal-400:oklch(77.7% .152 181.912);--color-teal-500:oklch(70.4% .14 182.503);--color-teal-600:oklch(60% .118 184.704);--color-teal-700:oklch(51.1% .096 186.391);--color-teal-800:oklch(43.7% .078 188.216);--color-teal-900:oklch(38.6% .063 188.416);--color-teal-950:oklch(27.7% .046 192.524);--color-cyan-50:oklch(98.4% .019 200.873);--color-cyan-100:oklch(95.6% .045 203.388);--color-cyan-200:oklch(91.7% .08 205.041);--color-cyan-300:oklch(86.5% .127 207.078);--color-cyan-400:oklch(78.9% .154 211.53);--color-cyan-500:oklch(71.5% .143 215.221);--color-cyan-600:oklch(60.9% .126 221.723);--color-cyan-700:oklch(52% .105 223.128);--color-cyan-800:oklch(45% .085 224.283);--color-cyan-900:oklch(39.8% .07 227.392);--color-cyan-950:oklch(30.2% .056 229.695);--color-sky-50:oklch(97.7% .013 236.62);--color-sky-100:oklch(95.1% .026 236.824);--color-sky-200:oklch(90.1% .058 230.902);--color-sky-300:oklch(82.8% .111 230.318);--color-sky-400:oklch(74.6% .16 232.661);--color-sky-500:oklch(68.5% .169 237.323);--color-sky-600:oklch(58.8% .158 241.966);--color-sky-700:oklch(50% .134 242.749);--color-sky-800:oklch(44.3% .11 240.79);--color-sky-900:oklch(39.1% .09 240.876);--color-sky-950:oklch(29.3% .066 243.157);--color-blue-50:oklch(97% .014 254.604);--color-blue-100:oklch(93.2% .032 255.585);--color-blue-200:oklch(88.2% .059 254.128);--color-blue-300:oklch(80.9% .105 251.813);--color-blue-400:oklch(70.7% .165 254.624);--color-blue-500:oklch(62.3% .214 259.815);--color-blue-600:oklch(54.6% .245 262.881);--color-blue-700:oklch(48.8% .243 264.376);--color-blue-800:oklch(42.4% .199 265.638);--color-blue-900:oklch(37.9% .146 265.522);--color-blue-950:oklch(28.2% .091 267.935);--color-indigo-50:oklch(96.2% .018 272.314);--color-indigo-100:oklch(93% .034 272.788);--color-indigo-200:oklch(87% .065 274.039);--color-indigo-300:oklch(78.5% .115 274.713);--color-indigo-400:oklch(67.3% .182 276.935);--color-indigo-500:oklch(58.5% .233 277.117);--color-indigo-600:oklch(51.1% .262 276.966);--color-indigo-700:oklch(45.7% .24 277.023);--color-indigo-800:oklch(39.8% .195 277.366);--color-indigo-900:oklch(35.9% .144 278.697);--color-indigo-950:oklch(25.7% .09 281.288);--color-violet-50:oklch(96.9% .016 293.756);--color-violet-100:oklch(94.3% .029 294.588);--color-violet-200:oklch(89.4% .057 293.283);--color-violet-300:oklch(81.1% .111 293.571);--color-violet-400:oklch(70.2% .183 293.541);--color-violet-500:oklch(60.6% .25 292.717);--color-violet-600:oklch(54.1% .281 293.009);--color-violet-700:oklch(49.1% .27 292.581);--color-violet-800:oklch(43.2% .232 292.759);--color-violet-900:oklch(38% .189 293.745);--color-violet-950:oklch(28.3% .141 291.089);--color-purple-50:oklch(97.7% .014 308.299);--color-purple-100:oklch(94.6% .033 307.174);--color-purple-200:oklch(90.2% .063 306.703);--color-purple-300:oklch(82.7% .119 306.383);--color-purple-400:oklch(71.4% .203 305.504);--color-purple-500:oklch(62.7% .265 303.9);--color-purple-600:oklch(55.8% .288 302.321);--color-purple-700:oklch(49.6% .265 301.924);--color-purple-800:oklch(43.8% .218 303.724);--color-purple-900:oklch(38.1% .176 304.987);--color-purple-950:oklch(29.1% .141 302.717);--color-fuchsia-50:oklch(97.7% .017 320.058);--color-fuchsia-100:oklch(95.2% .037 318.852);--color-fuchsia-200:oklch(90.3% .076 319.62);--color-fuchsia-300:oklch(83.3% .145 321.434);--color-fuchsia-400:oklch(74% .238 322.16);--color-fuchsia-500:oklch(66.7% .295 322.15);--color-fuchsia-600:oklch(59.1% .293 322.896);--color-fuchsia-700:oklch(51.8% .253 323.949);--color-fuchsia-800:oklch(45.2% .211 324.591);--color-fuchsia-900:oklch(40.1% .17 325.612);--color-fuchsia-950:oklch(29.3% .136 325.661);--color-pink-50:oklch(97.1% .014 343.198);--color-pink-100:oklch(94.8% .028 342.258);--color-pink-200:oklch(89.9% .061 343.231);--color-pink-300:oklch(82.3% .12 346.018);--color-pink-400:oklch(71.8% .202 349.761);--color-pink-500:oklch(65.6% .241 354.308);--color-pink-600:oklch(59.2% .249 .584);--color-pink-700:oklch(52.5% .223 3.958);--color-pink-800:oklch(45.9% .187 3.815);--color-pink-900:oklch(40.8% .153 2.432);--color-pink-950:oklch(28.4% .109 3.907);--color-rose-50:oklch(96.9% .015 12.422);--color-rose-100:oklch(94.1% .03 12.58);--color-rose-200:oklch(89.2% .058 10.001);--color-rose-300:oklch(81% .117 11.638);--color-rose-400:oklch(71.2% .194 13.428);--color-rose-500:oklch(64.5% .246 16.439);--color-rose-600:oklch(58.6% .253 17.585);--color-rose-700:oklch(51.4% .222 16.935);--color-rose-800:oklch(45.5% .188 13.697);--color-rose-900:oklch(41% .159 10.272);--color-rose-950:oklch(27.1% .105 12.094);--color-slate-50:oklch(98.4% .003 247.858);--color-slate-100:oklch(96.8% .007 247.896);--color-slate-200:oklch(92.9% .013 255.508);--color-slate-300:oklch(86.9% .022 252.894);--color-slate-400:oklch(70.4% .04 256.788);--color-slate-500:oklch(55.4% .046 257.417);--color-slate-600:oklch(44.6% .043 257.281);--color-slate-700:oklch(37.2% .044 257.287);--color-slate-800:oklch(27.9% .041 260.031);--color-slate-900:oklch(20.8% .042 265.755);--color-slate-950:oklch(12.9% .042 264.695);--color-gray-50:oklch(98.5% .002 247.839);--color-gray-100:oklch(96.7% .003 264.542);--color-gray-200:oklch(92.8% .006 264.531);--color-gray-300:oklch(87.2% .01 258.338);--color-gray-400:oklch(70.7% .022 261.325);--color-gray-500:oklch(55.1% .027 264.364);--color-gray-600:oklch(44.6% .03 256.802);--color-gray-700:oklch(37.3% .034 259.733);--color-gray-800:oklch(27.8% .033 256.848);--color-gray-900:oklch(21% .034 264.665);--color-gray-950:oklch(13% .028 261.692);--color-black:#000;--color-white:#fff;--spacing:.25rem;--breakpoint-sm:40rem;--breakpoint-md:48rem;--breakpoint-lg:64rem;--breakpoint-xl:80rem;--breakpoint-2xl:96rem;--container-3xs:16rem;--container-2xs:18rem;--container-xs:20rem;--container-sm:24rem;--container-md:28rem;--container-lg:32rem;--container-xl:36rem;--container-2xl:42rem;--container-3xl:48rem;--container-4xl:56rem;--container-5xl:64rem;--container-6xl:72rem;--container-7xl:80rem;--text-xs:.75rem;--text-xs--line-height:calc(1 / .75);--text-sm:.875rem;--text-sm--line-height:calc(1.25 / .875);--text-base:1rem;--text-base--line-height: 1.5 ;--text-lg:1.125rem;--text-lg--line-height:calc(1.75 / 1.125);--text-xl:1.25rem;--text-xl--line-height:calc(1.75 / 1.25);--text-2xl:1.5rem;--text-2xl--line-height:calc(2 / 1.5);--text-3xl:1.875rem;--text-3xl--line-height: 1.2 ;--text-4xl:2.25rem;--text-4xl--line-height:calc(2.5 / 2.25);--text-5xl:3rem;--text-5xl--line-height:1;--text-6xl:3.75rem;--text-6xl--line-height:1;--text-7xl:4.5rem;--text-7xl--line-height:1;--text-8xl:6rem;--text-8xl--line-height:1;--text-9xl:8rem;--text-9xl--line-height:1;--font-weight-thin:100;--font-weight-extralight:200;--font-weight-light:300;--font-weight-normal:400;--font-weight-medium:500;--font-weight-semibold:600;--font-weight-bold:700;--font-weight-extrabold:800;--font-weight-black:900;--tracking-tighter:-.05em;--tracking-tight:-.025em;--tracking-normal:0em;--tracking-wide:.025em;--tracking-wider:.05em;--tracking-widest:.1em;--leading-tight:1.25;--leading-snug:1.375;--leading-normal:1.5;--leading-relaxed:1.625;--leading-loose:2;--radius-xs:.125rem;--radius-sm:.25rem;--radius-md:.375rem;--radius-lg:.5rem;--radius-xl:.75rem;--radius-2xl:1rem;--radius-3xl:1.5rem;--radius-4xl:2rem;--shadow-2xs:0 1px #0000000d;--shadow-xs:0 1px 2px 0 #0000000d;--shadow-sm:0 1px 3px 0 #0000001a, 0 1px 2px -1px #0000001a;--shadow-md:0 4px 6px -1px #0000001a, 0 2px 4px -2px #0000001a;--shadow-lg:0 10px 15px -3px #0000001a, 0 4px 6px -4px #0000001a;--shadow-xl:0 20px 25px -5px #0000001a, 0 8px 10px -6px #0000001a;--shadow-2xl:0 25px 50px -12px #00000040;--inset-shadow-2xs:inset 0 1px #0000000d;--inset-shadow-xs:inset 0 1px 1px #0000000d;--inset-shadow-sm:inset 0 2px 4px #0000000d;--drop-shadow-xs:0 1px 1px #0000000d;--drop-shadow-sm:0 1px 2px #00000026;--drop-shadow-md:0 3px 3px #0000001f;--drop-shadow-lg:0 4px 4px #00000026;--drop-shadow-xl:0 9px 7px #0000001a;--drop-shadow-2xl:0 25px 25px #00000026;--ease-in:cubic-bezier(.4, 0, 1, 1);--ease-out:cubic-bezier(0, 0, .2, 1);--ease-in-out:cubic-bezier(.4, 0, .2, 1);--animate-spin:spin 1s linear infinite;--animate-ping:ping 1s cubic-bezier(0, 0, .2, 1) infinite;--animate-pulse:pulse 2s cubic-bezier(.4, 0, .6, 1) infinite;--animate-bounce:bounce 1s infinite;--blur-xs:4px;--blur-sm:8px;--blur-md:12px;--blur-lg:16px;--blur-xl:24px;--blur-2xl:40px;--blur-3xl:64px;--perspective-dramatic:100px;--perspective-near:300px;--perspective-normal:500px;--perspective-midrange:800px;--perspective-distant:1200px;--aspect-video:16 / 9;--default-transition-duration:.15s;--default-transition-timing-function:cubic-bezier(.4, 0, .2, 1);--default-font-family:var(--font-sans);--default-mono-font-family:var(--font-mono)}}@layer base{*,:after,:before,::backdrop{box-sizing:border-box;border:0 solid;margin:0;padding:0}::file-selector-button{box-sizing:border-box;border:0 solid;margin:0;padding:0}html,:host{-webkit-text-size-adjust:100%;tab-size:4;line-height:1.5;font-family:var(--default-font-family,ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji");font-feature-settings:var(--default-font-feature-settings,normal);font-variation-settings:var(--default-font-variation-settings,normal);-webkit-tap-highlight-color:transparent}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;-webkit-text-decoration:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,samp,pre{font-family:var(--default-mono-font-family,ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace);font-feature-settings:var(--default-mono-font-feature-settings,normal);font-variation-settings:var(--default-mono-font-variation-settings,normal);font-size:1em}small{font-size:80%}sub,sup{vertical-align:baseline;font-size:75%;line-height:0;position:relative}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}:-moz-focusring{outline:auto}progress{vertical-align:baseline}summary{display:list-item}ol,ul,menu{list-style:none}img,svg,video,canvas,audio,iframe,embed,object{vertical-align:middle;display:block}img,video{max-width:100%;height:auto}button,input,select,optgroup,textarea{font:inherit;font-feature-settings:inherit;font-variation-settings:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}::file-selector-button{font:inherit;font-feature-settings:inherit;font-variation-settings:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}textarea{resize:vertical}button,input:where([type=button],[type=reset],[type=submit]){appearance:button}::file-selector-button{appearance:button}::-webkit-inner-spin-button{height:auto}::-webkit-outer-spin-button{height:auto}[hidden]:where(:not([hidden=until-found])){display:none!important}}@layer components;@layer utilities{.container{width:100%}@media(min-width:40rem){.container{max-width:40rem}}@media(min-width:48rem){.container{max-width:48rem}}@media(min-width:64rem){.container{max-width:64rem}}@media(min-width:80rem){.container{max-width:80rem}}@media(min-width:96rem){.container{max-width:96rem}}}
            </style>
        @endif
    </head>
    <body class="bg-slate-50 text-slate-900 antialiased">
        <div class="min-h-screen">
            <div class="relative overflow-hidden">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/hero-city.jpg') }}');"></div>
                <div class="absolute inset-0 bg-slate-950/40 backdrop-blur-sm"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-white/75 via-white/50 to-slate-950/95"></div>

                <header class="relative z-20 sticky top-0 border-b border-slate-200/70 bg-white/80 backdrop-blur-xl">
                    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                        <div class="flex items-center gap-3">
                            <div class="rounded-2xl bg-emerald-900/10 px-3 py-2 text-emerald-800 font-semibold tracking-[0.08em]">
                                SIPANTAU
                            </div>
                            <nav class="hidden items-center gap-8 text-sm font-medium text-slate-700 lg:flex">
                                <a href="#home" class="transition hover:text-emerald-700">Beranda</a>
                                <a href="#peta" class="transition hover:text-emerald-700">Peta</a>
                                <a href="#lapor" class="transition hover:text-emerald-700">Lapor</a>
                                <a href="#edukasi" class="transition hover:text-emerald-700">Edukasi</a>
                            </nav>
                        </div>

                        <div class="flex items-center gap-3">
                            <a href="{{ route('login') }}" class="inline-flex h-11 items-center justify-center rounded-2xl border border-slate-300/90 bg-white px-5 text-sm font-semibold text-slate-900 shadow-sm transition hover:border-emerald-300 hover:text-emerald-700">
                                Login
                            </a>
                        </div>
                    </div>
                </header>

                <main id="home" class="relative z-20 mx-auto flex max-w-7xl flex-col gap-12 px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
                    <section class="grid items-center gap-10 lg:grid-cols-[1.1fr_0.9fr]">
                        <div class="space-y-8 text-slate-950 lg:pr-8">
                            <div class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-white/80 px-4 py-2 text-xs font-semibold uppercase tracking-[0.32em] text-emerald-700 shadow-sm shadow-emerald-200/50">
                                <span class="h-2.5 w-2.5 rounded-full bg-emerald-700"></span>
                                Aplikasi Pelaporan Lingkungan Resmi
                            </div>

                            <div class="space-y-6">
                                <h1 class="text-4xl font-semibold tracking-tight text-slate-950 sm:text-5xl lg:text-6xl">
                                    Wujudkan Lingkungan Bersih Bersama <span class="text-emerald-700">SIPANTAU</span>
                                </h1>
                                <p class="max-w-2xl text-lg leading-8 text-slate-700 sm:text-xl">
                                    Sistem pelaporan cerdas untuk kota yang lebih baik. Laporkan masalah kebersihan di sekitarmu, dan pantau proses penanganannya secara real-time.
                                </p>
                            </div>

                            <div class="flex flex-col gap-4 sm:flex-row">
                                <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl bg-emerald-700 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-700/15 transition hover:-translate-y-0.5 hover:bg-emerald-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5" />
                                    </svg>
                                    Mulai Sekarang
                                </a>
                                <a href="{{ route('peta') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl border border-sky-300 bg-white px-6 py-3 text-sm font-semibold text-slate-900 transition hover:border-sky-400 hover:bg-sky-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5-2V5l5 2 5-2 5 2v13l-5-2-5 2z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v17M15 5v15" />
                                    </svg>
                                    Lihat Peta
                                </a>
                            </div>

                            <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
                                <div class="rounded-3xl bg-white/90 p-5 shadow-xl shadow-slate-900/5 backdrop-blur-xl border border-slate-200/80">
                                    <p class="text-sm uppercase tracking-[0.28em] text-slate-500">Laporan Terkirim</p>
                                    <p class="mt-4 text-3xl font-semibold text-slate-900">12.450+</p>
                                    <p class="mt-2 text-sm text-slate-600">Terkumpul dari partisipasi warga.</p>
                                </div>
                                <div class="rounded-3xl bg-white/90 p-5 shadow-xl shadow-slate-900/5 backdrop-blur-xl border border-slate-200/80">
                                    <p class="text-sm uppercase tracking-[0.28em] text-slate-500">Respon Cepat</p>
                                    <p class="mt-4 text-3xl font-semibold text-slate-900">85%</p>
                                    <p class="mt-2 text-sm text-slate-600">Pendekatan cerdas dan terpantau.</p>
                                </div>
                            </div>
                        </div>

                        <div class="relative overflow-hidden rounded-[2rem] border border-white/70 bg-white/80 p-6 shadow-[0_40px_120px_-45px_rgba(15,23,42,0.35)] backdrop-blur-xl sm:p-8">
                            <div class="absolute -left-10 top-12 h-32 w-32 rounded-full bg-emerald-500/10 blur-3xl"></div>
                            <div class="absolute -right-10 bottom-10 h-36 w-36 rounded-full bg-sky-500/10 blur-3xl"></div>
                            <div class="relative space-y-6">
                                <div class="rounded-3xl bg-emerald-700/5 p-5">
                                    <p class="text-xs uppercase tracking-[0.3em] text-emerald-700/80">Pantau Laporan</p>
                                    <h2 class="mt-4 text-2xl font-semibold text-slate-950">Dashboard partisipatif</h2>
                                    <p class="mt-3 text-sm leading-6 text-slate-600">Ikuti setiap fase penanganan, dari verifikasi hingga selesai.</p>
                                </div>
                                <div class="grid gap-4 sm:grid-cols-2">
                                    <div class="rounded-3xl bg-white p-4 shadow-sm border border-slate-200/80">
                                        <p class="text-sm font-semibold text-emerald-700">Pemantauan</p>
                                        <p class="mt-3 text-xl font-semibold text-slate-900">Realtime</p>
                                    </div>
                                    <div class="rounded-3xl bg-white p-4 shadow-sm border border-slate-200/80">
                                        <p class="text-sm font-semibold text-sky-700">Akses</p>
                                        <p class="mt-3 text-xl font-semibold text-slate-900">Terbuka</p>
                                    </div>
                                </div>
                                <div class="rounded-3xl bg-slate-950/5 p-4 text-sm text-slate-600">
                                    <p class="font-medium text-slate-900">Smart city untuk lingkungan lebih bersih, aman, dan ramah.</p>
                                </div>
                            </div>
                        </div>
                    </section>
                </main>
            </div>

            <section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8" id="peta">
                <div class="mx-auto max-w-3xl text-center">
                    <p class="text-sm font-semibold uppercase tracking-[0.32em] text-emerald-700">Transparansi Penanganan</p>
                    <h2 class="mt-4 text-3xl font-semibold tracking-tight text-slate-950 sm:text-4xl">Data laporan terkini dari partisipasi warga</h2>
                </div>

                <div class="mt-12 grid gap-6 lg:grid-cols-3">
                    <article class="rounded-3xl bg-white p-6 shadow-sm shadow-slate-900/5 transition hover:-translate-y-1 hover:shadow-md">
                        <div class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-sky-100 text-sky-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h8l6 6v6a2 2 0 0 1-2 2h-4" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 7v6h6" />
                            </svg>
                        </div>
                        <p class="mt-6 text-sm font-semibold uppercase tracking-[0.24em] text-slate-500">TOTAL LAPORAN</p>
                        <p class="mt-4 text-4xl font-bold text-slate-950">12,450</p>
                    </article>

                    <article class="rounded-3xl bg-white p-6 shadow-sm shadow-slate-900/5 transition hover:-translate-y-1 hover:shadow-md">
                        <div class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-red-100 text-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17.25l-4.5 1.5 1.5-4.5L3 11.25l4.5-1.5L9.75 6l1.5 4.5 4.5 1.5-4.5 1.5-1.5 4.5z" />
                            </svg>
                        </div>
                        <p class="mt-6 text-sm font-semibold uppercase tracking-[0.24em] text-slate-500">DALAM PROSES</p>
                        <p class="mt-4 text-4xl font-bold text-slate-950">845</p>
                    </article>

                    <article class="rounded-3xl bg-white p-6 shadow-sm shadow-slate-900/5 transition hover:-translate-y-1 hover:shadow-md">
                        <div class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <p class="mt-6 text-sm font-semibold uppercase tracking-[0.24em] text-slate-500">SELESAI DITANGANI</p>
                        <p class="mt-4 text-4xl font-bold text-slate-950">11,605</p>
                    </article>
                </div>
            </section>

            <section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8" id="lapor">
                <div class="mx-auto max-w-3xl text-center">
                    <p class="text-sm font-semibold uppercase tracking-[0.32em] text-emerald-700">Cara Kerja Sederhana</p>
                    <h2 class="mt-4 text-3xl font-semibold tracking-tight text-slate-950 sm:text-4xl">Tiga langkah mudah untuk berkontribusi menjaga kebersihan kota kita bersama.</h2>
                </div>

                <div class="mt-12 grid gap-6 lg:grid-cols-3">
                    <article class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-6 shadow-sm shadow-slate-900/5 transition hover:-translate-y-1 hover:shadow-md">
                        <div class="flex items-center justify-between gap-3">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-100 text-emerald-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 11h16M4 15h16M4 19h16" />
                                </svg>
                            </div>
                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-emerald-700 text-xs font-bold text-white">1</div>
                        </div>
                        <h3 class="mt-6 text-xl font-semibold text-slate-950">Foto</h3>
                        <p class="mt-3 text-sm leading-6 text-slate-600">Temukan tumpukan sampah atau masalah lingkungan, ambil foto dengan jelas menyertakan lokasi sekitar.</p>
                    </article>

                    <article class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-6 shadow-sm shadow-slate-900/5 transition hover:-translate-y-1 hover:shadow-md">
                        <div class="flex items-center justify-between gap-3">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-100 text-sky-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-emerald-700 text-xs font-bold text-white">2</div>
                        </div>
                        <h3 class="mt-6 text-xl font-semibold text-slate-950">Lapor</h3>
                        <p class="mt-3 text-sm leading-6 text-slate-600">Unggah foto melalui aplikasi SIPANTAU, tambahkan deskripsi singkat, dan kirim laporan.</p>
                    </article>

                    <article class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-6 shadow-sm shadow-slate-900/5 transition hover:-translate-y-1 hover:shadow-md">
                        <div class="flex items-center justify-between gap-3">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-100 text-emerald-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5c4.142 0 7.5-3.358 7.5-7.5S16.142 4.5 12 4.5 4.5 7.858 4.5 12s3.358 7.5 7.5 7.5z" />
                                </svg>
                            </div>
                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-emerald-700 text-xs font-bold text-white">3</div>
                        </div>
                        <h3 class="mt-6 text-xl font-semibold text-slate-950">Bersih</h3>
                        <p class="mt-3 text-sm leading-6 text-slate-600">Petugas akan segera menindaklanjuti. Pantau status laporan hingga area kembali bersih.</p>
                    </article>
                </div>
            </section>

            <footer class="border-t border-slate-200 bg-slate-100 py-10">
                <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-3 lg:px-8">
                    <div class="space-y-3">
                        <p class="text-xl font-semibold text-slate-950">SIPANTAU</p>
                        <p class="max-w-sm text-sm leading-6 text-slate-600">© 2026 SIPANTAU - Dinas Lingkungan Hidup. Menjaga Kebersihan untuk Masa Depan.</p>
                    </div>
                    <div class="space-y-3">
                        <p class="text-sm font-semibold uppercase tracking-[0.28em] text-slate-500">Link Cepat</p>
                        <div class="flex flex-col gap-2 text-sm text-slate-600">
                            <a href="#home" class="transition hover:text-emerald-700">Tentang Kami</a>
                            <a href="#" class="transition hover:text-emerald-700">Kebijakan Privasi</a>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <p class="text-sm font-semibold uppercase tracking-[0.28em] text-slate-500">Tim Pengembang</p>
                        <div class="text-sm leading-7 text-slate-600">
                            <p>Nur Avika</p>
                            <p>Rifqah</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
