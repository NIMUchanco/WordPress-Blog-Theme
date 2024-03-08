const header = document.querySelector('header');
const navMenu = document.querySelector('.nav-menu');
const hamburgerMenu = document.querySelector('.hamburger-menu');
const closeBtn = document.querySelector('.close-btn');
const navLinks = document.querySelectorAll('.nav-menu a');
const sectionTitles = document.querySelectorAll('.random-text');
const showTexts = document.querySelectorAll('.card-bottom span p');
const showInfos = document.querySelectorAll('.info a p');
// FOR IMAGE GALLERY
let imageLinks = document.querySelectorAll('.swiper-slide a');
let imageModalImg = document.querySelector('.image-modal img');
let imageModalCaption = document.querySelector('.image-modal figcaption');
const prevBtn = document.querySelector('.image-modal .prev-btn');
const nextBtn = document.querySelector('.image-modal .next-btn');
let imageModal = document.querySelector('.image-modal');
let imageModalClose = document.querySelector('.image-modal .close-btn');
let currentIndex = 0;

// SLIDER
const swiper = new Swiper(".swiper", {
    loop: true,
    slidesPerView: 2,
    spaceBetween: 150, 
    speed: 6000,
    allowTouchMove: true,
    autoplay: {
    delay: 0,
    disableOnInteraction: true,
    },
    breakpoints: {
        360: {
            slidesPerView: 3,
        },
        600: {
            slidesPerView: 4,
        },
        750: {
            slidesPerView: 5,
        },
        1000: {
            slidesPerView: 6,
        },
        1200: {
            slidesPerView: 7,
        },
        1400: {
            slidesPerView: 8,
        },
        1600: {
            slidesPerView: 9,
        },
    }
});

const swiper2 = new Swiper(".swiper2", {
    loop: true,
    slidesPerView: 2,
    spaceBetween: 150,
    speed: 6000,
    allowTouchMove: true,
    autoplay: {
    delay: 0,
    disableOnInteraction: true,
    reverseDirection: true,
    },
    breakpoints: {
        360: {
            slidesPerView: 3,
        },
        600: {
            slidesPerView: 4,
        },
        750: {
            slidesPerView: 5,
        },
        1000: {
            slidesPerView: 6,
        },
        1200: {
            slidesPerView: 7,
        },
        1400: {
            slidesPerView: 8,
        },
        1600: {
            slidesPerView: 9,
        },
    }
});

// Initialize the image gallery
function initializeGallery() {
    // Add click event listeners to each image link
    imageLinks.forEach((imageLink, index) => {
        imageLink.addEventListener('click', (e) => {
            e.preventDefault();
            currentIndex = index; // Update the current index
            showImageAtIndex(currentIndex);
            imageModal.classList.add('active');
        });
    });

    // Add click event listener to the close button
    if (imageModalClose) {
            imageModalClose.addEventListener('click', () => {
            imageModal.classList.remove('active');
        });
    }

    // Add click event listener to the previous button
    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + imageLinks.length) % imageLinks.length;
            showImageAtIndex(currentIndex);
            console.log(currentIndex);
        });
    }

    // Add click event listener to the next button
    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % imageLinks.length;
            showImageAtIndex(currentIndex);
            console.log(currentIndex);
        });
    }
}

// Show image at the specified index
function showImageAtIndex(index) {
    let imageLink = imageLinks[index];
    let imageSrc = imageLink.getAttribute('href');
    let imageAlt = imageLink.getAttribute('data-alt');
    let imageCaption = imageLink.getAttribute('data-caption');
    imageModalImg.setAttribute('src', imageSrc);
    imageModalImg.setAttribute('alt', imageAlt);
    imageModalCaption.textContent = imageCaption;
}

function removeActive() {
    navMenu.classList.toggle('active');
    closeBtn.classList.toggle('active');
}

function splitTextInSpans(element) {
    let text = element.textContent;
    let textArray = text.split('');
    element.textContent = '';

    for (let i = 0; i < textArray.length; i++) {
        let span = document.createElement('span');
        span.textContent = textArray[i];
        element.appendChild(span);
    }
}

function showTextsWithDelay(element) {
    let spans = element.querySelectorAll('span');

    spans.forEach((span, index) => {
        span.style.animationDelay = `${index * 0.1}s`;
    });
}

// DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    // Initialize the gallery when the DOM is ready
    initializeGallery();

    // NAV MENU
    hamburgerMenu.addEventListener('click', () => {
        navMenu.classList.toggle('active');
        closeBtn.classList.toggle('active');
    });

    closeBtn.addEventListener('click', () => {
        removeActive();
    });

    navLinks.forEach(navLink => {
        navLink.addEventListener('click', () => {
            removeActive();
        });
    });

    // SECTION TITLE
    sectionTitles.forEach(splitTextInSpans);


    // SCROLL ANIMATION
    window.addEventListener('scroll', () => {
        let scrollPosition = window.scrollY;
        let windowHeight = window.innerHeight;
        
        // HEADER
        if (scrollPosition > 0) {
            header.classList.add('active');
        } else {
            header.classList.remove('active');
        }

        sectionTitles.forEach((title) => {
            let pageDistance = title.offsetTop;

            if (scrollPosition > pageDistance - windowHeight + 100) {
                title.classList.add('active');
            } else {
                title.classList.remove('active');
            }
        });
    });

    // TEXT ANIMATION
    showTexts.forEach(splitTextInSpans);
    showTexts.forEach(showTextsWithDelay);

    showInfos.forEach(splitTextInSpans);
    showInfos.forEach(showTextsWithDelay);
});
