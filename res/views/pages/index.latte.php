{extends 'layouts.landing'}

{block title}Dashboard{/block}
{block content}
<section class="bg-white dark:bg-gray-950">
    <div class="py-8 px-4 mx-auto max-w-screen-xxl text-center lg:py-16 z-10 relative lg:pl-10 lg:pr-10">
        <a href="#" class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700" role="alert">
            <span class="text-xs bg-primary-600 rounded-full text-white px-4 py-1.5 mr-3">New</span> <span class="text-sm font-medium">Phenomine 3 is out! See what's new</span>
            <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        </a>
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            The Full-Stack PHP Framework <br>
            <span class="text-blue-600">for Everyone.</span>
        </h1>
        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
            Phenomine is a full-stack framework that makes it easy to build dynamic web apps with minimal effort. It's designed to be simple and easy to use, while still providing the power and flexibility you need to build complex web applications.
        </p>
        <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
            <a n:navigate="route('docs')" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                Get Started
                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
            <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                <svg class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                Watch video
            </a>
        </div>
    </div>
</section>
<section class="bg-white dark:bg-gray-950">
    <div class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xxl lg:pl-10 lg:pr-10 xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
        <img class="w-full dark:hidden" src="{asset('build/images/code/controller-light.png')}" alt="dashboard image">
        <img class="w-full hidden dark:block" src="{asset('build/images/code/controller-dark.png')}" alt="dashboard image">
        <div class="mt-4 md:mt-0">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                Code with joy, craft with purpose.
            </h2>
            <p class="mb-6 font-light text-gray-500 md:text-lg dark:text-gray-400">
                Phenomine helps you to build web applications with elegant syntax and powerful tools, meaning you can focus on what you love most: writing code and building great things.
            </p>
            <a href="#" class="inline-flex items-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900">
                Start Writing Code
                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
    </div>
</section>

<section class="bg-white dark:bg-gray-950">
    <div class="py-8 px-4 mx-auto max-w-screen-xxl lg:py-16 lg:pl-10 lg:pr-10">
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-lg p-8 md:p-12">
                <a href="#" class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path d="M17 11h-2.722L8 17.278a5.512 5.512 0 0 1-.9.722H17a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM6 0H1a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V1a1 1 0 0 0-1-1ZM3.5 15.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM16.132 4.9 12.6 1.368a1 1 0 0 0-1.414 0L9 3.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z"/>
                    </svg>
                    Front-End
                </a>
                <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">
                    Built-in supports for HTMX & Tailwind CSS
                </h2>
                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">
                    Building a website with Phenomine is a breeze. It comes with built-in support for HTMX and Tailwind CSS, so you can build beautiful & interactive websites with minimal effort.
                </p>
                <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">Read more
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
            <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-lg p-8 md:p-12">
                <a href="#" class="bg-purple-100 text-purple-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-purple-400 mb-2">
                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4 1 8l4 4m10-8 4 4-4 4M11 1 9 15"/>
                    </svg>
                    Back-End
                </a>
                <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">
                    Supports many databases with Mirage ORM
                </h2>
                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">
                    Phenomine supports many databases and has built-in Mirage ORM, so you can build powerful back-end applications with ease.
                </p>
                <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">Read more
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="bg-white dark:bg-gray-950">
    <div class="py-8 px-4 mx-auto max-w-screen-xxl sm:py-16 lg:px-6 lg:pl-10 lg:pr-10">
        <div class="max-w-screen-md mb-8 lg:mb-16">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                Designed by developers like you, everything you need.
            </h2>
            <p class="text-gray-500 sm:text-xl dark:text-gray-400">
                Phenomine offers elegant solutions for common features required in modern web applications right out of the box. It's time to focus on building amazing applications.
            </p>
        </div>
        <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
            <div>
                <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                    <svg class="w-5 h-5 text-primary-600 lg:w-6 lg:h-6 dark:text-primary-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M8 10V7a4 4 0 1 1 8 0v3h1a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h1Zm2-3a2 2 0 1 1 4 0v3h-4V7Zm2 6a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
                    </svg>

                </div>
                <h3 class="mb-2 text-xl font-bold dark:text-white">Authentication</h3>
                <p class="text-gray-500 dark:text-gray-400">
                    Phenomine comes with built-in authentication, so you can easily add user registration, login, and password reset functionality to your applications.
                </p>
            </div>
            <div>
                <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                    <svg class="w-5 h-5 text-primary-600 lg:w-6 lg:h-6 dark:text-primary-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm2 8v-2h7v2H4Zm0 2v2h7v-2H4Zm9 2h7v-2h-7v2Zm7-4v-2h-7v2h7Z" clip-rule="evenodd"/>
                    </svg>

                </div>
                <h3 class="mb-2 text-xl font-bold dark:text-white">Mirage ORM</h3>
                <p class="text-gray-500 dark:text-gray-400">
                    Mirage ORM is a powerful and flexible database abstraction layer that makes it easy to work with databases in your Phenomine applications.
                </p>
            </div>
            <div>
                <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                    <svg class="w-5 h-5 text-primary-600 lg:w-6 lg:h-6 dark:text-primary-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 7.205c4.418 0 8-1.165 8-2.602C20 3.165 16.418 2 12 2S4 3.165 4 4.603c0 1.437 3.582 2.602 8 2.602ZM12 22c4.963 0 8-1.686 8-2.603v-4.404c-.052.032-.112.06-.165.09a7.75 7.75 0 0 1-.745.387c-.193.088-.394.173-.6.253-.063.024-.124.05-.189.073a18.934 18.934 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.073a10.143 10.143 0 0 1-.852-.373 7.75 7.75 0 0 1-.493-.267c-.053-.03-.113-.058-.165-.09v4.404C4 20.315 7.037 22 12 22Zm7.09-13.928a9.91 9.91 0 0 1-.6.253c-.063.025-.124.05-.189.074a18.935 18.935 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.074a10.163 10.163 0 0 1-.852-.372 7.816 7.816 0 0 1-.493-.268c-.055-.03-.115-.058-.167-.09V12c0 .917 3.037 2.603 8 2.603s8-1.686 8-2.603V7.596c-.052.031-.112.059-.165.09a7.816 7.816 0 0 1-.745.386Z"/>
                    </svg>
                </div>
                <h3 class="mb-2 text-xl font-bold dark:text-white">Database Migrations</h3>
                <p class="text-gray-500 dark:text-gray-400">
                    Database migrations allow you to easily update your database schema as your application evolves, without having to manually manage SQL scripts.
                </p>
            </div>
            <div>
                <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                    <svg class="w-5 h-5 text-primary-600 lg:w-6 lg:h-6 dark:text-primary-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="mb-2 text-xl font-bold dark:text-white">Validation</h3>
                <p class="text-gray-500 dark:text-gray-400">
                    Phenomine comes with built-in validation, so you can easily validate user input and ensure that your application is secure and reliable.
                </p>
            </div>
            <div>
                <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                    <svg class="w-5 h-5 text-primary-600 lg:w-6 lg:h-6 dark:text-primary-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17 6h-2V5h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2h-.541A5.965 5.965 0 0 1 14 10v4a1 1 0 1 1-2 0v-4c0-2.206-1.794-4-4-4-.075 0-.148.012-.22.028C7.686 6.022 7.596 6 7.5 6A4.505 4.505 0 0 0 3 10.5V16a1 1 0 0 0 1 1h7v3a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-3h5a1 1 0 0 0 1-1v-6c0-2.206-1.794-4-4-4Zm-9 8.5H7a1 1 0 1 1 0-2h1a1 1 0 1 1 0 2Z"/>
                    </svg>

                </div>
                <h3 class="mb-2 text-xl font-bold dark:text-white">Mail</h3>
                <p class="text-gray-500 dark:text-gray-400">
                    Phenomine comes with built-in support for sending emails, so you can easily send transactional emails and notifications to your users.
                </p>
            </div>
            <div>
                <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                    <svg class="w-6 h-6 text-primary-600 lg:w-6 lg:h-6 dark:text-primary-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 .087.586l2.977-7.937A1 1 0 0 1 6 10h12V9a2 2 0 0 0-2-2h-4.532l-1.9-2.28A2 2 0 0 0 8.032 4H4Zm2.693 8H6.5l-3 8H18l3-8H6.693Z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="mb-2 text-xl font-bold dark:text-white">File Storage</h3>
                <p class="text-gray-500 dark:text-gray-400">
                    Phenomine comes with built-in support for file storage, so you can easily upload and manage files in your applications.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="bg-white dark:bg-gray-950">
    <div class="max-w-screen-xxl px-4 py-8 mx-auto text-center lg:py-16 lg:px-6 lg:pl-10 lg:pr-10">
        <figure class="max-w-screen-md mx-auto">
            <svg class="h-12 mx-auto mb-3 text-gray-400 dark:text-gray-600" viewBox="0 0 24 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z" fill="currentColor"/>
            </svg>
            <blockquote>
                <p class="text-5xl font-bold text-gray-900 dark:text-white mb-3">
                    Modern web development is more complicated today. Phenomine makes it simple.
<!--                    Sometimes, the "old way" is the best way.-->
                </p>
                <p class="text-2xl font-medium text-gray-900 dark:text-white">
                    Phenomine is a game-changer. It's the perfect balance of simplicity and power, making it easy to build web applications that are both beautiful and functional.
                </p>
            </blockquote>
            <figcaption class="flex items-center justify-center mt-6 space-x-3">
                <img class="w-6 h-6 rounded-full" src="{asset('build/images/fahli.jpg')}" alt="profile picture">
                <div class="flex items-center divide-x-2 divide-gray-500 dark:divide-gray-700">
                    <div class="pr-3 font-medium text-gray-900 dark:text-white">Muhammad Fahli Saputra</div>
                    <div class="pl-3 text-sm font-light text-gray-500 dark:text-gray-400">Creator of Phenomine</div>
                </div>
            </figcaption>
        </figure>
    </div>
</section>
<section tabindex="-1" class="relative max-w-7xl mx-auto px-4 focus:outline-none sm:px-3 md:px-5 mb-20">
    <h2 class="sr-only">Testimonials</h2>
    <div class="grid grid-cols-1 gap-6 lg:gap-8 sm:grid-cols-2 lg:grid-cols-3 max-h-[33rem] overflow-hidden">
        <ul class="space-y-8">
            <li class="text-sm leading-6">
                <figure class="relative flex flex-col-reverse bg-slate-50 rounded-lg p-6 dark:bg-slate-800 dark:highlight-white/5">
                    <blockquote class="mt-6 text-slate-700 dark:text-slate-300">
                        <p>I feel like an idiot for not using Tailwind CSS until now.</p>
                    </blockquote>
                    <figcaption class="flex items-center space-x-4">
                        <img src="/_next/static/media/ryan-florence.3af9c9d9.jpg" alt="" class="flex-none w-14 h-14 rounded-full object-cover" loading="lazy" decoding="async">
                        <div class="flex-auto">
                            <div class="text-base text-slate-900 font-semibold dark:text-slate-300">
                                <a href="https://twitter.com/ryanflorence/status/1187951799442886656" tabindex="0">
                                    <span class="absolute inset-0"></span>Ryan Florence </a>
                            </div>
                            <div class="mt-0.5">Remix &amp; React Training</div>
                        </div>
                    </figcaption>
                </figure>
            </li>
            <li class="text-sm leading-6">
                <figure class="relative flex flex-col-reverse bg-slate-50 rounded-lg p-6 dark:bg-slate-800 dark:highlight-white/5">
                    <blockquote class="mt-6 text-slate-700 dark:text-slate-300">
                        <p>If I had to recommend a way of getting into programming today, it would be HTML + CSS with Tailwind CSS.</p>
                    </blockquote>
                    <figcaption class="flex items-center space-x-4">
                        <img src="/_next/static/media/guillermo-rauch.8a24ab88.jpg" alt="" class="flex-none w-14 h-14 rounded-full object-cover" loading="lazy" decoding="async">
                        <div class="flex-auto">
                            <div class="text-base text-slate-900 font-semibold dark:text-slate-300">
                                <a href="https://twitter.com/rauchg/status/1225611926320738304" tabindex="-1">
                                    <span class="absolute inset-0"></span>Guillermo Rauch </a>
                            </div>
                            <div class="mt-0.5">Vercel</div>
                        </div>
                    </figcaption>
                </figure>
            </li>
            <li class="text-sm leading-6">
                <figure class="relative flex flex-col-reverse bg-slate-50 rounded-lg p-6 dark:bg-slate-800 dark:highlight-white/5">
                    <blockquote class="mt-6 text-slate-700 dark:text-slate-300">
                        <p>I have no design skills and with Tailwind I can actually make good looking websites with ease and it's everything I ever wanted in a CSS framework.</p>
                    </blockquote>
                    <figcaption class="flex items-center space-x-4">
                        <img src="/_next/static/media/sara-vieira.e2bfc631.jpg" alt="" class="flex-none w-14 h-14 rounded-full object-cover" loading="lazy" decoding="async">
                        <div class="flex-auto">
                            <div class="text-base text-slate-900 font-semibold dark:text-slate-300">Sara Vieira</div>
                            <div class="mt-0.5">CodeSandbox</div>
                        </div>
                    </figcaption>
                </figure>
            </li>
        </ul>
        <ul class="space-y-8 hidden sm:block">
            <li class="text-sm leading-6">
                <figure class="relative flex flex-col-reverse bg-slate-50 rounded-lg p-6 dark:bg-slate-800 dark:highlight-white/5">
                    <blockquote class="mt-6 text-slate-700 dark:text-slate-300">
                        <p>Have been working with CSS for over ten years and Tailwind just makes my life easier. It is still CSS and you use flex, grid, etc. but just quicker to write and maintain.</p>
                    </blockquote>
                    <figcaption class="flex items-center space-x-4">
                        <img src="/_next/static/media/debbie-obrien.69d3104d.jpg" alt="" class="flex-none w-14 h-14 rounded-full object-cover" loading="lazy" decoding="async">
                        <div class="flex-auto">
                            <div class="text-base text-slate-900 font-semibold dark:text-slate-300">
                                <a href="https://twitter.com/debs_obrien/status/1243255468241420288" tabindex="0">
                                    <span class="absolute inset-0"></span>Debbie O'Brien </a>
                            </div>
                            <div class="mt-0.5">Senior Program Manager at Microsoft</div>
                        </div>
                    </figcaption>
                </figure>
            </li>
            <li class="text-sm leading-6">
                <figure class="relative flex flex-col-reverse bg-slate-50 rounded-lg p-6 dark:bg-slate-800 dark:highlight-white/5">
                    <blockquote class="mt-6 text-slate-700 dark:text-slate-300">
                        <p>I’ve been writing CSS for over 20 years, and up until 2017, the way I wrote it changed frequently. It’s not a coincidence Tailwind was released the same year. It might look wrong, but spend time with it and you’ll realize semantic CSS was a 20 year mistake.</p>
                    </blockquote>
                    <figcaption class="flex items-center space-x-4">
                        <img src="/_next/static/media/frontendben.7c4b54bd.jpg" alt="" class="flex-none w-14 h-14 rounded-full object-cover" loading="lazy" decoding="async">
                        <div class="flex-auto">
                            <div class="text-base text-slate-900 font-semibold dark:text-slate-300">
                                <a href="https://twitter.com/frontendben/status/1468687028036452363" tabindex="-1">
                                    <span class="absolute inset-0"></span>Ben Furfie </a>
                            </div>
                            <div class="mt-0.5">Developer</div>
                        </div>
                    </figcaption>
                </figure>
            </li>
            <li class="text-sm leading-6">
                <figure class="relative flex flex-col-reverse bg-slate-50 rounded-lg p-6 dark:bg-slate-800 dark:highlight-white/5">
                    <blockquote class="mt-6 text-slate-700 dark:text-slate-300">
                        <p>Tailwind makes writing code feel like I’m using a design tool.</p>
                    </blockquote>
                    <figcaption class="flex items-center space-x-4">
                        <img src="/_next/static/media/didiercatz.5a884729.jpg" alt="" class="flex-none w-14 h-14 rounded-full object-cover" loading="lazy" decoding="async">
                        <div class="flex-auto">
                            <div class="text-base text-slate-900 font-semibold dark:text-slate-300">
                                <a href="https://twitter.com/didiercatz/status/1468657403382181901" tabindex="-1">
                                    <span class="absolute inset-0"></span>Didier Catz </a>
                            </div>
                            <div class="mt-0.5">Co-Founder @StyptApp</div>
                        </div>
                    </figcaption>
                </figure>
            </li>
        </ul>
        <ul class="space-y-8 hidden lg:block">
            <li class="text-sm leading-6">
                <figure class="relative flex flex-col-reverse bg-slate-50 rounded-lg p-6 dark:bg-slate-800 dark:highlight-white/5">
                    <blockquote class="mt-6 text-slate-700 dark:text-slate-300">
                        <p>Skip to the end. Use @tailwindcss.</p>
                    </blockquote>
                    <figcaption class="flex items-center space-x-4">
                        <img src="/_next/static/media/kentcdodds.90894efe.jpg" alt="" class="flex-none w-14 h-14 rounded-full object-cover" loading="lazy" decoding="async">
                        <div class="flex-auto">
                            <div class="text-base text-slate-900 font-semibold dark:text-slate-300">
                                <a href="https://twitter.com/kentcdodds/status/1468692023158796289" tabindex="0">
                                    <span class="absolute inset-0"></span>Kent C. Dodds </a>
                            </div>
                            <div class="mt-0.5">Developer and Educator</div>
                        </div>
                    </figcaption>
                </figure>
            </li>
            <li class="text-sm leading-6">
                <figure class="relative flex flex-col-reverse bg-slate-50 rounded-lg p-6 dark:bg-slate-800 dark:highlight-white/5">
                    <blockquote class="mt-6 text-slate-700 dark:text-slate-300">
                        <p>I was bad at front-end until I discovered Tailwind CSS. I have learnt a lot more about design and CSS itself after I started working with Tailwind. Creating web pages is 5x faster now.</p>
                    </blockquote>
                    <figcaption class="flex items-center space-x-4">
                        <img src="/_next/static/media/shrutibalasa.8c3514ba.jpg" alt="" class="flex-none w-14 h-14 rounded-full object-cover" loading="lazy" decoding="async">
                        <div class="flex-auto">
                            <div class="text-base text-slate-900 font-semibold dark:text-slate-300">
                                <a href="https://twitter.com/shrutibalasa" tabindex="-1">
                                    <span class="absolute inset-0"></span>Shruti Balasa </a>
                            </div>
                            <div class="mt-0.5">Full Stack Web Developer &amp; Tech Educator</div>
                        </div>
                    </figcaption>
                </figure>
            </li>
            <li class="text-sm leading-6">
                <figure class="relative flex flex-col-reverse bg-slate-50 rounded-lg p-6 dark:bg-slate-800 dark:highlight-white/5">
                    <blockquote class="mt-6 text-slate-700 dark:text-slate-300">
                        <p>I don't use it but if I would use something I'd use Tailwind!</p>
                    </blockquote>
                    <figcaption class="flex items-center space-x-4">
                        <img src="/_next/static/media/levelsio.a3935ad1.jpg" alt="" class="flex-none w-14 h-14 rounded-full object-cover" loading="lazy" decoding="async">
                        <div class="flex-auto">
                            <div class="text-base text-slate-900 font-semibold dark:text-slate-300">
                                <a href="https://twitter.com/levelsio/status/1288542608390856705" tabindex="-1">
                                    <span class="absolute inset-0"></span>Pieter Levels </a>
                            </div>
                            <div class="mt-0.5">Maker</div>
                        </div>
                    </figcaption>
                </figure>
            </li>
        </ul>
    </div>
    <div class="inset-x-0 bottom-0 flex justify-center bg-gradient-to-t from-white pt-32 pb-8 pointer-events-none dark:from-slate-950 absolute">
    </div>
</section>
{/block}


