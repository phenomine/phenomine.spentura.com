let anchorChanged = false;
let scrollEventHandlerSet = false;
document.addEventListener('DOMContentLoaded', function () {
    initFlowbite();
    initSidebar();
    initTableOfContents();
});
document.addEventListener('htmx:afterSettle', function (event) {
    initFlowbite();
    initSidebar();
    initTableOfContents();
    window.scrollTo(0, 0);
});

document.addEventListener('htmx:beforeSwap', function (event) {
    // const mainContent = document.getElementById('mainContent');
    // mainContent.style.opacity = '0';
});

const initTableOfContents = () => {
    if (!document.getElementById('TableOfContents')) {
        return;
    }
    const mainContent = document.getElementById('mainContent');
    const h1 = mainContent.querySelector('h1');
    const p = mainContent.querySelectorAll('p');
    p.forEach((el) => {
        el.classList.add('mb-5');
    })
    h1.classList.add('inline-block', 'mb-5', 'text-3xl', 'font-extrabold', 'tracking-tight', 'text-gray-900', 'dark:text-gray-400');
    const headings = mainContent.querySelectorAll('h2, h3, h4');
    const toc = document.querySelector('#TableOfContents ul');
    const selector = document.querySelectorAll('#TableOfContents ul li');
    selector.forEach((el) => {
        el.remove();
    });
    let parent;
    headings.forEach((heading) => {
        if (heading.classList.contains('relative')) {
            return;
        }
        const text = heading.textContent;
        const level = heading.tagName.toLowerCase();
        const id = text.toLowerCase().replace(/ /g, '-').replace(/[^a-zA-Z-]/g, '');
        if (level === 'h2') {
            heading.classList.add('relative', 'group', 'text-2xl', 'font-bold', 'pb-5', 'border-b', 'border-gray-200', 'dark:border-gray-900', 'mb-5');
        } else if (level === 'h3') {
            heading.classList.add('relative', 'group', 'text-lg', 'font-bold', 'mb-5');
        } else if (level === 'h4') {
            heading.classList.add('relative', 'group', 'text-base', 'font-bold', 'mb-5');
        }
        const span = document.createElement('span');
        span.id = id;
        span.classList.add('absolute', '-top-[140px]');
        heading.appendChild(span);
        const anchor = document.createElement('a');
        anchor.href = `#${id}`;
        anchor.textContent = "#";
        anchor.classList.add('ml-2', 'text-blue-700', 'opacity-0', 'transition-opacity', 'dark:text-blue-500', 'group-hover:opacity-100', 'mb-2');
        anchor.setAttribute('aria-label', `Link to this section: ${text}`);
        heading.appendChild(anchor);
        const invisibleAnchor = document.createElement('span');
        invisibleAnchor.id = id;
        invisibleAnchor.classList.add('invisible-anchor');
        heading.parentNode.insertBefore(invisibleAnchor, heading);
        if (level === 'h2') {
            parent = id;
        }
        if (level === 'h3') {
            heading.setAttribute('data-parent', parent);
        }
        if (level === 'h4') {
            heading.setAttribute('data-parent', parent);
        }
        const li = document.createElement('li');
        const a = document.createElement('a');
        a.href = `#${id}`;
        a.textContent = text;
        if (level === 'h3') {
            a.classList.add('ml-5');
        }
        if (level === 'h4') {
            a.classList.add('ml-10');
        }
        li.classList.add('mb-2', 'transition-colors', 'hover:text-black', 'dark:hover:text-white');
        li.appendChild(a);
        toc.appendChild(li);
    });
    if (!scrollEventHandlerSet) {
        window.addEventListener('hashchange', hashChangeEventHandler);
        window.addEventListener('scroll', scrollEventHandler);
        scrollEventHandlerSet = true;
    }
    mainContent.style.opacity = '1';
};

const hashChangeEventHandler = () => {
    anchorChanged = true;
    const menuEl = document.querySelector("#TableOfContents [href=\"".concat(location.hash, "\"]"));
    activateMenuEl(menuEl);
    setTimeout(function () {
        anchorChanged = false;
    }, 99);
}

const scrollEventHandler = () => {
    const contentAnchorTags = document.querySelectorAll('#mainContent > h2 > span[id], #mainContent > h3 > span[id], #mainContent > h4 > span[id], #mainContent > h5 > span[id], #mainContent > h6 > span[id]');
    contentAnchorTags.forEach(function (anchorEl) {
        const element = anchorEl;
        const position = element.getBoundingClientRect();
        if (position.top + 140 >= 0 && position.bottom + 140 <= window.innerHeight) {
            const menuEl = document.querySelector("#TableOfContents [href=\"#".concat(element.id, "\"]"));
            if (!anchorChanged) {
                activateMenuEl(menuEl);
            }
        }
    });
}
const deactivateMenuEl = function deactivateMenuEl(el) {
    el.classList.remove('text-blue-700', 'dark:text-blue-500');
};
const activateMenuEl = function activateMenuEl(element) {
    const allMenu = document.querySelectorAll('#TableOfContents [href]');
    try {
        element.classList.add('text-blue-700', 'dark:text-blue-500');
        allMenu.forEach(function (el) {
            if (el !== element) {
                deactivateMenuEl(el);
            }
        });
    } catch (e) {
    }
};
const initSidebar = () => {
    if (!document.getElementById('sidebar')) {
        return;
    }
    var currentHref = window.location.href;
    var sidebarItemEls = document.querySelectorAll('[data-sidebar-item]');
    var sidenav = document.getElementById('navWrapper');
    var sidenavHeight = sidenav.clientHeight;
    sidebarItemEls.forEach(function (s) {
        if (s.href === currentHref) {
            var itemHeight = s.clientHeight;
            sidenav.scrollTop = s.offsetTop - sidenavHeight / 2 + itemHeight / 2;
        }
    });
    var sidebar = document.getElementById('sidebar');
    var toggleSidebarMobile = function toggleSidebarMobile(sidebar, sidebarBackdrop, toggleSidebarMobileHamburger, toggleSidebarMobileClose) {
        sidebar.classList.toggle('hidden');
        sidebarBackdrop.classList.toggle('hidden');
        toggleSidebarMobileHamburger.classList.toggle('hidden');
        toggleSidebarMobileClose.classList.toggle('hidden');
    };
    var toggleSidebarMobileEl = document.getElementById('toggleSidebarMobile');
    var sidebarBackdrop = document.getElementById('sidebarBackdrop');
    var toggleSidebarMobileHamburger = document.getElementById('toggleSidebarMobileHamburger');
    var toggleSidebarMobileClose = document.getElementById('toggleSidebarMobileClose');
    toggleSidebarMobileEl.addEventListener('click', function () {
        toggleSidebarMobile(sidebar, sidebarBackdrop, toggleSidebarMobileHamburger, toggleSidebarMobileClose);
    });
    sidebarBackdrop.addEventListener('click', function () {
        toggleSidebarMobile(sidebar, sidebarBackdrop, toggleSidebarMobileHamburger, toggleSidebarMobileClose);
    });
};
